<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Datacenter extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('datacenter_model');
	}
	public function getDataCompany(){
		$query = $this->datacenter_model->getDataCompany();
		$num_data = $query->num_rows();
		if($query == TRUE && $num_data>0){
			$idx = 1;
			$jsonR = '{ "allData": [ ';
			foreach ($query->result() as $reg) {
				$jsonR .= '{';
				$jsonR .= ' "id": "'.$reg->id.'", ';
				$jsonR .= ' "nombre": "'.$reg->nombre.'", ';
				$jsonR .= ' "gerente": "'.$reg->gerente.'", ';
				$jsonR .= ' "industria": "'.$reg->industria.'", ';
				$jsonR .= ' "servicios": "'.$reg->servicios.'", ';
				$jsonR .= ' "pais": "'.$reg->pais.'", ';
				$jsonR .= ' "denominacion": "'.$reg->denominacion.'", ';
				$jsonR .= ' "estado": "'.$reg->estado.'", ';
				$jsonR .= ' "ciudad": "'.$reg->ciudad.'", ';
				$jsonR .= ' "telefono": "'.$reg->telefono.'", ';
				$jsonR .= ' "direccion": "'.$reg->direccion.'", ';
				$jsonR .= ' "codigopostal": "'.$reg->codigopostal.'", ';
				$jsonR .= ' "website": "'.$reg->website.'", ';
				$jsonR .= ' "urlImage": "'.$reg->urlImage.'" ';
				if($idx == ($num_data)){
					$jsonR .= " } ";
				} else {
					$jsonR .= " }, ";
				}
				++$idx;
			}
			$jsonR .= '], "num_company": "'.($idx-1).'", "request": "success", "update": "1" } ';
		} else {
			$jsonR = '{ "request": "failed" }';
		}
		echo $jsonR;
	}
	public function updateData(){
		$data['received'] = array(
									'nombre' => $this->input->get_post('company-name'),
									'gerente' => $this->input->get_post('company-chief'),
									'industria' => $this->input->get_post('company-industry'),
									'servicios' => $this->input->get_post('company-services'),
									'pais' => $this->input->get_post('company-country'),
									'denominacion' => $this->input->get_post('company-designation'),
									'estado' => $this->input->get_post('company-state'),
									'ciudad' => $this->input->get_post('company-city'),
									'telefono' => $this->input->get_post('company-phone'),
									'direccion' => $this->input->get_post('company-address'),
									'codigopostal' => $this->input->get_post('company-postal'),
									'website' => $this->input->get_post('company-website'),
								 );
		$show_info = FALSE;
		$query = $this->datacenter_model->getDataCompany();
		$num_data = $query->num_rows();
		if($num_data == 0){
			$query = $this->datacenter_model->insertDataCompany($data['received']);
		} else {
			$field_num = 0;
			$update = FALSE; 
			foreach($data['received'] as $field=>$val)
			{
				if($val != FALSE && $val != NULL && $val != " "){
					$data['update'][$field]=$val;
					++$field_num;
				}
			}
			if($field_num>0){
				$regUpdate['id'] = NULL;
				foreach ($query->result() as $reg) {
					$regUpdate['id'] = $reg->id;
				}
				$update = $this->datacenter_model->updateDataCompany($data['update'],$regUpdate['id']);
			}
			if($update){
				$this->getDataCompany();
			} else {
				$jsonR = array('request'=>'failed','update'=>FALSE);
				echo json_encode($jsonR);
			}
			$show_info = TRUE;
		}
		if(!$show_info){
			$jsonR = array('request'=>'success','update'=>FALSE);
			echo json_encode($jsonR);
		}
	}
	public function getForeignCurrency(){
		$data = $this->datacenter_model->getDataForeignCurrency();
		if($data){
			if($data['request'] == 'success'){
				echo json_encode($data);
			} else {
				$info = array('request' => 'failed');
				echo json_encode($info);
			}
		} else {
			$info = array('request' => 'failed');
			echo json_encode($info);
		}
	}
	public function updateForeignCurrency(){
		$data['received'] = array(
									'dolar' => $this->input->get_post('dollar'),
									'euro' => $this->input->get_post('euro')
								 );
		$query = $this->datacenter_model->getDataCompany();
		$num_data = $query->num_rows();
		if($num_data>0){
			foreach($query->result() as $reg) {
				$regUpdate['id'] = $reg->id;
			}
			$this->datacenter_model->updateForeignCurrency($data['received'],$regUpdate['id']);
		}
	}
}
