<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct()
  {
    parent::__construct();
    /* memanggil model untuk ditampilkan pada masing2 modul */
    $this->load->model('Blog_model');
		$this->load->model('Cart_model');
    $this->load->model('Company_model');
		$this->load->model('Featured_model');
		$this->load->model('Kategori_model');
		$this->load->model('Kontak_model');
		$this->load->model('Produk_model');
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
	
	public function paymentway()
  {
		$this->data['title'] = 'Cara Pembayaran';
		$this->load->view('front/blog/payment_way', $this->data);
		
  }

	public function read($id)
	{
    /* mengambil data berdasarkan id */
		$row = $this->Blog_model->get_by_id_front($id);

    /* melakukan pengecekan data, apabila ada maka akan ditampilkan */
		if ($row)
    {
      /* memanggil function dari masing2 model yang akan digunakan */
    	$this->data['blog']            = $this->Blog_model->get_by_id_front($id);
      $this->data['blog_lainnya']    = $this->Blog_model->get_all_random();

      $this->data['title'] = $row->judul_blog;

      /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
			$this->load->view('front/blog/body', $this->data);
		}
		else
    {
			$this->session->set_flashdata('message', '
				<div class="col-lg-12">
					<div class="alert alert-dismissible alert-danger">
        		<button type="button" class="close" data-dismiss="alert">&times;</button>Blog tidak ditemukan</b>
					</div>
				</div>
			');
      redirect(base_url());
    }
	}

}
