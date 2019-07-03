<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank_model extends CI_Model
{
  public $table = 'bank';
  public $id    = 'id_bank';
  public $order = 'DESC';

  function get_all()
  {
    return $this->db->get($this->table)->result();
  }
  function nama_bank()
  {
    $this->db->select('nama_bank');
    $this->db->from('bank');
    $sql_prov=$this->db->get();
    if ($sql_prov->num_rows()>0) 
    {
      foreach ($sql_prov->result_array() as $row) 
      {
        $result['']='- Pilih Bank -';
        $result[$row['nama_bank']]= ucwords(strtolower($row['nama_bank']));
      }
      return $result;
    }
  }

  

}
