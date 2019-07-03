<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model
{
  public $table = 'setting';
  public $id    = 'id_setting';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_namatoko()
  {
    $this->db->where($this->id, '1');
    return $this->db->get($this->table)->row();
  }

  function get_alamat()
  {
    $this->db->where($this->id, '2');
    return $this->db->get($this->table)->row();
  }

  function get_banner()
  {
    $this->db->where($this->id, '3');
    return $this->db->get($this->table)->row();
  }

  function get_runtext()
  {
    $this->db->where($this->id, '4');
    return $this->db->get($this->table)->row();
  }

  function get_cs()
  {
    $this->db->where($this->id, '5');
    return $this->db->get($this->table)->row();
  }

  // get data by id
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

  // update data
  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

}
