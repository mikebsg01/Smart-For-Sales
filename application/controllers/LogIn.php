<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogIn extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('login_model');
		$this->load->library('encrypt');
		$this->load->library('session');
	}
	public function index()
	{
		//$this->load->view('welcome_message');
		echo "LogIn";
	}
	public function verify(){
		$data['AppName']='Smart For Sales';
		$data['AppVersion']='0.1.0';
		$data['AppLogo']='<span class="icon-grid-view"></span>';
		
		if($this->session->userdata('user_data')){
			redirect(base_url().'index.php/welcome/index');
		}

		$data['verifyData'] = array(
										'usuario' => $this->input->post('username'),
										'password' => $this->input->post('pw')
									);
		$data['loginOptions'] = array(
									'not_closing_session' => $this->input->post('not_closing_session'),
								);

		$dataRequest = $this->login_model->getUser($data['verifyData']);

		if($dataRequest->num_rows() != 1){
			redirect('../../welcome/index?login_status=0&request=failed');
		} 

		foreach($dataRequest->result() as $register ){
			$id_user = $register->id;
			$budget = $register->presupuesto;
			$logged_in = $register->logged_in;
		}

		if($logged_in == TRUE){
			redirect('../../welcome/index?login_status=0&request=duplicate');
		}

		$data['received'] = $dataRequest;

		// Aquí evaluación de los datos
		$data['verifyData']['logged_in'] = TRUE;
		// Fin de la evaluación

		
		if($data['verifyData']['logged_in']){
			$data['user'] = array(
								'id_user' => $id_user,
								'usuario' => $data['verifyData']['usuario'],
								'password' => $data['verifyData']['password'],
								'presupuesto' => $budget,
								'logged_in' => TRUE
							);
			
			$this->login_model->connectUser(array('id'=>$data['user']['id_user']));

			$this->session->set_userdata('user_data',$data['user']);

			$data['redirect'] = TRUE;
			$data['redirectToURL'] = base_url().'index.php/welcome/index';
			$data['redirectTime'] = 20;
		}
		
		$this->load->view('LOGIN/head.php',$data);
		$this->load->view('LOGIN/container_OPEN.php');
		$this->load->view('LOGIN/article_SESSION_OFF.php',$data);
		$this->load->view('BASE/container_CLOSE.php');
		$this->load->view('BASE/CLOSE_HTML.php');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */