<?php
require(APPPATH.'libraries/rest_controller.php');
 
class recepient extends REST_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('recepient_model');
		// if (!isset($this->session->userdata('tag') || $this->session->userdata('tag') != " recipient")
		// {
			// echo "You dont have permission to start this action";
		// }
// 	
	}
	
	function  homepage_get ()
	{
			$bar[0]=" fa-edit , Add Patient ,patient/new ,False";
			$bar[1]=" fa-qrcode ,Patient in Hospital,recepient/patients_in_hospital,False";
			$bar[2]=" fa-qrcode ,All hospital visiting,recepient/patients_visit_hospital,False";
			
			$data['main_content'] = 'reciption/reciption';	
			$data['section'] = 'reception';	
			$data['side'] = $bar;
			$this->load->view('includes/template',$data);
			//$this->load->view('radiograph/test',$data);
		
	}
	
	function patients_in_hospital_get()
	{
			$data['record'] = $this->recepient_model->p_i_h();			
			$bar[0]=" fa-edit , Add Patient ,patient/new ,False";
			$bar[1]=" fa-qrcode ,Patient in Hospital,recepient/patients_in_hospital,True";
			$bar[2]=" fa-qrcode ,All hospital visiting,recepient/patients_visit_hospital,False";
			
			$data['main_content'] = 'reciption/patients_in_hospital_view';	
			$data['section'] = 'reception';	
			$data['side'] = $bar;
			$this->load->view('includes/template',$data);
	}

	function patients_visit_hospital_get()
	{
			$data['record'] = $this->recepient_model->p_r();			
			$bar[0]=" fa-edit , Add Patient ,patient/new ,False";
			$bar[1]=" fa-qrcode ,Patient in Hospital,recepient/patients_in_hospital,False";
			$bar[2]=" fa-qrcode ,All hospital visiting,recepient/patients_visit_hospital,True";
			
			$data['main_content'] = 'reciption/patients_in_hospital_view';	
			$data['section'] = 'reception';	
			$data['side'] = $bar;
			$this->load->view('includes/template',$data);
	}
	
	 function patient_state_get()
	 {
	 		
	 		$data['record'] = $this->recepient_model->p_r_d($this->get('id'));	
			$data['id']=$this->get('id');		
			$bar[0]=" fa-edit , Add Patient ,patient/new ,False";
			$bar[1]=" fa-qrcode ,Patient in Hospital,recepient/patients_in_hospital,False";
			$bar[2]=" fa-qrcode ,All hospital visiting,recepient/patients_visit_hospital,False";
			
			$data['r']=$this->recepient_model->findEntry($this->get('id'));
			$data['main_content'] = 'reciption/patient_state_view';	
			$data['section'] = 'reception';	
			$data['side'] = $bar;
			$this->load->view('includes/template',$data);
			
	 	
	 }
	 
	 function patient_state_put()
	 {
	 	
	 		$data['record'] = $this->recepient_model->p_r_d($this->get('id'));			
			$bar[0]=" fa-edit , Add Patient ,patient/new ,False";
			$bar[1]=" fa-qrcode ,Patient in Hospital,recepient/patients_in_hospital,False";
			$bar[2]=" fa-qrcode ,All hospital visiting,recepient/patients_visit_hospital,False";
			
			$data['main_content'] = 'reciption/patient_state_view';	
			$data['section'] = 'reception';	
			$data['side'] = $bar;
			$this->load->view('includes/template',$data);
			
			 	
		
	 }
	
	function enter_get()
	{
				$data['record']=$this->recepient_model->g_p($this->get('id'));
				$bar[0]=" fa-edit , Add Patient ,patient/new ,False";
				$bar[1]=" fa-qrcode ,Patient in Hospital,recepient/patients_in_hospital,False";
				$bar[2]=" fa-qrcode ,All hospital visiting,recepient/patients_visit_hospital,False";
				$data['id']=$this->get('id');
				$data['main_content'] = 'reciption/assgin_patient';	
				$data['section'] = 'reception';	
				$data['side'] = $bar;
				$this->load->view('includes/template',$data);
	}
	
	function end_visitng_get()
	{

			
				{
				$r=$this->recepient_model->e_v($this->get('id'));	
				$data['record'] = $this->recepient_model->p_r();			
				$bar[0]=" fa-edit , Add Patient ,patient/new ,False";
				$bar[1]=" fa-qrcode ,Patient in Hospital,recepient/patients_in_hospital,False";
				$bar[2]=" fa-qrcode ,All hospital visiting,recepient/patients_visit_hospital,True";
				
				$data['main_content'] = 'reciption/patients_in_hospital_view';	
				$data['section'] = 'reception';	
				$data['side'] = $bar;
				$this->load->view('includes/template',$data);
				}
	}
		
 
	function enter_patient_get()
	{
	$res=$this->recepient_model->findEntry($this->get('id'));	
		if($res === FALSE)
		{
			if ($this->recepient_model->e_p_h($this->get('id')))
				{
				$data['record'] = $this->recepient_model->p_i_h();			
				$bar[0]=" fa-edit , Add Patient ,patient/new ,False";
				$bar[1]=" fa-qrcode ,Patient in Hospital,recepient/patients_in_hospital,True";
				$bar[2]=" fa-qrcode ,All hospital visiting,recepient/patients_visit_hospital,False";
				
				$data['main_content'] = 'reciption/patients_in_hospital_view';	
				$data['section'] = 'reception';	
				$data['side'] = $bar;
				$this->load->view('includes/template',$data);
				}
				}
		else	
		{
			$data['record']=$this->recepient_model->g_p($this->get('id'));
				$bar[0]=" fa-edit , Add Patient ,patient/new ,False";
				$bar[1]=" fa-qrcode ,Patient in Hospital,recepient/patients_in_hospital,False";
				$bar[2]=" fa-qrcode ,All hospital visiting,recepient/patients_visit_hospital,False";
				$data['id']=$this->get('id');
				$data['main_content'] = 'reciption/assgin_patient';	
				$data['section'] = 'reception';	
				$data['side'] = $bar;
				$data['error']="This Patient is Already in Hospital";
				$this->load->view('includes/template',$data);
		}	
	}
}	