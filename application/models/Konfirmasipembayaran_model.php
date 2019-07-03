<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasipembayaran_model extends CI_Model
{
    public $table = 'konfirmasi_pembayaran';

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    function get_all()
    {
        $this->db->order_by('id_pembayaran','desc');
        return $this->db->get($this->table)->result();
    }

    function konfirmasi_pembayaran($id)
    {
      $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
      $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
      $this->db->join('users', 'transaksi_detail.user = users.id');
      $this->db->where($this->id, $id);
      $this->db->where('user_id', $this->session->userdata('user_id'));
      return $this->db->get($this->table2);
    }

    
}