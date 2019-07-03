<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{
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

	public function read($id)
	{
    /* mengambil data berdasarkan id */
		$row = $this->Produk_model->get_by_id_front($id);
		// $this->data['seller']         = $this->Produk_model->get_by_id_iklan_seller($segments[4]);
		$cap = $this->buat_captcha();
		$this->data['cap_img'] = $cap['image'];
    $this->session->set_userdata('kode_captcha', $cap['word']);

    $this->data['segment'] = count($this->uri->segment_array());

    $segment = count($this->uri->segment_array());
    $segments = $this->uri->segment_array();
    $this->data['get_komentar']   = $this->Produk_model->get_komentar($id);

    /* melakukan pengecekan data, apabila ada maka akan ditampilkan */
		if ($row)
    {
      /* memanggil function dari masing2 model yang akan digunakan */
    	$this->data['produk']       	= $this->Produk_model->get_by_id_front($id);
			$this->data['produk_lainnya']	= $this->Produk_model->get_random();
      $this->data['get_komentar']   = $this->Produk_model->get_komentar($id);
      $this->data['title'] = $row->judul_produk;
      

      //sebagai
      switch ($this->data['produk']->usertype) {
        case '1':
          $this->data['sebagai'] = "superadmin";
          break;
        case '2':
          $this->data['sebagai'] = "admin";
          break;
        case '3':
          $this->data['sebagai'] = "manager";
          break;
        case '4':
          $this->data['sebagai'] = "supplier";
          break;
        case '5':
          $this->data['sebagai'] = "customer";
          break;
        default:
          $this->data['sebagai'] = "supplier";
          break;
      }

      /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
      $this->load->view('front/produk/body', $this->data);
      // print_r($this->data['produk']);
		}
			else
	    {
				echo "<script>alert('Produk tidak ditemukan');location.replace('".base_url()."')</script>";
			}
			
			if($segment==4)
    {
      /* memanggil function dari masing2 model yang akan digunakan */
      $this->data['seller']         = $this->Produk_model->get_by_id_iklan_seller($segments[4]);
      $this->data['produk']       	= $this->Produk_model->get_by_id_front($segments[4]);
      $this->data['produk_lainnya']	= $this->Produk_model->get_random($segments[4]);
      $this->data['get_komentar']   = $this->Produk_model->get_komentar($segments[4]);
			$this->data['title'] = $row->judul_produk;
      /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
			$this->load->view('front/produk/body', $this->data);
    }
	}

	//buat captcha
	public function buat_captcha()
  {
    /* memanggil helper captcha dan string */
    $this->load->helper('captcha');

    /* menyiapkan data variabel vals melalui array untuk proses pembuatan captcha */
    $vals = array(
      /* lokasi gambar captcha, ex: captcha */
      'img_path'      => './captcha/',
      /* alamat gambar captcha, ex: www.abcd.com/captcha */
      'img_url'       => base_url().'captcha/',
      /* tinggi gambar */
      'img_height'    => 30,
      /* waktu berlaku captcha disimpan pada folder aplikasi (100 = dalam detik) */
      'expiration'    => 100,
      /* jumlah huruf/ karakter yang ditampilkan */
      'word_length'   => 5,
      // pengaturan warna dan background captcha
      'colors'        => array(
                          'background' => array(255, 255, 255),
                          'border' => array(0, 0, 0),
                          'text' => array(0, 0, 0),
                          'grid' => array(255, 240, 0)
                        )
    );

    $cap = create_captcha($vals);
    return $cap;
  }

  public function komen($id)
  {
    /* set aturan form validasi pada form */
    $this->form_validation->set_rules('kode_captcha', 'Kode Captcha', 'callback_cek_captcha');

    /* pengecekan form_validation */
    if ($this->form_validation->run() === FALSE)
    {
      /* buat captcha */
      $cap = $this->buat_captcha();
      $this->data['cap_img'] = $cap['image'];
      $this->session->set_userdata('kode_captcha', $cap['word']);

      $this->read($id);
    }
      else
      {
        /* menyiapkan/ menyimpan data ke dalam array */
        $data = array(
          'produk_id'     => $this->input->post('produk_id'),
          'user_id'       => $this->session->userdata('user_id'),
          'isi_komentar'  => $this->input->post('isi_komentar'),
        );

        /* proses insert ke database melalui function yang ada pada model */
        $this->Produk_model->insert_komentar($data);

        /* menghapus session captcha */
        $this->session->unset_userdata('kode_captcha');

        /* membuat notifikasi pada halaman yang dituju */
        $this->session->set_flashdata('message', '<div class="alert alert-success">Komentar berhasil terkirim</div>');

        $this->read($id);
      }
  }

  public function cek_captcha($input)
  {
    /* pengecekan hasil input captcha */
    if($input === $this->session->userdata('kode_captcha'))
    {
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('cek_captcha', '%s yang anda input salah!');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
      return FALSE;
    }
  }

	public function cari_produk()
  {
    /* menyiapkan data yang akan disertakan/ ditampilkan pada view */
  	$this->data['title'] = 'Hasil Pencarian Anda';

    /* memanggil function dari model yang akan digunakan */
    $this->data['hasil_pencarian'] = $this->Produk_model->get_cari_produk();

    /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
    $this->load->view('front/produk/hasil_pencarian', $this->data);
  }

  public function katalog()
  {
    /* menyiapkan data yang akan disertakan/ ditampilkan pada view */
    $this->data['title'] = "Katalog Produk";

    /* memanggil library pagination (membuat halaman) */
    $this->load->library('pagination');

    /* menghitung jumlah total data */
    $jumlah = $this->Produk_model->total_rows();

    // Mengatur base_url
    $config['base_url'] = base_url().'produk/katalog/halaman/';
    //menghitung total baris
    $config['total_rows'] = $jumlah;
    //mengatur total data yang tampil per halamannya
    $config['per_page'] = 9;
    // tag pagination bootstrap

		$config['full_tag_open'] 		= '<nav><ul class="pagination">';
		$config['full_tag_close'] 	= '</ul></nav>';
		$config['num_tag_open'] 		= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] 		= '</span></li>';
		$config['cur_tag_open'] 		= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] 		= '<span class="sr-only">(current)</span></span></li>';
		$config['next_link']        = "Selanjutnya";
		$config['next_tag_open'] 		= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_link']        = "Sebelumnya";
		$config['prev_tag_open'] 		= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] 	= '</span></li>';
		$config['first_link']       = "Awal";
		$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_link']        = 'Terakhir';
		$config['last_tag_open'] 		= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] 	= '</span></li>';

    // mengambil uri segment ke-4
    $dari = $this->uri->segment('4');

    /* eksekusi library pagination ke model penampilan data */
    $this->data['katalog_data'] = $this->Produk_model->get_all_katalog($config['per_page'],$dari);
		
    $this->pagination->initialize($config);

    /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
    $this->load->view('front/produk/katalog', $this->data);
  }

}
