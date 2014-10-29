<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getUser($data){

		$query = $this->db->get_where('LoginUsers',$data);
		return $query;
	}

	public function connectUser($where){
		$this->db->update('LoginUsers', array('logged_in'=>TRUE), $where);
	}

	public function disconnectUser($where){
		$this->db->update('LoginUsers', array('logged_in'=>FALSE), $where);
	}

}

?>