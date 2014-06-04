<?php

class Hospital extends CI_Controller {

	public function index()
	{
		$data['main_content'] = 'welcome_page';
		$this->load->view('includes/template',$data);
	}
	
	function doctor()
	{
		$isDoctorLoggedIn = $this->session->userdata('isDoctorLoggedIn');
		
		if(isset($isDoctorLoggedIn) && $isDoctorLoggedIn == true)
		{
			$data['main_content'] = 'doctor_view';	
			$data['title'] = 'Welcome Doctor';	
			$data['bar1'] = "Doctor Order";
			$data['linkbar1'] ="radiology/request";
			$this->load->view('includes/template',$data);
					
		}
	}
	
	function admin()
	{
		$isAdminLoggedIn = $this->session->userdata('isAdminLoggedIn');
		if(isset($isAdminLoggedIn) && $isAdminLoggedIn == true)
		{
				
			$data['title'] = 'Welcome Admin';
			$data['main_content'] ='admin_view';	
			$data['bar1'] = "Create member";
			$data['linkbar1'] ="login/add_doctor";
			$this->load->view('includes/template',$data);
					
		}
	}
	function assert_patient()
	{
		$isAdminLoggedIn = $this->session->userdata('isAdminLoggedIn');
		if(isset($isAdminLoggedIn) && $isAdminLoggedIn == true)
		{
			$this->load->model('Membership_model');
				if($this->Membership_model->findPatient($this->input->post('assert'))){
					$this->load->model('patient_departe_model');
					$this->patient_departe_model->assert_t_depart();	
					$data['title'] = 'Welcome Admin';
			$data['main_content'] ='admin_view';	
			$data['bar1'] = "Create member";
			$data['linkbar1'] ="login/add_doctor";
			$data['done'] =TRUE;
			$this->load->view('includes/template',$data);
				}
				else {
					$data['title'] = 'Welcome Admin';
			$data['main_content'] ='admin_view';	
			$data['bar1'] = "Create member";
			$data['linkbar1'] ="login/add_doctor";
			$data['done'] =FALSE;
			$this->load->view('includes/template',$data);
					
				}
		}
	}
}
