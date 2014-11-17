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
					$jsonR .=  ' "cantidad": "'.$reg->existencia_actual.'", ';
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

	public function addNewItem(){
		$insert = $this->input->post('insert');
		$data['received'] = array(
								'codigobarra' => $this->input->post('codebar'),
								'nombre' => $this->input->post('name'),
								'descripcion' => $this->input->post('description'),
								'stock' => $this->input->post('stock'),
								'existencia_actual' => $this->input->post('existActual'),
								'fecha_caducidad' => $this->input->post('fechaCaducidad'),
								'precio_unitario' => $this->input->post('precioUnitario'),
								'iva' => $this->input->post('iva'),
								'cargo_iva' => $this->input->post('cargoIva'),
								'cargo_extra' => $this->input->post('cargoExtra'),
								'motivo_del_cargo' => $this->input->post('motivoCargo'),
								'precio_final' => $this->input->post('precioFinal'),
								'urlImage' => $this->input->post('urlImage'),
							  );
		$errors = 0;
		if($insert == 1){
			$query = $this->item_model->insertItem($data['received']);
			if(!$query){
				++$errors;
			}
			if($errors){
				$info = array(
							'success' => 0,
							'error' => 1,
							'subject' => 'Error al Guardar Datos',
							'msg' => 'Ocurrió un error al guardar los datos. Verifiqué que haya llenado los campos correctamente y que su conexión a internet este funcionando.',
						);
				$jsonR = json_encode($info);
			} else {
				$data['received']['idNameItem'] = $data['received']['nombre'];
				$data['received']['idURLItem'] = $data['received']['urlImage'];
				$jsonR = json_encode($data['received']);
			}
			echo $jsonR;
		} else {
			$info = array(
								'success' => 0,
								'error' => 1,
		 						'subject' => 'Error del Servidor',
		 						'msg' => 'Ha ocurrido un error con el servidor.-' 
		 					);
		 	echo json_encode($info);
		}
	}

	public function test(){
		$this->load->view('ITEM/test_SESSION_ON.php');
	}
	public function upload_file()
	{
		//comprobamos que sea una petición ajax
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
		{
		 
		    //obtenemos el archivo a subir
		    $file = $_FILES['input-addImageItem']['name'];

		    $query = $this->item_model->updateImageItem( array('urlImage' => $_FILES['input-addImageItem']['name']) );
		 	
		 	if(!$query){
		 		$info = array(
		 						'subject' => 'Error del Servidor',
		 						'msg' => 'Ha ocurrido un error con el servidor a la hora de subir la imagen del artículo.' 
		 					);
		 		echo json_encode($info);
		 	} else {
			    //comprobamos si existe un directorio para subir el archivo
			    //si no es así, lo creamos
			    if(!is_dir("files/"))
			        mkdir("files/", 0777);
			    
			    //comprobamos si el archivo ha subido
			    if ($file && move_uploaded_file($_FILES['input-addImageItem']['tmp_name'],"files/".$file))
			    {
			       sleep(1);//retrasamos la petición 3 segundos
			       echo $file;//devolvemos el nombre del archivo para pintar la imagen
			    }
			}
		}else{
		    throw new Exception("Error Processing Request", 1);  
		}
	}
	public function prueba(){
		$x = "C:/users/image.png";
		echo $x;
		$a = explode('/',$x);
		$i = count($a);
		echo $a[$i-1];
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */