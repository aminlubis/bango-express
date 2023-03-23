<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_create_manifest_model extends CI_Model {

	var $table = 't_order';
	var $column = array('t_order.no_order');
	var $select = 't_order.*';
	var $order = array('t_order.id' => 'DESC');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _main_query(){
		$this->db->select($this->select);
		$this->db->select('kel.nama as kel_pengirim, kel_penerima.nama as kel_penerima, tbl_jenis_pengiriman.label as nama_jenis_pengiriman, tbl_kategori_barang.label as nama_kategori_barang, tbl_jenis_barang.label as nama_jenis_barang, tbl_status_order.label as status_order, pickup_time, t_kurir.nama as nama_kurir, pickup_log_id, file_image, t_pickup_log.note as note_pickup, tipe_kirim, t_pickup_log.kurir_id');
		$this->db->from($this->table);
		$this->db->join('wilayah as kel', 'kel.kode=t_order.area_pengirim','left');
		$this->db->join('wilayah as kel_penerima', 'kel_penerima.kode=t_order.area_tujuan','left');
		$this->db->join('t_pickup_log', 't_pickup_log.order_id=t_order.id','left');
		$this->db->join('t_kurir', 't_kurir.kurir_id=t_pickup_log.kurir_id','left');
		$this->db->join('(select * from global_parameter where flag='."'jenis_pengiriman'".') as tbl_jenis_pengiriman', 'tbl_jenis_pengiriman.value=t_order.jenis_pengiriman','left');
		$this->db->join('(select * from global_parameter where flag='."'kategori_barang'".') as tbl_kategori_barang', 'tbl_kategori_barang.value=t_order.jenis_pengiriman','left');
		$this->db->join('(select * from global_parameter where flag='."'jenis_barang'".') as tbl_jenis_barang', 'tbl_jenis_barang.value=t_order.jenis_pengiriman','left');
		$this->db->join('(select * from global_parameter where flag='."'status_order'".') as tbl_status_order', 'tbl_status_order.value=t_order.status_proses','left');
		
		/*check level user*/
		// $this->authuser->filtering_data_by_level_user($this->table, $this->session->userdata('user')->user_id);
	}

	private function _get_datatables_query()
	{
		
		$this->_main_query();
		$this->db->where('t_order.is_active', 'Y');
		$this->db->where('t_order.manifest_id', NULL);
		$this->db->where('t_order.hub_id', $this->session->userdata('user')->hub_id);

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

	public function get_by_kode_wilayah($id)
	{
		$this->_main_query();
		$this->db->where_in(''.$this->table.'.area_tujuan',$id);
		$query = $this->db->get();
		return $query->result();
		
	}

	public function get_by_kode_manifest($id)
	{
		$this->_main_query();
		$this->db->select('kode_manifest, t_manifest.tgl_manifest, t_manifest.hub_id as hub_id_manifest, t_manifest.kurir_id as kurir_id_manifest, t_manifest.kode_wilayah_tujuan, t_manifest.note as note_manifest, wil_tujuan.nama as area_tujuan_kirim, kurir_manifest.nama as nama_kurir_manifest, t_manifest.jumlah_order');
		$this->db->join('t_manifest','t_manifest.manifest_id=t_order.manifest_id','left');
		$this->db->join('wilayah as wil_tujuan','wil_tujuan.kode=t_manifest.kode_wilayah_tujuan','left');
		$this->db->join('t_kurir as kurir_manifest','kurir_manifest.kurir_id=t_manifest.kurir_id','left');
		$this->db->where_in('t_manifest.kode_manifest',$id);
		$query = $this->db->get();
		return $query->result();
		
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
