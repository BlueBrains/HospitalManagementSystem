<?php
require(APPPATH.'libraries/rest_controller.php');
 
class patient extends REST_Controller{
	function u_get(){
		$this->load->model('patient_model');
		$patient = $this->patient_model->find($this->get('id'));
		if($this->response->format == 'html'){
			$data['patient'] = $patient;
			$data['main_content']='patient/view.html';
			
			$this->load->view('includes/template',$data);
		}
		
		else 
			$this->response($patient,200);
	}

	function u_delete(){
		$id = array($this->get('id'));
		$this->load->model('patient_model');
		$this->patient_model->delete($id);
	}

	function new_get(){
		$this->load->view('patient/new.html');
	}

	function new_post(){
		$this->load->model('patient_model');
		
		$patient = array($this->post());
		
		$this->patient_model->create($patient);
	}

	function pr_post(){
		$this->load->model('patient_model');
		
		$private = array($this->post());
		
		$this->patient_model->insert_private_info($private);
	}

	function fm_post(){
		$this->load->model('patient_model');
		
		$family = array($this->post());
		
		$this->patient_model->insert_family_info($family);
	}

	function hl_post(){
		$this->load->model('patient_model');
		
		$health = array($this->post());
		
		$this->patient_model->insert_health_info($health);
	}

	function edit_get(){
		$this->load->view('patient/edit.html');
	}

	function edit_put(){
		$id = $this->put('id');
		$patient = array();
		foreach ($this->put() as $key => $value) {
			if($key != '_method' || $key != 'id' )
				$patient[$key] = $value;
		}

		$this->load->model('patient_model');
		$this->patient_model->update($id,$patient);
	}

	function pr_put(){
		$id = $this->put('id');
		$private = array();
		foreach ($this->put() as $key => $value) {
			if($key != '_method' || $key != 'id' )
				$private[$key] = $value;
		}

		$this->load->model('patient_model');
		$this->patient_model->update_private_info($id,$private);
	}

	function fm_put(){
		$id = $this->put('id');
		$family = array();
		foreach ($this->put() as $key => $value) {
			if($key != '_method' || $key != 'id' )
				$family[$key] = $value;
		}

		$this->load->model('patient_model');
		$this->patient_model->update_family_info($id,$family);
	}

	function hl_put(){
		$id = $this->put('id');
		$health = array();
		foreach ($this->put() as $key => $value) {
			if($key != '_method' || $key != 'id' )
				$health[$key] = $value;
		}

		$this->load->model('patient_model');
		$this->patient_model->update_health_info($id,$health);
	}
}