<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_log_manifest_model extends CI_Model {

	var $table = 't_manifest';
	var $column = array('t_manifest.kode_manifest');
	var $select = 't_manifest.*';
	var $order = array('t_manifest.manifest_id' => 'DESC');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _main_query(){
		$this->db->select($this->select);
		$this->db->select('wil_tujuan.nama as area_tujuan_kirim, kurir_manifest.nama as nama_kurir_manifest');
		$this->db->from($this->table);
		$this->db->join('wilayah as wil_tujuan','wil_tujuan.kode=t_manifest.kode_wilayah_tujuan','left');
		$this->db->join('t_kurir as kurir_manifest','kurir_manifest.kurir_id=t_manifest.kurir_id','left');
		/*check level user*/
		// $this->authuser->filtering_data_by_level_user($this->table, $this->session->userdata('user')->user_id);
	}

	private function _get_datatables_query()
	{
		
		$this->_main_query();

		if(isset($_GET['keyword'])){
			$this->db->like('no_order', $_GET['keyword']);
		}

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

	public function save($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function update($table, $where, $data)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$get_data = $this->get_by_id($id);
		$this->db->where_in(''.$this->table.'.id', $id);
		return $this->db->update($this->table, array('is_active' => 'N'));
	}


}
