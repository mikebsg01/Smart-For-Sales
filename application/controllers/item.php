<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('item_model');
	}
	public function message()
	{
		$this->load->view('welcome_message');
	}

	public function index(){
		$nombre = $this->input->get('nombre');
		echo '{ "nombre" : "'.$nombre.'" }';	
	}

	public function getAllItems(){
		
		$query = $this->item_model->getAllItems();

		$num_items = $query->num_rows();
		
		if($query == TRUE && $num_items>0){
			//  "request" : "success", 
			$index = 1;
			$jsonR = '{ "aaData": [';
			foreach ($query->result() as $reg) {
				$jsonR .= " { ";
					$jsonR .= ' "id": "'.$reg->id.'", ';
					$jsonR .= ' "nombre": "'.$reg->nombre.'", ';
					$jsonR .=  ' "descripcion": "'.$reg->descripcion.'", ';
					$jsonR .=  ' "cantidad": "'.$reg->cantidad.'", ';
					$jsonR .=  ' "precio_unitario": "'.$reg->precio_unitario.'", ';
					$jsonR .=  ' "precio_final": "'.$reg->precio_final.'" ';
				if($index == ($num_items)){
					$jsonR .= " } ";
				} else {
					$jsonR .= " }, ";
				}
				++$index;
			}
			$jsonR .= '] } ';
			echo $jsonR;
		} else {
			echo '{ "request": "failed" }';
		}
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */