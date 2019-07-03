<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
  public $table = 'kategori';
  public $id    = 'id_kategori';
  public $order = 'DESC';

  var $column = array('id_kategori','judul_kategori');

  private function _get_datatables_query()
  {
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

  function get_all()
  {
    return $this->db->get($this->table)->result();
  }

  function ambil_kategori()
  {
  	$sql_prov=$this->db->get('kategori');
  	if($sql_prov->num_rows()>0)
    {
  		foreach ($sql_prov->result_array() as $row)
			{
				$result['']= '- Pilih Kategori -';
				$result[$row['id_kategori']]= ucwords(strtolower($row['judul_kategori']));
			}
			return $result;
		}
	}

  function ambil_subkat($kat)
  {
    $this->db->where('id_kat',$kat);
  	// $this->db->order_by('judul_subkat','asc');
  	$sql_subkat=$this->db->get('subkategori');
  	if($sql_subkat->num_rows()>0)
    {
  		foreach ($sql_subkat->result_array() as $row)
      {
        $result[$row['id_subkategori']]= ucwords(strtolower($row['judul_subkategori']));
      }
      return $result;
    }
    // else
    // {
		//   $result['-']= '- Belum Ada Sub Kategori -';
		// }
    // return $result;
	}

  function ambil_subkategori($kat_id)
  {
  	$this->db->where('id_kat',$kat_id);
  	$this->db->order_by('judul_subkategori','asc');
  	$sql=$this->db->get('subkategori');
  	if($sql->num_rows()>0)
    {
  		foreach ($sql->result_array() as $row)
      {
        $result[$row['id_subkategori']]= ucwords(strtolower($row['judul_subkategori']));
      }
    }
    else
    {
		  $result['-']= '- Belum Ada SubKategori -';
		}
    return $result;
	}

  function ambil_supersubkat($subkat_id)
  {
  	$this->db->where('id_subkat',$subkat_id);

  	$sql=$this->db->get('supersubkategori');
  	if($sql->num_rows()>0)
    {
  		foreach ($sql->result_array() as $row)
      {
        $result[$row['id_supersubkategori']]= ucwords(strtolower($row['judul_supersubkategori']));
      }
    }
    else
    {
		  $result['-']= '- Belum Ada SuperSubKategori -';
		}
    return $result;
	}

  function ambil_supersubkategori($subkat_id)
  {
  	$this->db->where('id_subkat',$subkat_id);

  	$sql=$this->db->get('supersubkategori');
  	if($sql->num_rows()>0)
    {
  		foreach ($sql->result_array() as $row)
      {
        $result[$row['id_supersubkategori']]= ucwords(strtolower($row['judul_supersubkategori']));
      }
    }
    else
    {
		  $result['-']= '- Belum Ada SuperSubKategori -';
		}
    return $result;
	}

  function get_list_by_kategori($slug, $limit=null, $offset=null)
  {
    $this->db->join('kategori', 'produk.kat_id=kategori.id_kategori');
    $this->db->where('kategori.slug_kat', $slug);
    $this->db->limit($limit, $offset);

    return $this->db->get('produk');
  }

  function get_by_kategori_nr($slug)
  {
    $this->db->join('kategori', 'produk.kat_id=kategori.id_kategori');
    $this->db->where('kategori.slug_kat', $slug);

    return $this->db->get('produk')->num_rows();
  }

  function get_list_by_subkategori($slug, $limit=null, $offset=null)
  {
    $this->db->join('subkategori', 'produk.subkat_id=subkategori.id_subkategori');
    $this->db->where('subkategori.slug_subkat', $slug);
    $this->db->limit($limit, $offset);

    return $this->db->get('produk');
  }

  function get_by_subkategori_nr($slug)
  {
    $this->db->join('subkategori', 'produk.subkat_id=subkategori.id_subkategori');
    $this->db->where('subkategori.slug_subkat', $slug);

    return $this->db->get('produk')->num_rows();
  }

  function get_list_by_superskategori($slug, $limit=null, $offset=null)
  {
    $this->db->join('supersubkategori', 'produk.supersubkat_id=supersubkategori.id_supersubkategori');
    $this->db->where('supersubkategori.slug_supersubkat', $slug);
    $this->db->limit($limit, $offset);

    return $this->db->get('produk');
  }

  function get_by_superskategori_nr($slug)
  {
    $this->db->join('supersubkategori', 'produk.supersubkat_id=supersubkategori.id_supersubkategori');
    $this->db->where('supersubkategori.slug_supersubkat', $slug);

    return $this->db->get('produk')->num_rows();
  }

  function get_all_new_home()
  {
    $this->db->limit(4);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_kategori_sidebar()
  {
    $this->db->order_by('judul_kategori', 'asc');
    return $this->db->get($this->table)->result();
  }

  function get_total_row_kategori()
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
    $this->db->from('produk');
    $this->db->where('slug_subkat', $id);
    $this->db->join('subkategori', 'produk.subkat_id = subkategori.id_subkategori');
    $this->db->order_by('id_produk','desc');
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
