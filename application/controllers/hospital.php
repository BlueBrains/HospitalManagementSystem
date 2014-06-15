<?php

class Hospital extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if (!isset($isLoggedIn) || $isLoggedIn != true)
		   $this->index();
	}	
	public function index()
	{
		$data['main_content'] = 'welcome_page';
		$this->load->view('includes/template',$data);
	}
	
	function doctor()
	{
		$roll = $this->session->userdata('rollname');
		if ($roll=='doctor'||$roll=='superadmin')	
		{
			$data['main_content'] = 'doctor_view';	
			$data['title'] = 'Welcome '.$roll;	
			$data['bar1'] = "Doctor Order";
			$data['linkbar1'] ="radiology/request";
			$this->load->view('includes/template',$data);
					
		}
	}
	
	function admin()
	{
			$roll = $this->session->userdata('rollname');
		if($roll=='superadmin'||$roll=='pharmacy_admin'||$roll=='analyse_admin'||$roll=='radiology_admin')
		{				
			$data['title'] = 'Welcome '.$roll;
			$data['main_content'] ='admin_view';	
			$data['bar1'] = "Create member";
			$data['linkbar1'] ="login/add_doctor";
			$this->load->view('includes/template',$data);
					
		}
	}
	function station()
	{
						$this->load->model('Membership_model');
						$roll = $this->session->userdata('rollname');
						$row = $this->Membership_model->all_prev($roll);
															
						
						$this->session->set_userdata('send_requests',$row->send_requests);
						$this->session->set_userdata('delete_requests', $row->delete_requests);
						$this->session->set_userdata('pharmacy_admin', $row->pharmacy_admin);
						$this->session->set_userdata('radiology_admin', $row->radiology_admin);
						$this->session->set_userdata('analysis_admin', $row->analysis_admin);
						$this->session->set_userdata('add_admin', $row->add_admin);
						$this->session->set_userdata('add_doctor', $row->add_doctor);
						$this->session->set_userdata('add_patient', $row->add_patient);
						$this->session->set_userdata('delete_patient', $row->delete_patient);
						$this->session->set_userdata('assert_patient', $row->assert_patient);
						$this->session->set_userdata('eject_patient', $row->eject_patient);
						$this->session->set_userdata('view_patient', $row->view_patient);
						if ($roll=='superadmin'||$roll=='pharmacy_admin'||$roll=='analyse_admin'||$roll=='radiology_admin') {
							$data['title'] = 'Welcome '.$roll;
							$data['main_content'] ='admin_view';	
							$data['bar1'] = "Create member";
							$data['linkbar1'] ="login/add_doctor";
							$this->load->view('includes/template',$data);
						}
						else if ($this->Membership_model->can_do($roll,'view_patient')){
 					
							$data['main_content'] = 'doctor_view';
							$data['title'] = 'Welcome Doctor';
							$data['bar1'] = "Doctor Order";
							$data['linkbar1'] ="radiology/request";
							$this->load->view('includes/template', $data);	
							
							}
					 
						else
							{	//patient
							//redirect('Hospital',$data);
							}
							
							
	}
	function assert_patient()
	{
		if($this->can('assert_patient'))
		{
			$x=0;
			$this->load->model('Membership_model');
				if($this->Membership_model->findPatient($this->input->post('assert'))){
					$this->load->model('patient_departe_model');
					if ($this->patient_departe_model->get_depart($this->input->post('assert')))
							{$x=1; goto Lable;}
					else {
					$this->patient_departe_model->assert_t_depart();
						$data['title'] = 'Welcome Admin';
						$data['main_content'] ='admin_view';	
						$data['bar1'] = "Create member";
						$data['linkbar1'] ="login/add_doctor";
						$data['done'] =TRUE;
						$this->load->view('includes/template',$data);
							}
				}
			else{ Lable :
					if ($x)
						$data['done']="the patient is al-ready in this section";
					else
						$data['done'] =FALSE;			
					
					$data['title'] = 'Welcome Admin';
					$data['main_content'] ='admin_view';	
					$data['bar1'] = "Create member";
					$data['linkbar1'] ="login/add_doctor";
					$this->load->view('includes/template',$data);
			}		
				
		}
	}

	function can ($value)
	{
		$roll = $this->session->userdata('rollname');
		$this->load->model('Membership_model');
				if($this->Membership_model->can_do($roll,$value))
				{
					return TRUE;
				}
				else {
					return False;
				}
	}
}
