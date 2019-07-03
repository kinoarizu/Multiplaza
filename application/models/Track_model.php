<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Track_model extends CI_Model
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
  

    function cart_history()
    {
      $this->db->where('user_id', $this->session->userdata('user_id'));
      $this->db->where_not_in('status','1');
      return $this->db->get($this->table);
    }



}
