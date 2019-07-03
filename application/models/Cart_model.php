<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model
{
  public $table   = 'transaksi';
  public $table2  = 'transaksi_detail';
  public $id      = 'id_trans';
  public $id2     = 'id_transdet';

  // BACKEND //
  function get_all()
  {
    $this->db->join('users', 'transaksi.user_id = users.id');
    return $this->db->get($this->table)->result();
  }

  function top5_transaksi()
  {
    $this->db->join('users', 'transaksi.user_id = users.id');
    $this->db->limit(5);
    $this->db->order_by('transaksi.id_trans', 'DESC');
    return $this->db->get($this->table)->result();
  }

  function get_cart_per_customer_finished_back($invoice)
  {
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('users', 'transaksi_detail.user = users.id');
    $this->db->where('transaksi.user_id', $invoice);
    return $this->db->get($this->table2)->result();
  }

  function get_data_customer_back($invoice)
  {
    $this->db->join('provinsi', 'provinsi.id_provinsi = users.provinsi');
    $this->db->join('kota', 'kota.id_kota = users.kota');
    $this->db->join('transaksi', 'users.id = transaksi.user_id');
    $this->db->where('transaksi.id_trans', $invoice);
    return $this->db->get('users')->row();
  }

  function get_total_berat_dan_subtotal_finished_back($invoice)
  {
    $this->db->select_sum('total_berat');
    $this->db->select_sum('subtotal');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where('transaksi.id_trans', $invoice);
    return $this->db->get($this->table2)->row();
  }

  // FRONTEND
  public function total_cart_navbar()
  {
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    return $this->db->get($this->table2)->num_rows();
  }

  public function total_terkirim_navbar()
  {
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','2');
    return $this->db->get($this->table2)->num_rows();
  }

  public function isi_terkirim_navbar()
  {
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('produk','transaksi_detail.produk_id = produk.id_produk');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','2');
    $this->db->order_by('transaksi.id_trans','DESC');
    return $this->db->get($this->table2)->result();
  }

  // cek transaksi per customer login
  function cek_transaksi()
  {
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    return $this->db->get($this->table)->row();
  }
  
  function get_idproduk($id_user)
  {
    $this->db->join('transaksi_detail','transaksi.id_trans = transaksi_detail.trans_id');
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->where('user_id',$id_user);
    return $this->db->get($this->table)->row();
  }
  function update_stok($id,$data)
  {
    $this->db->where('id_produk',$id);
    $this->db->update('produk', $data);
  }

  function get_notransdet($id)
  {
    $this->db->join('transaksi_detail', 'transaksi.id_trans = transaksi_detail.trans_id');
    $this->db->where('produk_id',$id);
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    return $this->db->get($this->table)->row();
  }

  // ambil semua data dari 4 tabel per customer
  function get_cart_per_customer()
  {
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('users', 'transaksi_detail.user = users.id');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    return $this->db->get($this->table2)->result();
  }

  function get_cart_per_customer_finished($invoice)
  {
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('users', 'transaksi.user_id = users.id');
    $this->db->where('transaksi.id_trans', $invoice);
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','1');
    return $this->db->get($this->table2)->result();
  }

  // ambil data pribadi per customer login
  function get_data_customer()
  {
    $this->db->join('provinsi', 'provinsi.id_provinsi = users.provinsi');
    $this->db->join('kota', 'kota.id_kota = users.kota');
    $this->db->join('transaksi', 'users.id = transaksi.user_id');
    $this->db->order_by('transaksi.id_trans', 'DESC');
    $this->db->limit('1');
    $this->db->where('user_id', $this->session->userdata('user_id'));
    return $this->db->get('users')->row();
  }

  // ambil total_berat dan subtotal per transaksi customer login
  function get_total_berat_dan_subtotal()
  {
    $this->db->select_sum('total_berat');
    $this->db->select_sum('subtotal');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    return $this->db->get($this->table2)->row();
  }

  function get_total_berat_dan_subtotal_finished($invoice)
  {
    $this->db->select_sum('total_berat');
    $this->db->select_sum('subtotal');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','1');
    $this->db->where('transaksi.user_id', $invoice);
    return $this->db->get($this->table2)->row();
  }

  function get_all_finished_back($invoice)
  {
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('users', 'transaksi.user_id = users.id');
    $this->db->where('transaksi.id_trans', $invoice);
    return $this->db->get($this->table2);
  }

  function get_all_finished($invoice)
  {
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('users', 'transaksi.user_id = users.id');
    $this->db->where('transaksi.id_trans', $invoice);
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','1');
    return $this->db->get($this->table2);
  }

  function total_berat_finished_back($invoice)
  {
    $this->db->select_sum('total_berat');
    $this->db->select_sum('subtotal');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where('status','1');
    $this->db->or_where('status','2');
    $this->db->where('transaksi.id_trans', $invoice);
    return $this->db->get($this->table2)->row();
  }

  function subtotal_history($id)
  {
    $this->db->select_sum('subtotal');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where($this->id, $id);
    $this->db->where('user', $this->session->userdata('user_id'));
    return $this->db->get($this->table2)->row();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  // get total rows
  function total_rows() {
    return $this->db->get($this->table)->num_rows();
  }

  // insert data
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  function insert_detail($data2)
  {
    $this->db->insert($this->table2, $data2);
  }

  // function checkout($id, $data)
  function checkout($data)
  {
    // $this->db->where('user_id',$id);
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    $this->db->update($this->table, $data);
  }

  // update data
  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  function update_transdet($id, $data)
  {
    $this->db->where('produk_id',$id);
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->update($this->table2, $data);
  }

  // delete data
  function delete($id,$id_trans)
  {
    $this->db->where('produk_id', $id);
    $this->db->where('trans_id', $id_trans);
    $this->db->delete($this->table2);
  }

  function kosongkan_keranjang($id_trans)
  {
    $this->db->where('trans_id', $id_trans);
    $this->db->delete($this->table2);
  }

  // function get_notransdetnew()
  // {
  //   $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
  //   $this->db->where('user', $this->session->userdata('user_id'));
  //   $this->db->where('status','0');
  //   return $this->db->get($this->table2)->row();
  // }

  function cart_history()
  {
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->where_not_in('status','0');
    return $this->db->get($this->table);
  }

  function cart_history_detail()
  {
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('users', 'transaksi_detail.user = users.id');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    return $this->db->get($this->table2);
  }

  function history_detail($id)
  {
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('users', 'transaksi_detail.user = users.id');
    $this->db->where($this->id, $id);
    $this->db->where('user_id', $this->session->userdata('user_id'));
    return $this->db->get($this->table2);
  }

  function history_total_berat($id)
  {
    $this->db->select_sum('total_berat');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where($this->id2, $id);
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','1');
    return $this->db->get($this->table2)->row();
  }

  function get_bulan()
  {
    $this->db->select('judul_produk, transaksi.created as tanggal');
    $this->db->select_sum('total_qty');
    $this->db->join('transaksi_detail', 'transaksi.id_trans = transaksi_detail.trans_id');
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->where('month(transaksi.created)', date('m'));
    $this->db->group_by('produk_id');
    $this->db->order_by('tanggal', 'DESC');
    $this->db->limit(5);
    return $this->db->get($this->table)->result();
  }

  function total_penjualan()
  {
    $this->db->join('transaksi_detail', 'transaksi.id_trans = transaksi_detail.trans_id');
    return $this->db->get($this->table)->result();
  }

  // Laporan

  public function get_data_penjualan_periode()
	{
		$tgl_awal 	= $this->input->post('tgl_awal'); //getting from post value
    $tgl_akhir 	= $this->input->post('tgl_akhir'); //getting from post value

    $this->db->join('users', 'transaksi.user_id = users.id');
		$this->db->where('created >=', $tgl_awal.' 00:00:00');
		$this->db->where('created <=', $tgl_akhir.' 23:59:59');
		return $this->db->get($this->table)->result();
  }

}
