<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supersubkategori_model extends CI_Model
{
  public $table = 'supersubkategori';
  public $id    = 'id_supersubkategori';
  public $order = 'DESC';

  var $column = array('judul_supersubkategori','judul_subkategori','judul_kategori','slug_supersubkat');

  private function _get_datatables_query()
  {
    $this->db->join('kategori', 'supersubkategori.id_kat = kategori.id_kategori');
    $this->db->join('subkategori', 'supersubkategori.id_subkat = subkategori.id_subkategori');
    $this->db->from($this->table);

    $i = 0;

		foreach ($this->column as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$column[$i] = $item; // set column array variable to order processing
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

  function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

  function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

  // get all
  public function get_all()
  {
    $this->db->join('kategori', 'supersubkategori.id_kat = kategori.id_kategori');
    $this->db->join('subkategori', 'supersubkategori.id_subkat = subkategori.id_subkategori');

    return $this->db->get($this->table)->result();
  }

  public function ambil_supersubkategori()
  {
  	$sql_prov=$this->db->get('supersubkategori');
  	if($sql_prov->num_rows()>0)
    {
  		foreach ($sql_prov->result_array() as $row)
			{
				$result['']= '- Pilih Kategori -';
				$result[$row['id_kat']]= ucwords(strtolower($row['judul_kat']));
			}
			return $result;
		}
	}

  public function ambil_subsupersubkategori($kat_id)
  {
  	$this->db->where('id_kat',$kat_id);
  	$this->db->order_by('judul_subkat','asc');
  	$sql_kabupaten=$this->db->get('subsupersubkategori');
  	if($sql_kabupaten->num_rows()>0)
    {
  		foreach ($sql_kabupaten->result_array() as $row)
      {
        $result[$row['id_subkat']]= ucwords(strtolower($row['judul_subkat']));
      }
  }
    else
    {
		  $result['-']= '- Belum Ada Sub Kategori -';
		}

  return $result;
	}

  public function ambil_subkat()
  {
  	$this->db->order_by('judul_subkat','asc');
  	$sql_kabupaten=$this->db->get('subsupersubkategori');
  	if($sql_kabupaten->num_rows()>0)
    {
  		foreach ($sql_kabupaten->result_array() as $row)
      {
        $result[$row['id_subkat']]= ucwords(strtolower($row['judul_subkat']));
      }
  }
    else
    {
		  $result['-']= '- Belum Ada Sub Kategori -';
		}

  return $result;
	}

  function get_combo_supersubkategori()
  {
    $this->db->order_by('judul_kat', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['id_kat']] = $row['judul_kat'];
      }
      return $data;
    }
  }

  function get_all_new_home()
  {
    $this->db->limit(4);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_supersubkategori_sidebar()
  {
    $this->db->order_by('judul_kat', 'asc');
    return $this->db->get($this->table)->result();
  }

  function get_total_row_supersubkategori()
  {
    return $this->db->get($this->table)->count_all_results();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_id_front($id)
  {
    $this->db->from('berita');
    $this->db->where('supersubkategori_seo', $id);
    $this->db->join('supersubkategori', 'berita.supersubkategori = supersubkategori.judul_kat');
    return $this->db->get();
  }

  // get total rows
  function total_rows()
  {
    return $this->db->get($this->table)->num_rows();
  }

  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */
