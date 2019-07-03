<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Blog_model');

    $this->data['module'] = 'Blog';
    

    if (!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
    // elseif($this->ion_auth->is_user()){redirect('admin/auth/login', 'refresh');}
  }

  public function index()
  {
    $this->data['title'] = 'Data '.$this->data['module'];
    $this->load->view('back/blog/blog_list', $this->data);
  }

  public function ajax_list()
	{
		//get_datatables terletak di model
    $list = $this->Blog_model->get_datatables();
    $data = array();
		$no = $_POST['start'];

    // Membuat loop/ perulangan
    foreach ($list as $data_blog) {
			$no++;
			$row = array();
      $row[] = '<p style="text-align: center">'.$no.'</p>';
      $row[] = '<p style="text-align: left">'.$data_blog->judul_blog.'</p>';
      // Penambahan tombol edit dan hapus
      $row[] = '
      <p style="text-align: center">
        <a class="btn btn-sm btn-warning" href="'.base_url('admin/blog/update/').$data_blog->id_blog.'" title="Edit"><i class="fa fa-pencil"></i></a>
        <a class="btn btn-sm btn-danger" href="'.base_url('admin/blog/delete/').$data_blog->id_blog.'" title="Hapus" onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"><i class="fa fa-remove"></i></a>
			</p>';

      $data[] = $row;
    }

    $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Blog_model->count_all(),
              "recordsFiltered" => $this->Blog_model->count_filtered(),
              "data" => $data
              );
    //output to json format
    echo json_encode($output);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah Data '.$this->data['module'];
    $this->data['action']         = site_url('admin/blog/create_action');
    $this->data['button_submit']  = 'Simpan';
    $this->data['button_reset']   = 'Reset';

    $this->data['judul_blog'] = array(
      'name'  => 'judul_blog',
      'id'    => 'judul_blog',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('judul_blog'),
    );

    $this->data['isi_blog'] = array(
      'name'  => 'isi_blog',
      'id'    => 'isi_blog',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('isi_blog'),
    );

    $this->load->view('back/blog/blog_add', $this->data);
  }

  public function create_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->create();
    }
    else
    {
      /* 4 adalah menyatakan tidak ada file yang diupload*/
      if ($_FILES['foto']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('judul_blog'))).date('YmdHis');

        /* memanggil library upload ci */
        $config['upload_path']      = './assets/images/blog/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
        $config['max_size']         = '2048'; // 2 MB
        $config['file_name']        = $nmfile; //nama yang terupload nantinya

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto'))
        {
          //file gagal diupload -> kembali ke form tambah
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert">'.$error['error'].'</div>');

          $this->create();
        }
          //file berhasil diupload -> lanjutkan ke query INSERT
          else
          {
            $foto = $this->upload->data();
            $thumbnail                = $config['file_name'];
            // library yang disediakan codeigniter
            $config['image_library']  = 'gd2';
            // gambar yang akan disimpan thumbnail
            $config['source_image']   = './assets/images/blog/'.$foto['file_name'].'';
            // membuat thumbnail
            $config['create_thumb']   = TRUE;
            // rasio resolusi
            $config['maintain_ratio'] = FALSE;
            // lebar
            $config['width']          = 800;
            // tinggi
            $config['height']         = 400;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $data = array(
              'judul_blog'    => $this->input->post('judul_blog'),
              'slug_blog'     => strtolower(url_title($this->input->post('judul_blog'))),
              'isi_blog'      => $this->input->post('isi_blog'),
              'foto'          => $nmfile,
              'foto_type'     => $foto['file_ext'],
              'created_by'    => $this->session->userdata('username')
            );

            // eksekusi query INSERT
            $this->Blog_model->insert($data);
            // set pesan data berhasil disimpan
            $this->session->set_flashdata('message', '
            <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
              <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
            </div>');
            redirect(site_url('admin/blog'));
          }
      }
      else // Jika file upload kosong
      {
        $data = array(
          'judul_blog'  => $this->input->post('judul_blog'),
          'slug_blog'     => strtolower(url_title($this->input->post('judul_blog'))),
          'isi_blog'      => $this->input->post('isi_blog'),
          'created_by'      => $this->session->userdata('username')
        );

        // eksekusi query INSERT
        $this->Blog_model->insert($data);
        // set pesan data berhasil disimpan
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
        </div>');
        redirect(site_url('admin/blog'));
      }
    }
  }

  public function update($id)
  {
    $row = $this->Blog_model->get_by_id($id);
    $this->data['blog'] = $this->Blog_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Ubah Data '.$this->data['module'];
      $this->data['action']         = site_url('admin/blog/update_action');
      $this->data['button_submit']  = 'Simpan';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_blog'] = array(
        'name'  => 'id_blog',
        'id'    => 'id_blog',
        'type'  => 'hidden',
      );
      $this->data['judul_blog'] = array(
        'name'  => 'judul_blog',
        'id'    => 'judul_blog',
        'class' => 'form-control',
      );
      $this->data['isi_blog'] = array(
        'name'  => 'isi_blog',
        'id'    => 'isi_blog',
        'class' => 'form-control',
      );

      $this->load->view('back/blog/blog_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/blog'));
      }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->update($this->input->post('id_blog'));
    }
      else
      {
        $nmfile = strtolower(url_title($this->input->post('judul_blog'))).date('YmdHis');
        $id['id_blog'] = $this->input->post('id_blog');

        /* Jika file upload diisi */
        if ($_FILES['foto']['error'] <> 4)
        {
          $nmfile = strtolower(url_title($this->input->post('judul_blog'))).date('YmdHis');

          //load uploading file library
          $config['upload_path']      = './assets/images/blog/';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);

          // Jika file gagal diupload -> kembali ke form update
          if (!$this->upload->do_upload('foto'))
          {
            //file gagal diupload -> kembali ke form update
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert">'.$error['error'].'</div>');

            $this->update($this->input->post('id_blog'));
          }
            // Jika file berhasil diupload -> lanjutkan ke query INSERT
            else
            {
              $delete = $this->Blog_model->del_by_id($this->input->post('id_blog'));

              $dir        = "assets/images/blog/".$delete->foto.$delete->foto_type;
              $dir_thumb  = "assets/images/blog/".$delete->foto.'_thumb'.$delete->foto_type;

              if(file_exists($dir))
              {
                // Hapus foto dan thumbnail
                unlink($dir);
                unlink($dir_thumb);
              }

              $foto = $this->upload->data();
              // library yang disediakan codeigniter
              $thumbnail                = $config['file_name'];
              //nama yang terupload nantinya
              $config['image_library']  = 'gd2';
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/images/blog/'.$foto['file_name'].'';
              // membuat thumbnail
              $config['create_thumb']   = TRUE;
              // rasio resolusi
              $config['maintain_ratio'] = FALSE;
              // lebar
              $config['width']          = 800;
              // tinggi
              $config['height']         = 400;

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $data = array(
                'judul_blog'  => $this->input->post('judul_blog'),
                'slug_blog'   => strtolower(url_title($this->input->post('judul_blog'))),
                'isi_blog'    => $this->input->post('isi_blog'),
                'foto'        => $nmfile,
                'foto_type'   => $foto['file_ext'],
                'modified_by' => $this->session->userdata('username')
              );

              $this->Blog_model->update($this->input->post('id_blog'), $data);
              $this->session->set_flashdata('message', '
              <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
              </div>');
              redirect(site_url('admin/blog'));
            }
        }
          // Jika file upload kosong
          else
          {
            $data = array(
              'judul_blog'  => $this->input->post('judul_blog'),
              'slug_blog'   => strtolower(url_title($this->input->post('judul_blog'))),
              'isi_blog'    => $this->input->post('isi_blog'),
              'modified_by' => $this->session->userdata('username')
            );

            $this->Blog_model->update($this->input->post('id_blog'), $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
              <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
            </div>');
            redirect(site_url('admin/blog'));
          }
      }
  }

  public function delete($id)
  {
    $delete = $this->Blog_model->del_by_id($id);

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/images/blog/".$delete->foto.$delete->foto_type;
    $dir_thumb = "assets/images/blog/".$delete->foto.'_thumb'.$delete->foto_type;

    // Hapus foto
    unlink($dir);
    unlink($dir_thumb);

    // Jika data ditemukan, maka hapus foto dan record nya
    if($delete)
    {
      $this->Blog_model->delete($id);

      $this->session->set_flashdata('message', '
      <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil dihapus
      </div>');
      redirect(site_url('admin/blog'));
    }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/blog'));
      }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('judul_blog', 'Judul Blog', 'trim|required');

    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_blog', 'id_blog', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
  }

}
