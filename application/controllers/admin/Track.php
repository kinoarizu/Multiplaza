<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Track extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Tracking_model');
    $this->load->model('Wilayah_model');

    $this->data['module'] = 'Track';

		if (!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
  }

  public function index()
  {
    $this->data['title'] = "Data Track";
    $this->load->view('back/track/track_list', $this->data);
  }

  public function ajax_list()
	{
		//get_datatables terletak di model
    $list = $this->Tracking_model->get_datatables();
    $data = array();
    // $no = $_POST['start'];
    $draw    = intval($this->input->get("draw"));
    $no      = intval($this->input->get("start"));
    $length  = intval($this->input->get("length"));
    
    // print_r("<pre>");
    // print_r($list);
    // print_r("</pre>");

    // Membuat loop/ perulangan
    foreach ($list as $data_track) {
			$no++;
			$row = array();
      $row[] = '<p style="text-align: center">'.$no.'</p>';
      $row[] = '<p style="text-align: left">'.$data_track->tgl_tracking.'</p>';
      $row[] = '<p style="text-align: center">+'.$data_track->status_tracking.'</p>';
      $row[] = '<p style="text-align: center">+'.$data_track->provinsi.'</p>';
      $row[] = '<p style="text-align: center">+'.$data_track->kota.'</p>';
      $row[] = '<p style="text-align: center">+'.$data_track->alamat_tracking.'</p>';
      $row[] = '<p style="text-align: center">+'.$data_track->no_resi.'</p>';
     

      // Penambahan tombol edit dan hapus
      $row[] = '
      <p style="text-align: center">
      	<a class="btn btn-sm btn-warning" href="'.base_url('admin/track/update/').$data_track->id_tracking.'" title="Edit"><i class="fa fa-pencil"></i></a>
        <a class="btn btn-sm btn-danger" href="'.base_url('admin/track/delete/').$data_track->id_tracking.'" title="Hapus" onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"><i class="glyphicon glyphicon-remove"></i></a>
			</p>';

      $data[] = $row;
    }

    $output = array(
              "draw" => $draw,
              "recordsTotal" => $this->Tracking_model->count_all(),
              "recordsFiltered" => $this->Tracking_model->count_filtered(),
              "data" => $data
              );
    //output to json format
    echo json_encode($output);
  }

  public function create()
  {
    $this->data['allidresi'] = $this->Tracking_model->resi();
    $this->data['title']          = 'Tambah Data '.$this->data['module'];
    $this->data['action']         = site_url('admin/track/create_action');
    $this->data['button_submit']  = 'Simpan';
    $this->data['button_reset']   = 'Reset';

    $this->data['tgl_tracking'] = array(
      'name'  => 'tgl_tracking',
      'id'    => 'tgl_tracking',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('tgl_tracking'),
    );

    $this->data['status_tracking'] = array(
      'name'  => 'status_tracking',
      'id'    => 'status_tracking',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('status_tracking'),
      'required'=> '',
    );

    $this->data['provinsi_id'] = array(
        'name'        => 'provinsi_id',
        'id'          => 'provinsi_id',
        'class'       => 'form-control',
        'onChange'    => 'tampilKota()',
        'required'    => '',
      );
      
      $this->data['kota_id'] = array(
        'name'        => 'kota_id',
        'id'          => 'kota_id',
        'class'       => 'form-control',
        'required'    => '',
      );


      $this->data['alamat_tracking'] = array(
        'name'  => 'alamat_tracking',
        'id'    => 'alamat_tracking',
        'class' => 'form-control',
        'value' => $this->form_validation->set_value('alamat_tracking'),
      );

      $this->data['no_resi'] = array(
        'name'  => 'no_resi',
        'id'    => 'no_resi',
        'class' => 'form-control',
        'value' => $this->form_validation->set_value('no_resi'),
      );

      $this->data['subkat_id'] = array(
        'name'  => 'no_resi',
        'id'    => 'subkat_id',
        'class' => 'form-control',
        'required'    => '',
      );

      $this->data['ambil_status'] = array(
        'dikirim' => 'dikirim',
        'sampai'  => 'sampai'
      );

      $this->data['ambil_provinsi'] = $this->Wilayah_model->get_provinsi();
// print_r($this->data['provinsi_id']);
    $this->load->view('back/track/track_add', $this->data);
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
        $data = array(
          'tgl_tracking'  => $this->input->post('tgl_tracking'),
          'status_tracking'  => $this->input->post('status_tracking'),
          'provinsi' 		=> $this->input->post('provinsi_id'),
          'kota'   			=> $this->input->post('kota_id'),
          'alamat_tracking'  => $this->input->post('alamat_tracking'),
          'no_resi'  => $this->input->post('no_resi'),
          
        );

       
        // eksekusi query INSERT
        $this->Tracking_model->insert($data);
        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
        </div>');
        redirect(site_url('admin/track'));
      }
  }

	public function pilih_kota()
	{
		$this->data['kota']=$this->Wilayah_model->get_kota($this->uri->segment(1));
		$this->load->view('back/track/kota',$this->data);
	}


  public function update($id)
  {
    $row = $this->Tracking_model->get_by_id($id);
    $this->data['track'] = $this->Tracking_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Ubah Data '.$this->data['module'];
      $this->data['action']         = site_url('admin/track/update_action');
      $this->data['button_submit']  = 'Simpan';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_tracking'] = array(
        'name'  => 'id_tracking',
        'id'    => 'id_tracking',
        'type'  => 'hidden',
      );

      $this->data['tgl_tracking'] = array(
        'name'  => 'tgl_tracking',
        'id'    => 'tgl_tracking',
        'class' => 'form-control',
      );

      $this->data['status_tracking'] = array(
        'name'  => 'status_tracking',
        'id'    => 'status_tracking',
        'class' => 'form-control',
      );

      $this->data['kota_tracking'] = array(
        'name'  => 'kota_tracking',
        'id'    => 'kota_tracking',
        'class' => 'form-control',
      );

      $this->data['alamat_tracking'] = array(
        'name'  => 'alamat_tracking',
        'id'    => 'alamat_tracking',
        'class' => 'form-control',
      );

      $this->data['no_resi'] = array(
        'name'  => 'no_resi',
        'id'    => 'no_resi',
        'class' => 'form-control',
      );

      $this->load->view('back/track/track_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/track'));
      }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->update($this->input->post('id_tracking'));
    }
      else
      {
        $data = array(
            'tgl_tracking'  => $this->input->post('tgl_tracking'),
            'status_tracking'  => $this->input->post('status_tracking'),
            'kota_tracking'  => $this->input->post('kota_tracking'),
            'alamat_tracking'  => $this->input->post('alamat_tracking'),
            'no_resi'  => $this->input->post('no_resi'),
        );

        $this->Tracking_model->update($this->input->post('id_tracking'), $data);
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
        </div>');
        redirect(site_url('admin/track'));
      }
  }

  public function delete($id)
  {
    $row = $this->Tracking_model->get_by_id($id);

    if ($row)
    {
      $this->Tracking_model->delete($id);
      $this->session->set_flashdata('message', '
      <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil dihapus
      </div>');
      redirect(site_url('admin/track'));
    }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/track'));
      }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('tgl_tracking', 'Tanggal Tracking', 'trim|required');
    $this->form_validation->set_rules('status_tracking', 'Status Tracking', 'trim|required');
    $this->form_validation->set_rules('alamat_tracking', 'Alamat Tracking', 'trim|required');
    $this->form_validation->set_rules('no_resi', 'No Resi', 'trim|required');

    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_tracking', 'id_tracking', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert" align="left">', '</div>');
  }

}
