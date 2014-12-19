<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('appdata');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
	}
    
	public function message()
	{
		$this->load->view('welcome_message');
	}

    public function index(){
        $this->load->view('WELCOME/INDEX/LOGOUT/head.php');
        $this->load->view('WELCOME/INDEX/LOGOUT/navbar.php');
        $this->load->view('WELCOME/INDEX/LOGOUT/article.php');
        $this->load->view('WELCOME/INDEX/LOGOUT/aside.php');
        $this->load->view('WELCOME/INDEX/LOGOUT/footer.php');
    }
}
