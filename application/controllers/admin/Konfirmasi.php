<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konfirmasipembayaran_model');

        $this->data['module']   =   'Konfirmasi Pembayaran';
        $this->load->model('Bank_model');
		$this->load->model('Cart_model');

        if (!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}

    }
    public function index()
    {
        $this->data['title']                   = $this->data['module'];
        $this->data['konfirmasi_pembayaran']   = $this->Konfirmasipembayaran_model->get_all();
        $this->load->view('back/konfirmasi_penjualan_list', $this->data);
    }
    //export function
  public function export() {
    error_reporting(E_ALL);

    include_once './assets/phpexcel/Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();

    $data = $this->Konfirmasipembayaran_model->get_all();

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $rowCount = 1;

    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nomor Invoice");
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Nama");
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Jumlah");
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Bank Asal");
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Bank Tujuan");
    $rowCount++;

    foreach($data as $value){
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_pembayaran);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->invoice);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->nama);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->jumlah);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->bank_asal);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->bank_tujuan);
        $rowCount++;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('./assets/excel/DataTransaksi.xlsx');

    $this->load->helper('download');
    force_download('./assets/excel/DataTransaksi.xlsx', NULL);
}
}