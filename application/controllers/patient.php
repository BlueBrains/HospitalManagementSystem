<?php
require(APPPATH.'libraries/rest_controller.php');
 
class patient extends REST_Controller{
	function u_get(){
		$id = array($this->get('id'));
		if($this->response->format == 'html'){
			$data['id'] = $id;
			$this->load->view('patient/t.html',$data);
		}
		
		else 
			$this->response($id,200);
	}

	function u_delete(){

	}

	function new_get(){
		$this->load->view('patient/new.html');
	}

	function new_post(){
		$this->load->model('patient_model');
		$patient = array(array('fname' => $this->post('fname')));
		$this->patient_model->create($patient);
		$this->new_get();
	}

	function edit_get(){
		$this->load->view('patient/edit.html');
	}

	function edit_put(){
		echo "hi";
	}
}