<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{
  public $table = 'company';
  public $id    = 'id_company';
  public $order = 'ASC';

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

  function delete_userfile($id)
  {
    $this->db->select("foto, foto_type");
    $this->db->where($this->id,$id);
    return $this->db->get($this->table)->row();
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where('id_company', $id);
    return $this->db->get($this->table)->row();
  }

  function del_by_id($id)
  {
    $this->db->select("foto, foto_type");
    $this->db->where($this->id,$id);
    return $this->db->get($this->table)->row();
  }

  function get_by_company()
  {
    $this->db->where('id_company', '1');
    return $this->db->get($this->table)->row();
  }

  function total_rows() {
    return $this->db->get($this->table)->num_rows();
  }

}
