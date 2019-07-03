<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* mengatur pesan error */
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		/*memanggil bahasa/ language bawaan ion_auth*/
		$this->lang->load('auth');

		/* memanggil model untuk ditampilkan pada masing2 modul*/
		$this->load->model('Ion_auth_model');

		$this->data['title'] = "Multi Plaza";
  /* memanggil model untuk ditampilkan pada masing2 modul */
  $this->load->model('Blog_model');
  $this->load->model('Cart_model');
  $this->load->model('Company_model');
  $this->load->model('Featured_model');
  $this->load->model('Kategori_model');
  $this->load->model('Kontak_model');
  $this->load->model('Produk_model');
  $this->load->model('Ion_auth_model');
  $this->data['total_notif']			= $this->Cart_model->total_terkirim_navbar();
		$this->data['isi_notif']			= $this->Cart_model->isi_terkirim_navbar();

/* memanggil function dari masing2 model yang akan digunakan */
  $this->data['blog_data'] 					= $this->Blog_model->get_all_sidebar();
  $this->data['company_data'] 			= $this->Company_model->get_by_company();
  $this->data['featured_data'] 			= $this->Featured_model->get_all_front();
  $this->data['kategori_data'] 			= $this->Kategori_model->get_all();
  $this->data['kontak'] 						= $this->Kontak_model->get_all();
  $this->data['total_cart_navbar'] 	= $this->Cart_model->total_cart_navbar();
    }
    
    
 public function profile($id)
	{
		$this->data['profil_data'] 	= $this->Ion_auth_model->get_profil_seller($id)->row();
		$this->data['profil'] 			= $this->Ion_auth_model->get_ads_profil_seller($id)->result();
    $this->data['page'] 				= 'Toko '.$this->data['profil_data']->username;
    
		$this->load->view('front/user/profile', $this->data);
	} 
}