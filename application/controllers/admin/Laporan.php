<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
  {
		parent::__construct();
		$this->load->model('Cart_model');
    $this->load->model('Ion_auth_model');
    $this->load->model('Company_model');

		$this->load->helper('tgl_indo');

    $this->data['module'] = 'Laporan';

    $this->data['company_data'] 			= $this->Company_model->get_by_company();

		// apabila belum login maka diarahkan ke halaman login
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
	}

  public function index()
  {
    $this->data['title'] = "Laporan Penjualan";
    $this->load->view('back/laporan/body',$this->data);
  }

  public function export_all()
  {
    $this->data['get_all']    = $this->Cart_model->get_all();
    $this->load->view('back/laporan/print_all',$this->data);
  }

  public function export_periode()
  {
    $this->data['get_periode']        = $this->Cart_model->get_data_penjualan_periode();

    $this->load->view('back/laporan/print_periode',$this->data);
  }

}
