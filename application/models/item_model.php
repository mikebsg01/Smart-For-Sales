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

}

?>