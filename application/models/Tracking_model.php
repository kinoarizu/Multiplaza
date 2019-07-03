<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tracking_model extends CI_Model
{
  public $table = 'tracking';
  public $id    = 'id_tracking';
  public $order = 'DESC';

  var $column = array('id_tracking','tgl_tracking','status_tracking','provinsi','kota','alamat_tracking');

  private function _get_datatables_query()
  {
    $this->db->from($this->table);

    $i = 0;

		foreach ($this->column as $item) // loop column
		{
			if(isset($_POST['search']['value'])) // if datatable send POST for search
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
			$order = array(
				'id_tracking' => $this->order
			); 
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

  function get_datatables()
	{
		$this->_get_datatables_query();
		if (isset($_POST['length'])) 
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function resi()
	{
		$sql_prov =$this->db->get('transaksi');
		if ($sql_prov->num_rows()>0) {
			foreach ($sql_prov->result_array() as $row) {
				$result['']='- Pilih No Resi -';

				$id 	= $row['id_trans'];
				$resi	= ucwords($row['resi']);
				if ($resi == '') {
					
				}else {
					$result[$row['resi']]=ucwords($row['resi']);
				}
			}
			return $result;
		}
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

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

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
	
	public function detail_track($resi)
	{
		$this->db->join(' provinsi','tracking.provinsi =  provinsi.id_provinsi');
		$this->db->join(' kota','tracking.kota =  kota.id_kota');
    $this->db->where('no_resi',$resi);
    return $this->db->get($this->table)->result();
	}

}
