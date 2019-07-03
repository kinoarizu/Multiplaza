<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Featured_model extends CI_Model
{
  public $table = 'featured';
  public $id    = 'id_featured';
  public $order = 'DESC';

  var $column = array('id_featured','no_urut','id_produk','produk_id','judul_produk');

  private function _get_datatables_query()
	{
    $this->db->join('produk', 'featured.produk_id = produk.id_produk');
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
	
  public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

  public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
  function get_all()
  {
    $this->db->join('produk', 'featured.produk_id = produk.id_produk');
    $this->db->order_by('no_urut', 'ASC');
    return $this->db->get($this->table)->result();
  }

  function get_all_front()
  {
    $this->db->join('produk', 'featured.produk_id = produk.id_produk');
    $this->db->order_by('no_urut', 'ASC');
    $this->db->limit('5');
    return $this->db->get($this->table)->result();
  }

  function get_data_sidebar()
  {
    $this->db->limit(5);
    $this->db->from($this->table);
    $this->db->join('produk', 'featured.produk = produk.id_produk');
    return $this->db->get()->result();
  }

  function get_combo_featured()
  {
    $this->db->order_by('judul_featured', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['id_featured']] = $row['judul_featured'];
      }
      return $data;
    }
  }

  function get_all_random()
  {
    $this->db->limit(4);
    $this->db->order_by($this->id, 'random');
    return $this->db->get($this->table)->result();
  }

  function get_all_new_home()
  {
    $this->db->limit(4);
    $this->db->where('publish','ya');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_featured_sidebar()
  {
    $this->db->limit(5);
    $this->db->where('publish','ya');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_komentar_sidebar()
  {
    $this->db->from($this->table);
    $this->db->where('status', 'ya');
    $this->db->limit(5);
    $this->db->order_by('time_verif', $this->order);
    $this->db->join('komentar', 'featured.id_featured = komentar.id_featured');
    return $this->db->get()->result();
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function get_komentar($id)
  {
    $this->db->from($this->table);
    $this->db->where('judul_seo', $id);
    $this->db->where('status', 'ya');
    $this->db->join('komentar', 'featured.id_featured = komentar.id_featured');
    return $this->db->get()->result();
  }

  function get_all_arsip($per_page,$dari)
  {
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query->result();
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

  // insert data
  function insert_komentar($data)
  {
    $this->db->insert('komentar', $data);
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

  // get all
  function get_cari_featured()
  {
    $cari_featured = $this->input->post('cari_featured');

    $this->db->like('judul_featured', $cari_featured);
    return $this->db->get($this->table)->result();
  }

}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */
