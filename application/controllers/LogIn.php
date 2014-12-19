<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->helper('appdata');
		$this->load->library('encrypt');
		$this->load->library('session');
	}
	public function index()
	{
		echo "LogIn";
	}
	public function verify(){
		echo "LogIn/verify";
	}

}
