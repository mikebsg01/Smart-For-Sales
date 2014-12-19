<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datacenter_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getDataCompany(){
		$query = $this->db->get('dataenterprise');
		return $query;
	}
	public function insertDataCompany($data){
		$query = $this->db->insert('dataenterprise',$data);
		if($query)
			return $query;
		else
			return false;
	}
	public function updateDataCompany($data, $id){
		$this->db->where('id', $id);
		$query = $this->db->update('dataenterprise', $data); 
		if($query)
			return $query;
		else
			return false;
	}
	public function getDataForeignCurrency(){
		$query = $this->db->get('dataenterprise');
		$num_data = $query->num_rows();
		if($query && $num_data>0){
			foreach ($query->result() as $reg) {
					if( $reg->dolar == 0)
						$val['dollar'] = '0.00';
					else 
						$val['dollar'] = $reg->dolar;
					if( $reg->euro == 0 )
						$val['euro'] = '0.00';
					else 
						$val['euro'] = $reg->euro;
			}
			$info = array('data'=>$val,'request'=>'success');
			return $info;
		} else {
			return false;
		}
	}
	public function updateForeignCurrency($data,$id){
		var_dump($data);
		$this->db->where('id', $id);
		var_dump($id);
		$query = $this->db->update('dataenterprise', $data); 
		if($query)
			return $query;
		else
			return false;
	}
}

?>