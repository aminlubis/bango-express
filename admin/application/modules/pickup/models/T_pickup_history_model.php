<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_pickup_history_model extends CI_Model {

	var $table = 't_pickup_request';
	var $column = array('t_pickup_request.code','t_pickup_request.name');
	var $select = 't_pickup_request.*';
	var $order = array('t_pickup_request.id' => 'DESC');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _main_query(){
		$this->db->select($this->select);
		$this->db->select('nama_kurir, nama_hub, pickup_time, kurir_id, tbl_jenis_barang.label as nm_jenis_brg');
		$this->db->from($this->table);
		$this->db->join('(select * from global_parameter where flag='."'jenis_barang'".') as tbl_jenis_barang', 'tbl_jenis_barang.value=t_pickup_request.item_type','left');
		$this->db->join('v_pickup_log','v_pickup_log.pickup_log_id=t_pickup_request.pickup_log_id','left');
		// $this->db->where('t_pickup_request.is_active', 'Y');
		/*check level user*/
		// $this->authuser->filtering_data_by_level_user($this->table, $this->session->userdata('user')->user_id);
	}

	private function _get_datatables_query()
	{
		
		$this->_main_query();

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
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
		// print_r($this->db->last_query());die;
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
		$this->_main_query();
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->_main_query();
		if(is_array($id)){
			$this->db->where_in(''.$this->table.'.id',$id);
			$query = $this->db->get();
			return $query->result();
		}else{
			$this->db->where(''.$this->table.'.id',$id);
			$query = $this->db->get();
			return $query->row();
		}
		
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$get_data = $this->get_by_id($id);
		$this->db->where_in(''.$this->table.'.id', $id);
		return $this->db->delete($this->table);
	}


}
