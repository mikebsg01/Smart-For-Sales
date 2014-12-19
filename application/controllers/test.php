<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('item_model');
	}

	function form()
	{
		$this->load->view('test/form');
	}

	function upload()
	{
		// $insert = $this->input->get_post('insert');
		$insert = 1;
		$data['received'] = array(
								'codigobarra' => $this->input->get_post('codebar'),
								'nombre' => $this->input->get_post('name-item'),
								'descripcion' => $this->input->get_post('description'),
								'stock' => $this->input->get_post('cantidad'),
								'existencia_actual' => $this->input->get_post('cantidad_actual'),
								'fecha_caducidad' => $this->input->get_post('fecha_caducidad'),
								'precio_unitario' => $this->input->get_post('precio_unitario'),
								'iva' => $this->input->get_post('iva'),
								'cargo_iva' => $this->input->get_post('cargo_iva'),
								'cargo_extra' => $this->input->get_post('cargo_extra'),
								'motivo_del_cargo' => $this->input->get_post('motivo_del_cargo'),
								'precio_final' => $this->input->get_post('precio_final'),
							  );
		$data['get_file']['file_adjunct']=FALSE;
		$data['get_file']['file_name']=NULL;
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
		{
			$file = $_FILES['input-addImageItem'];
			if($file){
				if(!is_dir("files/"))
					mkdir("files/", 0777);
						    
				$temp['date_created'] = date("Ymd");
				$length_str = 13;
				$charset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$rand_str = '';
				for ($i = 0; $i < $length_str; ++$i) 
				{
					$rand_str .= $charset[rand(0, strlen($charset) - 1)];
				}
				$temp['rand_string'] = $rand_str;
				$temp['file_name'] = $temp['rand_string']."-".$temp['date_created'].".jpg";
				$file['name'] = $temp['file_name'];
				if ($file['name'] && move_uploaded_file($file['tmp_name'],"files/".$file['name']))
				{
					$data['get_file']['file_adjunct']=TRUE;
					$data['get_file']['file_name']=$file['name'];
				} 
			} 
					//$data['received']['idNameItem'] = $data['received']['nombre'];
					//$data['received']['idURLItem'] = $dat;
					//$jsonR = json_encode($data['received']);
		}
		if($data['get_file']['file_adjunct'] && $data['get_file']['file_name']!=NULL){
			$data['received']['urlImage'] = $data['get_file']['file_name'];
		}
		$query = $this->item_model->insertItem($data['received']);
		if(!$query){
			$info = array(
							'success' => 0,
							'error' => 1,
							'subject' => 'Error del Servidor',
							'msg' => 'Ocurrió un error al guardar los datos. Verifiqué que haya llenado los campos correctamente y que su conexión a internet este funcionando.',
						);
			$jsonR = json_encode($info);
		} else {
			$jsonR = json_encode($data['received']);
		}
		echo $jsonR;	
	}
	function tpv()
	{
		$this->load->view('TEST/tpv');
	}
}