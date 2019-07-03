<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

  function __construct()
  {
    parent::__construct();

		$this->load->model('Blog_model');
    $this->load->model('Cart_model');
		$this->load->model('Company_model');
    $this->load->model('Featured_model');
		$this->load->model('Kategori_model');
    $this->load->model('Kontak_model');
    $this->load->model('Produk_model');
    $this->data['total_notif']			= $this->Cart_model->total_terkirim_navbar();
		$this->data['isi_notif']			= $this->Cart_model->isi_terkirim_navbar();

		$this->data['company_data'] 			= $this->Company_model->get_by_company();
		$this->data['blog_data'] 					= $this->Blog_model->get_all_sidebar();
		$this->data['featured_data'] 			= $this->Featured_model->get_all_front();
		$this->data['kategori_data'] 			= $this->Kategori_model->get_all();
		$this->data['kontak'] 						= $this->Kontak_model->get_all();
    $this->data['total_cart_navbar'] 	= $this->Cart_model->total_cart_navbar();
	}

  private $limit = 9;

  public function read($id)
  {
    $this->load->helper(array('clean'));
    $this->data['segment'] = count($this->uri->segment_array());

    $segment  = count($this->uri->segment_array());
    $segments = $this->uri->segment_array();

    $offset = 0;

    if($segment==3 || ($segment==4 && is_numeric($segments[4])))
    {
      $this->data['title'] = strtoupper(clean2($this->uri->segment(3)));
      if($segment==4)
      $offset = $segments[4];

      $this->data['produk_row'] = $this->Kategori_model->get_list_by_kategori($segments[3], $this->limit, $offset)->row();

      $this->data['produk'] = $this->Kategori_model->get_list_by_kategori($segments[3], $this->limit, $offset);

      $this->data['pagination'] = $this->generate_paging($this->Kategori_model->get_by_kategori_nr($segments[3]), base_url() . 'kategori/read/' . $segments[3],  4);

    }
    else if($segment==4 || ($segment==5 && is_numeric($segments[5])))
    {
      $this->data['title'] = strtoupper(clean2($this->uri->segment(4)));

      if($segment==5)
      $offset = $segments[5];

      $this->data['produk_row'] = $this->Kategori_model->get_list_by_subkategori($segments[4], $this->limit, $offset)->row();

      $this->data['produk'] = $this->Kategori_model->get_list_by_subkategori($segments[4], $this->limit, $offset);

      $this->data['pagination'] = $this->generate_paging($this->Kategori_model->get_by_subkategori_nr($segments[4]), base_url() . 'kategori/read/' . $segments[3] . '/' . $segments[4],  5);

    }
    else if($segment==5 || ($segment==6 && is_numeric($segments[6])))
    {
      $this->data['title'] = strtoupper(clean2($this->uri->segment(5)));

      if($segment==6)
      $offset = $segments[6];

      $this->data['produk_row'] = $this->Kategori_model->get_list_by_superskategori($segments[5], $this->limit, $offset)->row();

      $this->data['produk'] = $this->Kategori_model->get_list_by_superskategori($segments[5], $this->limit, $offset);

      $this->data['pagination'] = $this->generate_paging($this->Kategori_model->get_by_superskategori_nr($segments[5]), base_url() . 'kategori/read/' . $segments[3] . '/' . $segments[4] . '/' . $segments[5],  6);

    }
    $this->load->view('front/kategori/body', $this->data);
  }

  function generate_paging($numRows, $url, $uriSegment, $suffix='')
  {
  	$this->load->library('Pagination');

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

    $config['base_url'] = $url;
  	$config['total_rows'] = $numRows;
  	$config['per_page'] = $this->limit;
  	$config['uri_segment'] = $uriSegment;
    $config['suffix'] = $suffix;
  	$config['first_url'] = $config['base_url'] . $config['suffix'];
  	$this->pagination->initialize($config);
  	return $this->pagination->create_links();
	}

}
