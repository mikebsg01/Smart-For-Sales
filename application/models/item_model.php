<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getAllItems(){
		$query = $this->db->get('ManagementOfItems');
		return $query;
	}

	public function insertItem($data){
		$query = $this->db->insert('ManagementOfItems',$data);
		if($query)
			return $query;
		else
			return false;
	}
	public function updateImageItem($data){
		$query = $this->db->get('ManagementOfItems');
		$id = 0;
		foreach ($query->result() as $reg) {
			$image = $reg->urlImage;
			$arr = explode('/', $image);
			$len = count($arr);
			$str_image = $arr[$len-1];
			if($str_image == $data['urlImage']){
				$id = $reg->id;
				$this->db->where('id',$id);
				$this->db->update('ManagementOfItems',$data);
				return $id;
			}
		}
	}
}

?>