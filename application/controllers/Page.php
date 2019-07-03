<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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
		$this->load->model('Bank_model');
		$this->load->model('Konfirmasipembayaran_model');
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

	public function company()
	{
		$this->data['title'] 							= 'Profil Toko';

    /* melakukan pengecekan data, apabila ada maka akan ditampilkan */
  	$this->data['company']            = $this->Company_model->get_by_company();

    /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
		$this->load->view('front/company/body', $this->data);
	}


	public function konfirmasi_pembayaran()
	{
		if ($this->session->userdata('name') != '') {

			$this->data['title'] 							= 'Konfirmasi Pembayaran';
			$this->data['action']							= site_url('konfirmasi_kirim');
			$this->data['bank_asal']					= array(
				'name'		=> 'bank_asal',
				'id'			=> 'bank_asal',
				'class'		=> 'form-control',
				'required'=> '',
			);
			$this->data['bank_tujuan']					= array(
				'name'		=> 'bank_tujuan',
				'id'			=> 'bank_tujuan',
				'class'		=> 'form-control',
				'required'=> '',
			);
			$this->data['nama_bank'] 					= $this->Bank_model->nama_bank();

			$this->data['invoice']	= $this->input->post('invoice');
			$this->data['grandtot'] = $this->input->post('grandtot');
			
			$this->load->view('front/page/konfirmasi_pembayaran', $this->data);
		
		} else {
			redirect(site_url());
		}
	}

	public function konfirmasi_kirim()
	{
		if ($_FILES['bukti_pembayaran']['error'] <> 4) {
			$nmfile = strtolower(url_title($this->input->post('invoice'))).date('YmdHis');

			 /* memanggil library upload ci */
			 $config['upload_path']      = './assets/images/bukti/';
			 $config['allowed_types']    = 'jpg|jpeg|png|gif';
			 $config['max_size']         = '2048'; // 2 MB
			 $config['file_name']        = $nmfile; //nama yang terupload nantinya

			 $this->load->library('upload', $config);

			 if (!$this->upload->do_upload('bukti_pembayaran')) {
				 $error = array('error' => $this->upload->display_errors());
				 $this->session->set_flashdata('message', '<div class="alert alert-danger alert">'.$error['error'].'</div>');
				 
				 redirect(site_url('konfirmasi_pembayaran'));
			 } else {
				 $foto = $this->upload->data();
				 $thumbnail									= $config['file_name'];
				 $config['image_library']		= 'gd2';
				 $config['source_image']		= './assets	/images/bukti/'.$foto['file_name'].'';
				 $config['maintain_ration']	= FALSE;
				 $config['width']						= 1200;
				 $config['height']					= 400;

				 $this->load->library('image_lib', $config);
				 $this->image_lib->resize();

				 $data = array(
					'invoice'	=> $this->input->post('invoice'),
					'nama'		=> $this->input->post('nama'),
					'jumlah'	=> $this->input->post('jumlah'),
					'bank_asal'=>$this->input->post('bank_asal'),
					'bank_tujuan'=>$this->input->post('bank_tujuan'),
					'foto'		=> $nmfile,
					'foto_type'=> $foto['file_ext']
				 );

				 $this->Konfirmasipembayaran_model->insert($data);

				 $data2 = array(
					// 'id_trans'		=>	$this->input->post('invoice'),
					'status'			=> 2
				 );
				 $this->db->where('id_trans',$this->input->post('invoice'));
				 $this->db->update('transaksi', $data2);

				 $this->session->set_flashdata('message', '<div class="alert alert-success alert"> Bukti berhasil diupload</div>');
				 redirect(site_url('konfirmasi_pembayaran'));
			 }
		} else {
			$this->session->set_flashdata('message', '<div class="row"><div class="col-lg-12"><div class="alert alert-danger alert">Bukti Pembayaran tidak ada</div></div></div>');
			redirect(site_url('konfirmasi_pembayaran'));
		}
		// ambil value dari masing2 form input
		// $invoice 			= $this->input->post('invoice');
		// $nama 				= $this->input->post('nama');
		// $jumlah 			= $this->input->post('jumlah');
		// $bank_asal 		= $this->input->post('bank_asal');
		// $bank_tujuan 	= $this->input->post('bank_tujuan');

		// setingan default tanpa smtp
		// $this->load->library('email');

		// $this->email->from('mail@azmicolejr.com', 'Konfirmasi Pembayaran Baru');
		// $this->email->to('azmicolejr@gmail.com');
		// $this->email->subject('Konfirmasi Pembayaran Baru');
		// $this->email->message('Halo bos, ada konfirmasi pembayaran baru dengan rincian sebagai berikut: <br>
		// No. Invoice: '.$invoice.'<br>
		// Nama Lengkap: '.$nama.'<br>
		// Jumlah: '.$jumlah.'<br>
		// Bank Asal: '.$bank_asal.'<br>
		// Bank Tujuan: '.$bank_tujuan.'<br>
		// Silahkan diproses bos pesanannya. Customer menunggu.
		// ');

		// if ($this->email->send())
    // {
		// 	$this->session->set_flashdata('message', '<div class="row"><div class="col-lg-12"><div class="alert alert-success alert">Konfirmasi pembayaran telah berhasil</div></div></div>');
		// 	redirect(site_url('konfirmasi_pembayaran'));
    // }
    // else
    // {
		// 	$this->session->set_flashdata('message', '<div class="row"><div class="col-lg-12"><div class="alert alert-danger alert">Konfirmasi pembayaran gagal, silahkan coba kembali</div></div></div>');
		// 	redirect(site_url('konfirmasi_pembayaran'));
    // }

		// Konfigurasi email dengan smtp
    // $config = [
    //    'smtp_host' => 'ssl://smtp.gmail.com',
    //    'smtp_user' => 'azmicolejr@gmail.com',   // Ganti dengan email gmail Anda.
    //    'smtp_pass' => 'passwordemailanda',             // Password gmail Anda.
    //    'smtp_port' => 465,
   // 	];
		//
    // // Load library email dan konfigurasinya.
    // $this->load->library('email', $config);
		//
    // // Pengirim dan penerima email.
    // $this->email->from('no-reply@azmicolejr.com', 'no-reply');    // Email dan nama pegirim.
    // $this->email->to('azmi2793@gmail.com');                       // Penerima email.
		//
    // // Subject email.
    // $this->email->subject('Kirim Email pada CodeIgniter');
		//
    // // Isi email. Bisa dengan format html.
		// $this->email->message('Halo bos, ada konfirmasi pembayaran baru dengan rincian sebagai berikut: <br>
		// No. Invoice: '.$invoice.'<br>
		// Nama Lengkap: '.$nama.'<br>
		// Jumlah: '.$jumlah.'<br>
		// Bank Asal: '.$bank_asal.'<br>
		// Bank Tujuan: '.$bank_tujuan.'<br>
		// Silahkan diproses bos pesanannya. Customer menunggu.
		// ');
		//
    // if ($this->email->send())
    // {
    //   echo 'Sukses! email berhasil dikirim.';
    // }
    // else
    // {
    //   echo 'Error! email tidak dapat dikirim.';
    // }
	}

}
