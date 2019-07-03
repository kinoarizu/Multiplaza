<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk_model extends CI_Model
{
  public $table = 'produk';
  public $id    = 'id_produk';
  public $order = 'DESC';

  var $column = array('id_produk','judul_produk','judul_kategori','judul_subkategori','judul_supersubkategori','harga_normal','harga_diskon','uploader');

  private function _get_datatables_query()
  {
    $this->db->join('kategori', 'produk.kat_id = kategori.id_kategori', 'left');
    $this->db->join('subkategori', 'produk.subkat_id = subkategori.id_subkategori', 'left');
    $this->db->join('supersubkategori', 'produk.supersubkat_id = supersubkategori.id_supersubkategori', 'left');
    $this->db->join('users', 'produk.uploader = users.id', 'left');
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

  function count_filtered()
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
    $this->db->join('kategori', 'produk.kat_id = kategori.id_kategori', 'left');
    $this->db->join('subkategori', 'produk.subkat_id = subkategori.id_subkategori', 'left');
    $this->db->join('supersubkategori', 'produk.supersubkat_id = supersubkategori.id_supersubkategori', 'left');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_combo_produk()
  {
    $this->db->order_by('judul_produk', 'ASC');
    $data = $this->db->get('produk');
    if($data ->num_rows()>0)
    {
      foreach ($data ->result_array() as $row)
      {
        $result['']= '- Pilih Produk -';
        $result[$row['id_produk']]= $row['judul_produk'];
      }
      return $result;
    }
  }


  function get_all_per_seller($data)
  {
    $this->db->join('kategori', 'produk.kat_id = kategori.id_kategori', 'left');
    $this->db->join('subkategori', 'produk.subkat_id = subkategori.id_subkategori', 'left');
    $this->db->join('supersubkategori', 'produk.supersubkat_id = supersubkategori.id_supersubkategori', 'left');
    $this->db->join('users', 'produk.uploader = users.id', 'left');
    $this->db->where('uploader',$data);
    $this->db->order_by($this->id,$this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_random()
  {
    $this->db->limit(4);
    $this->db->order_by($this->id, 'random');
    return $this->db->get($this->table)->result();
  }

  function get_all_new_home()
  {
    $this->db->limit(8);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

    // get data by id
    function get_by_id_iklan_seller($id)
    {
      $this->db->join('users', 'produk.uploader = users.id');
      $this->db->where('slug_produk', $id);
      return $this->db->get($this->table)->row();
    }

  function get_komentar($id)
  {
    $this->db->where('slug_produk', $id);
    $this->db->join('komentar', 'produk.id_produk = komentar.produk_id');
    $this->db->join('users', 'komentar.user_id = users.id');
    return $this->db->get($this->table)->result();
  }


  function get_all_produk_sidebar()
  {
    $this->db->limit(5);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_komentar_sidebar()
  {
    $this->db->from($this->table);
    $this->db->where('status', 'ya');
    $this->db->limit(5);
    $this->db->order_by('time_verif', $this->order);
    $this->db->join('komentar', 'produk.id_produk = komentar.id_produk');
    return $this->db->get()->result();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_id_front($id)
  {
    $this->db->join('kategori', 'produk.kat_id = kategori.id_kategori', 'left');
    $this->db->join('subkategori', 'produk.subkat_id = subkategori.id_subkategori', 'left');
    $this->db->join('supersubkategori', 'produk.supersubkat_id = supersubkategori.id_supersubkategori', 'left');
    $this->db->join('users', 'produk.uploader = users.id', 'left');
    $this->db->where('id_produk', $id);
    $this->db->or_where('slug_produk', $id);

    return $this->db->get($this->table)->row();
  }
  
     // insert data
  function insert_komentar($data)
  {
    $this->db->insert('komentar', $data);
  }

 

  function get_random()
  {
    $this->db->limit(6);
    $this->db->order_by('judul_produk', 'RANDOM');
    return $this->db->get($this->table)->result();
  }

  // function get_komentar($id)
  // {
  //   $this->db->from($this->table);
  //   $this->db->where('slug_produk', $id);
  //   $this->db->where('status', 'ya');
  //   $this->db->join('komentar', 'produk.id_produk = komentar.id_produk');
  //   return $this->db->get()->result();
  // }

  function get_all_katalog($per_page,$dari)
  {
    $this->db->order_by($this->id, 'DESC');
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
  // update data
  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where('id_produk', $id);
    $this->db->delete($this->table);
  }

  function del_by_id($id)
  {
    $this->db->select("foto, foto_type");
    $this->db->where($this->id,$id);
    return $this->db->get($this->table)->row();
  }

  // get all
  function get_cari_produk()
  {
    $cari = $this->input->post('cari');

    $this->db->like('judul_produk', $cari);
    return $this->db->get($this->table)->result();
  }

}
