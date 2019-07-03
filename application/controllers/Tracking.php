<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tracking extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->helper('berat_helper');

    $this->load->model('Bank_model');
    $this->load->model('Track_model');
    $this->load->model('Tracking_model');
    $this->load->model('Cart_model');
    $this->load->model('Company_model');
    $this->load->model('Kontak_model');
    $this->load->model('Produk_model');
    $this->data['total_notif']			= $this->Cart_model->total_terkirim_navbar();
		$this->data['isi_notif']			= $this->Cart_model->isi_terkirim_navbar();
    $this->data['company_data'] 			= $this->Company_model->get_by_company();
    $this->data['kontak'] 						= $this->Kontak_model->get_all();
    $this->data['total_cart_navbar'] 	= $this->Cart_model->total_cart_navbar();
  }

  public function index()
  {
    $this->data['title'] 										= 'Tracking';

    // ambil data keranjang
    $this->data['cart_data'] 			    			= $this->Cart_model->get_cart_per_customer();
    // ambil total_berat_dan_subtotal
    $this->data['total_berat_dan_subtotal'] = $this->Cart_model->get_total_berat_dan_subtotal();
    // ambil data customer
    $this->data['customer_data'] 			    	= $this->Cart_model->get_data_customer();


    // print_r($this->data['cart_data']);
    $this->load->view('front/cart/body', $this->data);
  }

  public function history()
	{
		if ($this->session->userdata('name') != '') {

      $this->data['title'] 							= 'Tracking List';
      $this->data['cek_cart_history']	  = $this->Track_model->cart_history()->row();
      $this->data['cart_history']	    	= $this->Track_model->cart_history()->result();

      $this->load->view('front/tracking/tracking_list', $this->data);
    } else {
			redirect(site_url());
		}
  }
  
  public function tracking_detail($resi)
  {
    $this->data['title']       = 'Tracking Detail';
    $this->data['detail_track'] = $this->Tracking_model->detail_track($resi);

    // print_r($this->data['detail_track']);
		$this->load->view('front/tracking/tracking_detail', $this->data);


  }

}
