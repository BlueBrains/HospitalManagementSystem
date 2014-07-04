<?php
require(APPPATH.'libraries/rest_controller.php');
 
class patient extends REST_Controller{
	function u_get(){
		$this->load->model('patient_model');
		$patient = $this->patient_model->find($this->get('id'));
		if($this->response->format == 'html'){
			$data['patient'] = $patient;
			$this->load->view('patient/view.html',$data);
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
		var_dump($this->input->post());
		/*$this->load->model('patient_model');
		
		$patient = array(array(
			'fname' => $this->post('fname')),
			'lname' => $this->post('lname')),
			'avatar' => $this->post('avatar')),
			'date_of_birth' => $this->post('date_of_birth')),
			'n_town' => $this->post('n_town')),
			'n_countery' => $this->post('n_countery')),
			'person_id' => $this->post('person_id')),
			'recored_number' => $this->post('recored_number')),
			'language' => $this->post('language')),
			'marital_state' => $this->post('marital_state')),
			'comments' => $this->post('comments'))
		);
		
		$this->patient_model->create($patient);*/
	}

	function pr_post(){
		$this->load->model('patient_model');
		
		$private = array(array(
			'patient_id' => $this->post('patient_id'),
			'address' => $this->post('address'),
			'province' => $this->post('province'),
			'c_countery' => $this->post('c_countery'),
			'email' => $this->post('email'),
			'phone' => $this->post('phone'),
			'cell' => $this->post('cell'),
			'position' => $this->post('position'),
			'company' => $this->post('company'),
			'comments' => $this->post('comments')
		));
		
		$this->patient_model->insert_private_info($private);
	}

	function fm_post(){
		$this->load->model('patient_model');
		
		$family = array(array(
			'patient_id' => $this->post('patient_id'),
			's_patient_id' => $this->post('s_patient_id'),
			'relationship' => $this->post('relationship')
		));
		
		$this->patient_model->insert_family_info($family);
	}

	function hl_post(){
		$this->load->model('patient_model');
		
		$health = array(array(
			'patient_id' => $this->post('patient_id'),
			'recored_name' => $this->post('recored_name'),
			'status' => $this->post('status'),
			'category' => $this->post('category')
		));
		
		$this->patient_model->insert_health_info($health);
	}

	function edit_get(){

		$this->load->view('patient/edit.html');
	}

	function edit_put(){
		echo "hi";
	}
}