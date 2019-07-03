<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->model('Blog_model');
		$this->load->model('Cart_model');
		$this->load->model('Featured_model');
		$this->load->model('Ion_auth_model');
		$this->load->model('Kontak_model');
		$this->load->model('Produk_model');
    	$this->load->model('Kategori_model');
		$this->load->model('Subkategori_model');
		$this->load->model('Supersubkategori_model');
		$this->load->model('Slider_model');

		if (!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
		else
		{	
			$usertype = $this->session->userdata('usertype');
			$user	  = $this->Ion_auth_model->get_users_group_by_id($usertype);
			$userr    = $user['usertype'];
			

			$this->data = array(
	      		'title'								=> 'Dashboard',
				'get_bulan'							=> $this->Cart_model->get_bulan(),
				'total_transaksi'	 				=> $this->Cart_model->total_rows(),
				'top5_transaksi' 					=> $this->Cart_model->top5_transaksi(),
				'total_featured' 					=> $this->Featured_model->total_rows(),
				'total_produk' 						=> $this->Produk_model->total_rows(),
				'total_slider' 						=> $this->Slider_model->total_rows(),
				'usertype'							=> $userr,
			);

			$this->load->view('back/dashboard',$this->data);
		}
	}
	public function notif()
	{
		$con = mysqli_connect("localhost", "root", "", "db_multiplaza");

		if (isset($_POST['view'])) {
			if ($_POST['view'] != '' ) {
				$update_query = "update konfirmasi_pembayaran set status_notif=1 where status_notif=0";
				mysqli_query($con, $update_query);
			}
			$query = "SELECT * FROM konfirmasi_pembayaran ORDER BY id_pembayaran DESC LIMIT 5";
			$result = mysqli_query($con, $query);
			$output = '';
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
				  $output .= '
				  <li>
				  <a href="http://localhost/multiplaza/admin/konfirmasi">
				  <strong>'.$row["invoice"].'</strong><br />
				  <small><em>'.$row["nama"].'</em></small>
				  </a>
				  </li>
				  ';
				}
			} else {
				$output .= '
     			<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
			}
			$status_query = "SELECT * FROM konfirmasi_pembayaran WHERE status_notif=0";
			$result_query = mysqli_query($con, $status_query);
			$count = mysqli_num_rows($result_query);
			$output2 = '<li class="header">Transaksi baru(Checkout) </li>';
			$data = array(
				'notification' => $output2 . ' ' . $output,
				'unseen_notification'  => $count
			);
			// print_r($data);
			echo json_encode($data);
		}
	}

}
