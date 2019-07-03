<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Produk_model');
    $this->load->model('Kategori_model');

    $this->data['module'] = 'Barang';

    if (!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
  }

  public function index()
  {
    $this->data['title'] = 'Data '.$this->data['module'];
    // $this->load->view('back/produk/produk_list', $this->data);
    if ($this->ion_auth->is_superadmin()){
      $this->data['produk_data'] = $this->Produk_model->get_all();
      $this->load->view('back/produk/produk_list', $this->data);
      }
      else{
        $data =  $this->session->userdata('username');
        $this->data['produk_data'] = $this->Produk_model->get_all_per_seller($data);
        $this->load->view('back/produk/produk_list', $this->data);
      }
    
  }

  public function ajax_list()
	{
    //get_datatables terletak di model
    $list = $this->Produk_model->get_datatables();
    $data = array();
		$no = $_POST['start'];

    // Membuat loop/ perulangan
    foreach ($list as $data_produk) {
			$no++;
			$row = array();
      $row[] = '<p style="text-align: center">'.$no.'</p>';
      $row[] = '<p style="text-align: left">'.$data_produk->judul_produk.'</p>';
      $row[] = '<p style="text-align: center">'.$data_produk->judul_kategori.'</p>';
      $row[] = '<p style="text-align: center">'.$data_produk->judul_subkategori.'</p>';
      $row[] = '<p style="text-align: center">'.$data_produk->judul_supersubkategori.'</p>';
      $row[] = '<p style="text-align: center">'.number_format($data_produk->harga_normal).'</p>';
      $row[] = '<p style="text-align: center">'.number_format($data_produk->harga_diskon).'</p>';

      // Penambahan tombol edit dan hapus
      $row[] = '
      <p style="text-align: center">
      	<a class="btn btn-sm btn-warning" href="'.base_url('admin/produk/update/').$data_produk->id_produk.'" title="Edit"><i class="fa fa-pencil"></i></a>
        <a class="btn btn-sm btn-danger" href="'.base_url('admin/produk/delete/').$data_produk->id_produk.'" title="Hapus" onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"><i class="fa fa-remove"></i></a>
			</p>';

      $data[] = $row;
    }

    $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Produk_model->count_all(),
              "recordsFiltered" => $this->Produk_model->count_filtered(),
              "data" => $data
              );
    //output to json format
    echo json_encode($output);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah Data '.$this->data['module'];
    $this->data['action']         = site_url('admin/produk/create_action');
    $this->data['button_submit']  = 'Simpan';
    $this->data['button_reset']   = 'Reset';

    $this->data['judul_produk'] = array(
      'name'        => 'judul_produk',
      'id'          => 'judul_produk',
      'class'       => 'form-control',
      'placeholder' => 'Silahkan isi judul/nama produk',
      'value'       => $this->form_validation->set_value('judul_produk'),
      
    );
    $this->data['keywords'] = array(
      'name'        => 'keywords',
      'id'          => 'keywords',
      'class'       => 'form-control',
      'placeholder' => 'Ex: mobil, mobil sport, mobil sport palembang',
      'value'       => $this->form_validation->set_value('keywords'),
    );
    $this->data['deskripsi'] = array(
      'name'        => 'deskripsi',
      'id'          => 'deskripsi',
      'class'       => 'form-control',
      'placeholder' => 'Ex: bahan, ukuran, benang, spesifikasi lengkap barang',
      'value'       => $this->form_validation->set_value('deskripsi'),
    );
    $this->data['harga_normal'] = array(
      'name'        => 'harga_normal',
      'id'          => 'b',
      'class'       => 'form-control',
      'placeholder'	=> 'Isikan angka saja',
      'onkeyup'			=> 'hitung();',
      'value'       => $this->form_validation->set_value('harga_normal'),
    );
    $this->data['diskon'] = array(
      'name'        => 'diskon',
      'id'          => 'a',
      'class'       => 'form-control',
      'placeholder'	=> 'Isikan angka saja',
      'onkeyup'			=> 'hitung();',
      'value'       => $this->form_validation->set_value('diskon'),
    );
    $this->data['harga_diskon'] = array(
      'name'        => 'harga_diskon',
      'id'          => 'd',
      'class'       => 'form-control',
      'placeholder'	=> 'Isikan angka saja',
      'onkeyup'			=> 'hitung();',
      'value'       => $this->form_validation->set_value('harga_diskon'),
    );
    $this->data['stok'] = array(
      'name'        => 'stok',
      'id'          => 'stok',
      'class'       => 'form-control',
      'placeholder'	=> 'Isikan angka saja',
      'value'       => $this->form_validation->set_value('stok'),
    );
    $this->data['berat'] = array(
      'name'        => 'berat',
      'id'          => 'berat',
      'class'       => 'form-control',
      'placeholder'	=> 'Isikan angka saja',
      'value'       => $this->form_validation->set_value('berat'),
    );
    $this->data['kat_id'] = array(
      'name'        => 'kat_id',
      'id'          => 'kat_id',
      'class'       => 'form-control',
      'onChange'    => 'tampilSubkat()',
      'required'    => '',
    );
    $this->data['subkat_id'] = array(
      'name'        => 'subkat_id',
      'id'          => 'subkat_id',
      'class'       => 'form-control',
      'onChange'    => 'tampilSuperSubkat()',
      'required'    => '',
    );
    $this->data['supersubkat_id'] = array(
      'name'        => 'supersubkat_id',
      'id'          => 'supersubkat_id',
      'class'       => 'form-control',
      'required'    => '',
    );

    $this->data['ambil_kategori'] = $this->Kategori_model->ambil_kategori();
    $this->load->view('back/produk/produk_add', $this->data);
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
          $nmfile = strtolower(url_title($this->input->post('judul_produk'))).date('YmdHis');

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/images/produk/';
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
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/images/produk/'.$foto['file_name'].'';
              // membuat thumbnail
              $config['create_thumb']   = TRUE;
              // rasio resolusi
              $config['maintain_ratio'] = FALSE;
              // lebar
              $config['width']          = 400;
              // tinggi
              $config['height']         = 400;

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $data = array(
                'judul_produk'    => $this->input->post('judul_produk'),
                'slug_produk'     => strtolower(url_title($this->input->post('judul_produk'))),
                'keywords'        => strtolower($this->input->post('keywords')),
                'deskripsi'       => $this->input->post('deskripsi'),
                'kat_id'          => $this->input->post('kat_id'),
                'subkat_id'       => $this->input->post('subkat_id'),
                'supersubkat_id'  => $this->input->post('supersubkat_id'),
                'berat'           => $this->input->post('berat'),
                'harga_normal' 	  => $this->input->post('harga_normal'),
                'diskon' 	        => $this->input->post('diskon'),
                'harga_diskon' 	  => $this->input->post('harga_diskon'),
                'stok' 				    => $this->input->post('stok'),
                'berat' 				  => $this->input->post('berat'),
                'foto'            => $nmfile,
                'foto_type'       => $foto['file_ext'],
                'uploader'        => $this->session->userdata('user_id')
              );

              // eksekusi query INSERT
              $this->Produk_model->insert($data);
              // set pesan data berhasil dibuat
              $this->session->set_flashdata('message', '<div class="alert alert-success alert">Data berhasil dibuat</div>');
              redirect(site_url('admin/produk'));
            }
        }
        else // Jika file upload kosong
        {
          $data = array(
            'judul_produk'    => $this->input->post('judul_produk'),
            'slug_produk'     => strtolower(url_title($this->input->post('judul_produk'))),
            'keywords'        => strtolower($this->input->post('keywords')),
            'deskripsi'       => $this->input->post('deskripsi'),
            'kat_id'          => $this->input->post('kat_id'),
            'subkat_id'       => $this->input->post('subkat_id'),
            'supersubkat_id'  => $this->input->post('supersubkat_id'),
            'harga_normal' 	  => $this->input->post('harga_normal'),
            'diskon' 	        => $this->input->post('diskon'),
            'harga_diskon' 	  => $this->input->post('harga_diskon'),
            'stok' 				    => $this->input->post('stok'),
            'berat' 				  => $this->input->post('berat'),
            'uploader'        => $this->session->userdata('username')
          );

          // eksekusi query INSERT
          $this->Produk_model->insert($data);
          // set pesan data berhasil dibuat
          $this->session->set_flashdata('message', '<div class="alert alert-success alert">Data berhasil dibuat</div>');
          redirect(site_url('admin/produk'));
        }
      }
  }

  public function update($id)
  {
    $row = $this->Produk_model->get_by_id($id);
    $this->data['produk'] = $this->Produk_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Ubah Data '.$this->data['module'];
      $this->data['action']         = site_url('admin/produk/update_action');
      $this->data['button_submit']  = 'Simpan';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_produk'] = array(
        'name'  => 'id_produk',
        'id'    => 'id_produk',
        'type'  => 'hidden',
      );
      $this->data['judul_produk'] = array(
        'name'  => 'judul_produk',
        'id'    => 'judul_produk',
        'class' => 'form-control',
      );
      $this->data['keywords'] = array(
        'name'  => 'keywords',
        'id'    => 'keywords',
        'class' => 'form-control',
      );
      $this->data['deskripsi'] = array(
        'name'  => 'deskripsi',
        'id'    => 'deskripsi',
        'class' => 'form-control',
      );
      $this->data['harga_normal'] = array(
        'name'        => 'harga_normal',
        'id'          => 'b',
        'class'       => 'form-control',
        'placeholder'	=> 'Isikan angka saja',
        'onkeyup'			=> 'hitung();',
      );
      $this->data['diskon'] = array(
        'name'        => 'diskon',
        'id'          => 'a',
        'class'       => 'form-control',
        'placeholder'	=> 'Isikan angka saja',
        'onkeyup'			=> 'hitung();',
      );
      $this->data['harga_diskon'] = array(
        'name'        => 'harga_diskon',
        'id'          => 'd',
        'class'       => 'form-control',
        'placeholder'	=> 'Isikan angka saja',
        'onkeyup'			=> 'hitung();',
      );
      $this->data['stok'] = array(
        'name'        => 'stok',
        'id'          => 'stok',
        'class'       => 'form-control',
        'placeholder'	=> 'Isikan angka saja',
      );
      $this->data['berat'] = array(
        'name'        => 'berat',
        'id'          => 'berat',
        'class'       => 'form-control',
        'placeholder'	=> 'Isikan angka saja',
      );
      $this->data['kat_id'] = array(
        'name'  => 'kat_id',
        'id'    => 'kat_id',
        'class' => 'form-control',
        'onChange' => 'tampilSubkat()',
        'required'    => '',
      );
      $this->data['subkat_id'] = array(
        'name'  => 'subkat_id',
        'id'    => 'subkat_id',
        'class' => 'form-control',
        'onChange' => 'tampilSuperSubkat()',
        'required'    => '',
      );
      $this->data['supersubkat_id'] = array(
        'name'  => 'supersubkat_id',
        'id'    => 'supersubkat_id',
        'class' => 'form-control',
        'required'    => '',
      );

      $kat = $row->kat_id;
      $subkat = $row->subkat_id;

      $this->data['ambil_kategori']     = $this->Kategori_model->ambil_kategori();
      $this->data['ambil_subkat']       = $this->Kategori_model->ambil_subkat($kat);
      $this->data['ambil_supersubkat']  = $this->Kategori_model->ambil_supersubkat($subkat);

      $this->load->view('back/produk/produk_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/produk'));
      }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->update($this->input->post('id_produk'));
    }
      else
      {
        $nmfile = strtolower(url_title($this->input->post('judul_produk'))).date('YmdHis');
        $id['id_produk'] = $this->input->post('id_produk');

        /* Jika file upload diisi */
        if ($_FILES['foto']['error'] <> 4)
        {
          $nmfile = strtolower(url_title($this->input->post('judul_produk'))).date('YmdHis');
          
          //load uploading file library
          $config['upload_path']      = './assets/images/produk/';
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

            $this->update($this->input->post('id_produk'));
          }
            // Jika file berhasil diupload -> lanjutkan ke query INSERT
            else
            {
              $delete = $this->Produk_model->del_by_id($this->input->post('id_produk'));

              $dir        = "assets/images/produk/".$delete->foto.$delete->foto_type;
              $dir_thumb  = "assets/images/produk/".$delete->foto.'_thumb'.$delete->foto_type;

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
              $config['source_image']   = './assets/images/produk/'.$foto['file_name'].'';
              // membuat thumbnail
              $config['create_thumb']   = TRUE;
              // rasio resolusi
              $config['maintain_ratio'] = FALSE;
              // lebar
              $config['width']          = 400;
              // tinggi
              $config['height']         = 400;

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $data = array(
                'judul_produk'    => $this->input->post('judul_produk'),
                'slug_produk'     => strtolower(url_title($this->input->post('judul_produk'))),
                'keywords'        => strtolower($this->input->post('keywords')),
                'deskripsi'       => $this->input->post('deskripsi'),
                'kat_id'          => $this->input->post('kat_id'),
                'subkat_id'       => $this->input->post('subkat_id'),
                'supersubkat_id'  => $this->input->post('supersubkat_id'),
                'harga_normal' 	  => $this->input->post('harga_normal'),
                'diskon' 	        => $this->input->post('diskon'),
                'harga_diskon' 	  => $this->input->post('harga_diskon'),
                'stok' 				    => $this->input->post('stok'),
                'berat' 				  => $this->input->post('berat'),
                'foto'            => $nmfile,
                'foto_type'       => $foto['file_ext'],
                'updater'         => $this->session->userdata('username')
              );

              $this->Produk_model->update($this->input->post('id_produk'), $data);
              $this->session->set_flashdata('message', '
              <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
              </div>');
              redirect(site_url('admin/produk'));
            }
        }
          // Jika file upload kosong
          else
          {
            $data = array(
              'judul_produk'    => $this->input->post('judul_produk'),
              'slug_produk'     => strtolower(url_title($this->input->post('judul_produk'))),
              'keywords'        => strtolower($this->input->post('keywords')),
              'deskripsi'       => $this->input->post('deskripsi'),
              'kat_id'          => $this->input->post('kat_id'),
              'subkat_id'       => $this->input->post('subkat_id'),
              'supersubkat_id'  => $this->input->post('supersubkat_id'),
              'harga_normal' 	  => $this->input->post('harga_normal'),
              'diskon' 	        => $this->input->post('diskon'),
              'harga_diskon' 	  => $this->input->post('harga_diskon'),
              'stok' 				    => $this->input->post('stok'),
              'berat' 				  => $this->input->post('berat'),
              'updater'         => $this->session->userdata('username')
            );

            $this->Produk_model->update($this->input->post('id_produk'), $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
              <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
            </div>');
            redirect(site_url('admin/produk'));
          }
      }
  }

  public function delete($id)
  {
    $delete = $this->Produk_model->del_by_id($id);

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/images/produk/".$delete->foto.$delete->foto_type;
    $dir_thumb = "assets/images/produk/".$delete->foto.'_thumb'.$delete->foto_type;

    // Hapus foto
    unlink($dir);
    unlink($dir_thumb);

    // Jika data ditemukan, maka hapus foto dan record nya
    if($delete)
    {
      $this->Produk_model->delete($id);

      $this->session->set_flashdata('message', '
      <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil dihapus
      </div>');
      redirect(site_url('admin/produk'));
    }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/produk'));
      }
  }

  public function pilih_subkategori(){
		$this->data['subkategori']=$this->Kategori_model->ambil_subkategori($this->uri->segment(4));
		$this->load->view('back/produk/v_subkat',$this->data);
	}

  public function pilih_supersubkategori(){
		$this->data['supersubkategori']=$this->Kategori_model->ambil_supersubkategori($this->uri->segment(4));
		$this->load->view('back/produk/v_supersubkat',$this->data);
	}

  public function _rules()
  {
    $this->form_validation->set_rules('judul_produk', 'Judul Produk', 'trim|required');

    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_produk', 'id_produk', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
  }

    //export function
    public function export() {
      error_reporting(E_ALL);
  
      include_once './assets/phpexcel/Classes/PHPExcel.php';
      $objPHPExcel = new PHPExcel();
  
      $data = $this->Produk_model->get_all();
  
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->setActiveSheetIndex(0);
      $rowCount = 1;
  
      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID Produk");
      $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Judul Produk");
      $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Slug Produk");
      $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Deskripsi");
      $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Berat");
      $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Harga Normal");
      $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Diskon");
      $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Harga Diskon");
      $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "Stok");
      $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, "Uploader");
      $rowCount++;
  
      foreach($data as $value){
          $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_produk);
          $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->judul_produk);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->slug_produk);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->deskripsi);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->berat);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->harga_normal);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->diskon);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->harga_diskon);
          $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->stok);
          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->uploader);
          $rowCount++;
      }
  
      $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
      $objWriter->save('./assets/excel/DataProduk.xlsx');
  
      $this->load->helper('download');
      force_download('./assets/excel/DataProduk.xlsx', NULL);
    }

}
