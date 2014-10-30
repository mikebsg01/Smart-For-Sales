<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('login_model');
		$this->load->library('encrypt');
		$this->load->library('session');
	}

	public function finish_session(){

		if($this->session->userdata('user_data')){
			$userdata = $this->session->userdata('user_data');
			$this->login_model->disconnectUser(array('id'=>$userdata['id_user']));
			$this->session->sess_destroy();
		}
		redirect(base_url().'index.php/welcome/index');

	}

}

?>