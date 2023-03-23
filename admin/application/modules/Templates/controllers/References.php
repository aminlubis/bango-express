<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class References extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	/*here function used for this application*/

	public function getRegencyByProvince($provinceId='')
	{
        $query = $this->db->where('province_id', $provinceId)
        				  ->order_by('name', 'ASC')
                          ->get('regencies');
		
        echo json_encode($query->result());
	}

	public function getDistrictByRegency($regency_id='')
	{
        $query = $this->db->where('regency_id', $regency_id)
        				  ->order_by('name', 'ASC')
                          ->get('districts');
		
        echo json_encode($query->result());
	}

	public function getVillagesByDistrict($district_id='')
	{
        $query = $this->db->where('district_id', $district_id)
        				  ->order_by('name', 'ASC')
                          ->get('villages');
		
        echo json_encode($query->result());
	}

	public function getVillagesById($id='')
	{
        $query = $this->db->where('id', $id)
        				  ->order_by('name', 'ASC')
                          ->get('villages');
		
        echo json_encode($query->result());
	}

	public function getDistrictsById($id='')
	{
		$query = "select  b.id as province_id, b.name as province_name,c.id as regency_id,c.name as regency_name
				from districts a
				left join provinces b on b.id=a.province_id
				left join regencies c on c.id=a.regency_id
				where a.id=".$id." ";
		$exc = $this->db->query($query);
		echo json_encode($exc->row());
	}

	public function getProvince()
	{
        
		$result = $this->getProvinceByKeyword($_POST['keyword']);
		$arrResult = [];
		foreach ($result as $key => $value) {
			$arrResult[] = $value->id.' : '.$value->name;
		}
		echo json_encode($arrResult);
		
		
	}

	public function getProvinceByKeyword($key='')
	{
        $query = $this->db->where("name LIKE '%".$key."%' ")
        				  ->order_by('name', 'ASC')
                          ->get('provinces');
		
        return $query->result();
	}

	public function getRegencies()
	{
        
		$result = $this->getRegenciesByKeyword($_POST['keyword']);
		$arrResult = [];
		foreach ($result as $key => $value) {
			$arrResult[] = $value->id.' : '.$value->name;
		}
		echo json_encode($arrResult);
		
		
	}

	public function getRegenciesByKeyword($key='')
	{
        $query = $this->db->where("name LIKE '%".$key."%' ")
							->where('province_id', $_POST['province'])
        				  ->order_by('name', 'ASC')
                          ->get('regencies');
		
        return $query->result();
	}

	public function getDistricts()
	{
        
		$result = $this->getDistrictsByKeyword($_POST['keyword']);
		$arrResult = [];
		foreach ($result as $key => $value) {
			$arrResult[] = $value->id.' : '.$value->name;
		}
		echo json_encode($arrResult);
		
		
	}

	public function getDistrictsByKeyword($key='',$regency='')
	{
        $this->db->where("name LIKE '%".$key."%' ");
		if( isset($_POST['regency']) AND $_POST['regency'] != '' ){
			$this->db->where("regency_id", $_POST['regency']);
		}
        $this->db->order_by('name', 'ASC');
        return $this->db->get('districts')->result();
	}

	public function getVillage()
	{
        
		$result = $this->getVillageByKeyword($_POST['keyword'],$_POST['district']);
		$arrResult = [];
		foreach ($result as $key => $value) {
			$arrResult[] = $value->id.' : '.$value->name;
		}
		echo json_encode($arrResult);
		
		
	}

	public function getVillageByKeyword($key='',$district='')
	{
        $query = $this->db->where("name LIKE '%".$key."%' ")->where("district_id", $district)
        				  ->order_by('name', 'ASC')
                          ->get('villages');
		
        return $query->result();
	}

	public function getMenuByModulId($modul_id='')
	{
        $query = $this->db->where('modul_id', $modul_id)->where('parent', 0)->where('is_active', 'Y')
        				  ->order_by('name', 'ASC')
                          ->get('tmp_mst_menu');
		
        echo json_encode($query->result());
	}

}
