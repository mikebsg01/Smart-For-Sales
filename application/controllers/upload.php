<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			//$error = array('error' => $this->upload->display_errors());

			redirect(base_url().'index.php/welcome/index?error_upload=1&success_upload=0');
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());

			redirect(base_url().'index.php/welcome/index?error_upload=0&success_upload=1');
		}

	}

	function test()
	{
		$ajaxReceived = array( 
							'name' => $this->input->get_post('name'),
							'time' => $this->input->get_post('time'),
						);

		echo "{ 'name': '".$ajaxReceived['name']."', 'time': '".$ajaxReceived['time']."' }";
	}
}
?>