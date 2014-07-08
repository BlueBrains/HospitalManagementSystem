<?php
require(APPPATH.'libraries/rest_controller.php');
require(APPPATH.'libraries/CI_Pusher.php');
 
class patient extends REST_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('patient_model');
		$this->p = new CI_Pusher();
	}

	function u_get(){
		$patient = $this->patient_model->find($this->get('id'));
		if($this->response->format == 'html'){
			$data['title'] = 'Patient Information';
			$data['patient'] = $patient;
			$data['main_content']='patient/view.html';
			
			$this->load->view('includes/template',$data);
		}
		
		else 
			$this->response($patient,200);
	}

	function u_delete(){
		$id = array($this->get('id'));
		$this->patient_model->delete($id);
	}

	function index_get()
	{
		$all = $this->patient_model->names();
		$this->response($all,200);
	}

	function new_get(){
		$data['title'] = 'New Patient';
		$data['main_content']='patient/new.html';
		$this->load->view('includes/template',$data);
	}

	function new_post(){
		
		$patient = array();
		foreach ($this->post() as $key => $value) {
			if($key == 'language'){
				$patient['language']=str_replace('_', '', $value);
			}
			else if($key == 'marital_status'){
				if ($value == 'single'){
					$patient[$key] = 0;
				}
				else
					$patient[$key] = 1;
			}
			else
				$patient[$key]=$value;
		}
		
		$this->patient_model->create(array($patient));
		$name = $patient['fname']." ".$patient['lname'];
		$id = $this->patient_model->find_by_name($name);
		redirect("/patient/u/id/{$id}");
	}

	function pr_post(){
		
		$private = array($this->post());
		
		$this->patient_model->insert_private_info($private);
	}

	function fm_post(){
		$s_patient_id = $this->patient_model->find_by_name($this->post('name'));
		$family = array(array(
			's_patient_id'=>$s_patient_id,
			'relationship'=>$this->post('relationship'),
			'patient_id'=>$this->post('patient_id')
		));		
		$id = $this->patient_model->insert_family_info($family);
		$fm = array(
			'name'=>$this->post('name'),
			'relationship'=>$this->post('relationship'),
			'id'=>$id,
			'sid'=>$s_patient_id
		);
		$this->p->trigger('patient','fm_add',$fm);

		echo 200;
	}

	function hl_post(){
		
		$health = array($this->post());
		
		$id = $this->patient_model->insert_health_info($health);
		$hl = array(
			'recored_name'=>$this->post('recored_name'),
			'status'=>$this->post('status'),
			'category'=>$this->post('category'),
			'id'=>$id
		);
		$this->p->trigger('patient','hl_add',$hl);

		echo 200;
	}


	function edit_put(){
		$id = $this->put('id');
		$patient = array($this->put('field')=>$this->put('value'));

		$this->patient_model->update($id,$patient);
		$p = array('field'=>$this->put('field'),'value'=>$this->put('value'));
		$this->p->trigger('patient','p_edit',$p);
		echo 200;
	}

	function pr_put(){
		$id = $this->put('id');
		$private = array($this->put('field')=>$this->put('value'));
		
		$this->patient_model->update_private_info($id,$private);
		$pr = array('field'=>$this->put('field'),'value'=>$this->put('value'));
		$this->p->trigger('patient','pr_edit',$pr);
		echo 200;
	}

	function fm_put(){
		$id = $this->put('id');
		$family = array();
		foreach ($this->put() as $key => $value) {
			if($key != '_method' || $key != 'id' )
				$family[$key] = $value;
		}

		$this->patient_model->update_family_info($id,$family);
	}

	function hl_put(){
		$id = $this->put('id');
		$health = array();
		foreach ($this->put() as $key => $value) {
			if($key != '_method' || $key != 'id' )
				$health[$key] = $value;
		}

		$this->patient_model->update_health_info($id,$health);
	}

	function fm_delete(){
		$id = $this->delete('id');
		$this->patient_model->delete_family_info($id);
		echo 200;
	}

	function hl_delete(){
		$id = $this->delete('id');
		$this->patient_model->delete_health_info($id);
		echo 200;
	}
}