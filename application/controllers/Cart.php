<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct()
  {
    parent::__construct();
		$this->load->helper('berat_helper');

		$this->load->model('Bank_model');
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
		$this->data['title'] 										= 'Keranjang Belanja';

		// ambil data keranjang
		$this->data['cart_data'] 			    			= $this->Cart_model->get_cart_per_customer();
		// ambil total_berat_dan_subtotal
		$this->data['total_berat_dan_subtotal'] = $this->Cart_model->get_total_berat_dan_subtotal();
		// ambil data customer
		$this->data['customer_data'] 			    	= $this->Cart_model->get_data_customer();


		// print_r($this->data['cart_data']);
    $this->load->view('front/cart/body', $this->data);
  }

	public function buy($id)
	{
		// ambil data produk
		$row = $this->Produk_model->get_by_id($id);

		// cek id produk
    if($row)
    {
			// cek transaksi per user sedang login
			$cek_transaksi 	= $this->Cart_model->cek_transaksi();
			$id_trans 			= $cek_transaksi->id_trans;

			// cek data barang yang dibeli dan masuk ke tabel transaksi_detail
			$notransdet 				= $this->Cart_model->get_notransdet($id);

			// jika transaksi sudah ada
			if($cek_transaksi)
			{
				// jika barang yang dibeli sudah ada di cart == update
				if($notransdet)
				{
					$jmllama          = $notransdet->total_qty;
					$qty_new        	= $jmllama + 1;
					$subtotaltambah   = $qty_new * $row->harga_diskon;

					$jmlberatlama     = $row->berat;
					$jmlberattambah   = $jmlberatlama * $qty_new;

					$data = array(
						'total_qty'  	=> $qty_new,
						'total_berat' => $jmlberattambah,
						'subtotal'  	=> $subtotaltambah,
					);

					// update transaksi
					$this->Cart_model->update_transdet($id,$data);

					// set pesan data berhasil dibuat
					$this->session->set_flashdata('message', '<div class="alert alert-success alert">Barang berhasil ditambahkan</div>');
					redirect(site_url('cart'));
				}
					// jika barang yang dibeli belum ada di cart == tambahkan
					else
					{
						$data2 = array(
							'trans_id'  	=> $id_trans,
							'user'  			=> $this->session->userdata('user_id'),
							'produk_id' 	=> $id,
							'harga'  			=> $row->harga_diskon,
							'berat'  			=> $row->berat,
							'total_qty'  	=> '1',
							'total_berat' => $row->berat,
							'subtotal'  	=> $row->harga_diskon,
						);

						$this->Cart_model->insert_detail($data2);

						// set pesan data berhasil dibuat
						$this->session->set_flashdata('message', '<div class="alert alert-success alert">Barang berhasil ditambahkan</div>');
						redirect(site_url('cart'));
					}
			}
				// jika belum ada transaksi
				else
				{
					$data = array(
						'user_id'  => $this->session->userdata('user_id'),
					);

					// eksekusi query INSERT
					$this->Cart_model->insert($data);

					$cek_transaksi 	= $this->Cart_model->cek_transaksi();

					$data2 = array(
						'trans_id'  	=> $cek_transaksi->id_trans,
						'user'  			=> $this->session->userdata('user_id'),
						'produk_id' 	=> $id,
						'harga'  			=> $row->harga_diskon,
						'berat'  			=> $row->berat,
						'total_qty'  	=> '1',
						'total_berat' => $row->berat,
						'subtotal'  	=> $row->harga_diskon,
					);

					$this->Cart_model->insert_detail($data2);

					// set pesan data berhasil dibuat
					$this->session->set_flashdata('message', '<div class="alert alert-success alert">Barang berhasil ditambahkan</div>');
					redirect(site_url('cart'));
				}
		}
			else
			{
				$this->session->set_flashdata('message', '
				<div class="alert alert-block alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
				</div>');
				redirect(base_url());
			}
	}

	public function update($id)
	{
		$id = $this->input->post('produk_id');

		$row 			= $this->Produk_model->get_by_id($id);

		if(isset($_POST['update']))
		{
			$qty_new        	= $this->input->post('qty');
			$subtotaltambah   = $qty_new * $row->harga_diskon;

			$jmlberatlama     = $row->berat;
			$jmlberattambah   = $jmlberatlama * $qty_new;

			$data = array(
				'total_qty'  	=> $this->input->post('qty'),
				'total_berat' => $jmlberattambah,
				'subtotal'  	=> $subtotaltambah,
			);

			$this->Cart_model->update_transdet($id,$data);

			// set pesan data berhasil dibuat
			$this->session->set_flashdata('message', '<div class="alert alert-success alert">Berhasil Update Keranjang</div>');
			redirect(site_url('cart'));
		}
		elseif(isset($_POST['delete']))
		{
	    if ($row)
	    {
				$cek_transaksi 	= $this->Cart_model->cek_transaksi();

				$id_trans 			= $cek_transaksi->id_trans;

	      $this->Cart_model->delete($id,$id_trans);
	      $this->session->set_flashdata('message', '<div class="alert alert-success alert">Barang berhasil dihapus</div>');
	      redirect(site_url('cart'));
	    }
	      // Jika data tidak ada
	      else
	      {
	        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Barang tidak ditemukan</div>');
	        redirect(site_url('cart'));
	      }
		}
	}

	public function empty_cart($id_trans)
	{
		$id_trans = $this->uri->segment(3);

		$this->Cart_model->kosongkan_keranjang($id_trans);

		$this->session->set_flashdata('message', '<div class="alert alert-block alert-success"><i class="ace-icon fa fa-bullhorn green"></i> Keranjang Anda telah dikosongkan</div>');

		redirect(site_url('cart'));
	}

	public function checkout()
	{
		$this->data['title'] 							= 'Transaksi Selesai';

		// $id_trans = $this->input->post('id_trans');
		$id_user = $this->session->userdata('user_id');

		$data = array(
			'kurir'  		=> $this->input->post('kurir'),
			'ongkir' 		=> $this->input->post('ongkir'),
			'service'  	=> $this->input->post('service'),
			'status'		=> '1',
		);

		//
		$produk	= $this->Cart_model->get_idproduk($id_user);
		$id_produk = $produk->id_produk;
		$stok_lama = $produk->stok;
		$stok_dipesan = $this->input->post('qty');

		$stok_baru = $stok_lama - $stok_dipesan;

		$dat = array(
			'stok'	=> $stok_baru,
		);

		if ($this->input->post('submit') == 'lanjut' ) {
			$this->Cart_model->update_stok($id_produk,$dat);
			redirect(base_url());
		} else {
			$this->Cart_model->update_stok($id_produk,$dat);
			//
			// $this->Cart_model->checkout($id_user,$data);
			$this->Cart_model->checkout($data);

			$this->data['cart_finished']	    			= $this->Cart_model->get_cart_per_customer_finished($id_user);
			$this->data['customer_data'] 						= $this->Cart_model->get_data_customer();
			$this->data['total_berat_dan_subtotal'] = $this->Cart_model->get_total_berat_dan_subtotal_finished($id_user);
			$this->data['data_bank'] 								= $this->Bank_model->get_all();
	
	
			$this->session->set_flashdata('message', '
			<div class="col-lg-12">
				<div class="alert alert-block alert-success"><i class="ace-icon fa fa-bullhorn green"></i> Transaksi Selesai</div>
			</div>');
	
			$this->load->view('front/cart/finished', $this->data);
		}

	}

	public function download_invoice($id)
	{
    $row 			= $this->Cart_model->get_by_id($id);

    if ($row)
    {
      ob_start();

			$this->data['cart_finished']	    				= $this->Cart_model->get_cart_per_customer_finished($id);
			$this->data['total_berat_dan_subtotal'] 	= $this->Cart_model->get_total_berat_dan_subtotal_finished($id);
			$this->data['customer_data'] 							= $this->Cart_model->get_data_customer();
			$this->data['data_bank'] 									= $this->Bank_model->get_all();

      $this->load->view('front/cart/download_invoice', $this->data);

      $html = ob_get_contents();
      $html = '<title style="font-family: freeserif">'.nl2br($html).'</title>';
      ob_end_clean();

      require_once('application/libraries/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(10, 0, 10, 0));
      $pdf->setDefaultFont('Arial');
      $pdf->setTestTdInOnePage(false);
      $pdf->WriteHTML($html);
      $pdf->Output('download_invoice.pdf');
    }
      else
      {
        $this->session->set_flashdata('message', "<script>alert('Data tidak ditemukan');</script>");
        redirect(site_url());
      }

	}

	public function history()
	{
		if ($this->session->userdata('name') != '') {
			$this->data['title'] 							= 'Daftar Transaksi';
			$this->data['cek_cart_history']	  = $this->Cart_model->cart_history()->row();
			$this->data['cart_history']	    	= $this->Cart_model->cart_history()->result();

			$this->load->view('front/cart/history', $this->data);
		} else {
			redirect(site_url());
		}
	}

	public function history_detail($id)
	{
		$this->data['title'] 								= 'Detail Riwayat Transaksi';

		$this->data['history_detail']	    	= $this->Cart_model->history_detail($id)->result();
		$this->data['history_detail_row']		= $this->Cart_model->history_detail($id)->row();
		$this->data['history_total_berat'] 	= $this->Cart_model->history_total_berat($id);
		$this->data['subtotal_history'] 		= $this->Cart_model->subtotal_history($id);

		$this->data['customer_data'] 			    	= $this->Cart_model->get_data_customer();


		$this->load->view('front/cart/history_detail', $this->data);
	}

	public function kurirdata()
	{
		$this->load->library('rajaongkir');
		$tujuan	= $this->input->get('kota');
		$dari		= '327';
		$berat	= $this->input->get('berat');
		$kurir	= $this->input->get('kurir');
		$dc			= $this->rajaongkir->cost($dari,$tujuan,$berat,$kurir);
		$data		= json_decode($dc,TRUE);
		$o			= '';

		if(!empty($data['rajaongkir']['results']))
		{
			$data['data']=$data['rajaongkir']['results'][0]['costs'];
			$this->load->view('front/cart/datakurir',$data);
		}
	}

}
