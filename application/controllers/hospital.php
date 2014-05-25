<?php

class Hospital extends CI_Controller {

	public function index()
	{
		$data['main_content'] = 'welcome_page';
		$this->load->view('includes/template',$data);
	}
	
	function doctor()
	{
		
		if(!isset($isDoctorLoggedIn) || $isDoctorLoggedIn != true)
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
		if(!isset($isAdminLoggedIn) || $isAdminLoggedIn != true)
		{
				
			$data['title'] = 'Welcome Admin';
			$data['main_content'] ='admin_view';	
			$data['bar1'] = "Create member";
			$data['linkbar1'] ="login/add_doctor";
			$this->load->view('includes/template',$data);
					
		}
	}
}
