<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->helper('berat_helper');

    $this->load->model('Cart_model');
    $this->load->model('Company_model');

    $this->data['module'] = 'Pemesanan';

    $this->data['company_data'] 			= $this->Company_model->get_by_company();

    if (!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
  }

  public function index()
  {
    $this->data['title']            = 'Data '.$this->data['module'];
    $this->data['penjualan_data']   = $this->Cart_model->get_all();

    $this->load->view('back/penjualan/penjualan_list', $this->data);
  }

  public function view($id)
  {
    $row      = $this->Cart_model->get_by_id($id);
    $invoice = $row->id_trans;

    $this->data['penjualan'] = $this->Cart_model->get_by_id($id);

    if($row)
    {
      $this->data['title']              = 'Detail '.$this->data['module'];
      
      // ambil data keranjang
  		$this->data['cart_data'] 			    			= $this->Cart_model->get_cart_per_customer_finished_back($invoice);
  		// ambil total_berat_dan_subtotal
  		$this->data['total_berat_dan_subtotal'] = $this->Cart_model->get_total_berat_dan_subtotal_finished_back($invoice);
      $this->data['customer_data'] 			    	= $this->Cart_model->get_data_customer_back($invoice);

      $this->load->view('back/penjualan/penjualan_detail', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
        redirect(site_url('admin/penjualan'));
      }
  }

  public function update($id)
  {
    $row      = $this->Cart_model->get_by_id($id);
    $invoice  = $row->id_trans;

    $this->data['penjualan'] = $this->Cart_model->get_by_id($id);
    
    if($row)
    {
      $this->data['title']              = 'Update Status '.$this->data['module'];

      $this->data['id_trans'] = array(
        'name'  => 'id_trans',
        'id'    => 'id_trans',
        'class' => 'form-control',
        'type'  => 'hidden',
      );
      $this->data['resi'] = array(
        'name'  => 'resi',
        'id'    => 'resi',
        'class' => 'form-control',
        'required' => ''
      );

      $this->load->view('back/penjualan/penjualan_status', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
        redirect(site_url('admin/penjualan'));
      }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->update($this->input->post('id_trans'));
    }
      else
      {
        $data = array(
          'resi'    => $this->input->post('resi'),
          'status'  => '3',
        );

        $this->Cart_model->update($this->input->post('id_trans'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert">Edit Data Berhasil</div>');
        redirect(site_url('admin/penjualan'));
      }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('resi', 'No. Resi', 'trim|required');
    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_trans', 'id_trans', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
  }

  //export function
  public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->Cart_model->get_all();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		$rowCount = 1;

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama User");
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Created");
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Ongkir");
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Kurir");
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Service");
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Status");
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Resi");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_trans);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->user_id);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->created);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->ongkir);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->kurir);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->service);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->status);
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->resi);
		    $rowCount++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save('./assets/excel/DataPenjualan.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/DataPenjualan.xlsx', NULL);
	}

}
