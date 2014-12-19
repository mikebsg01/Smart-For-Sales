<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
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

		$data['AppName']='Smart For Sales';
		$data['AppVersion']='0.1.0';
		$data['AppLogo']='<span class="icon-grid-view"></span>';
		$user_logged = FALSE;

		if($this->session->userdata('user_data')){
			$data['userdata'] = $this->session->userdata('user_data'); 
			//var_dump($data['userdata']);
			if($data['userdata']['logged_in'] == TRUE){
				$user_logged = TRUE;
			} else {
				$user_logged = FALSE;
			}
		}

		if($user_logged == TRUE){	

            $infoReceived = array(
            					  	'error_upload' => $this->input->get('error_upload'),
            					  	'success_upload' => $this->input->get('success_upload')
            		 		     );

            if($infoReceived['error_upload'] == 1){
           		$data['error_upload'] = 1;
            	$data['error_upload_title'] = 'Error del Servidor';
            	$data['error_upload_content'] = 'El sistema upload (para subida de archivos) no esta funcionando correctamente. <br> Por favor verifiquelo con el proveedor del software.';
            } else {
            	$data['error_upload'] = 0;
            } 

			$this->load->view('WELCOME/INDEX/head_SESSION_ON.php',$data);
			$this->load->view('WELCOME/INDEX/navbar_SESSION_ON.php',$data);
			//$this->load->view('WELCOME/INDEX/container_OPEN_ON.php',$data);
			$this->load->view('WELCOME/INDEX/article_SESSION_ON.php',$data);
			//$this->load->view('WELCOME/INDEX/container_CLOSE.php',$data);
			$this->load->view('BASE/CLOSE_HTML.php');
			
		} else {
			$data['received'] = array(
									'login_status' => $this->input->get('login_status'),
									'request' => $this->input->get('request'),
								);
			$data['formLogIn'] = array(
									'username' => array(
											'id' => 'username',
											'name' => 'username',
											'placeholder' => 'Ej. Alfredo195',
									),
									'password' => array(
											'id' => 'pw',
											'name' => 'pw',
											'placeholder' => 'Ej. 123...',
											'type' => 'password',
									),
									'NOT_CLOSING_SESSION' => array(
										'id' => 'not_closing_session',
										'name' => 'not_closing_session',
										'type' => 'checkbox',
										'checked' => 'checked', 
									)
								);
			$this->load->view('BASE/head.php',$data);
			$this->load->view('BASE/navbar_SESSION_OFF.php',$data);
			$this->load->view('WELCOME/INDEX/container_OPEN.php',$data);
			$this->load->view('WELCOME/INDEX/article_SESSION_OFF.php',$data);
			$this->load->view('WELCOME/INDEX/aside_SESSION_OFF.php',$data);
			$this->load->view('WELCOME/INDEX/container_CLOSE.php');
			$this->load->view('BASE/footer.php');
		}
	}

	public function pruebaAjax(){
		$nombre = $this->input->get('nombre');
		echo '{ "nombre" : "'.$nombre.'" }';	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */