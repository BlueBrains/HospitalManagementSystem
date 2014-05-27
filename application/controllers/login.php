<?php

class Login extends CI_Controller {
	
	function index()
	{
		$data['main_content'] = 'logIn_view';
		//$data['main_content'] = 'login';
		$data['title'] = 'Join us !';
		
		$this->load->view('includes/template', $data);
	}
	
	function validate_credentials()
	{		
		$this->load->model('Membership_model');
		$q = $this->Membership_model->validate();
		
		if($q) // if the user's credentials validated...
		{			
				if ($_POST['ID']=='doctor')
				{
					$this->session->set_userdata('username',$this->input->post('username'));
					$this->session->set_userdata('isDoctorLoggedIn',TRUE);
				}
				else if ($_POST['ID']=='admin')
{
					$this->session->set_userdata('username',$this->input->post('username'));
					$this->session->set_userdata('isAdminLoggedIn',TRUE);
}
				else
					{
					$this->session->set_userdata('username',$this->input->post('username'));
					$this->session->set_userdata('isPatientLoggedIn',TRUE);
					}

				
			
			//$this->session->set_userdata('isDoctorLoggedIn',TRUE);
					if ($_POST['ID']=='doctor')
				   		{
				   				
				   			$data['main_content'] = 'doctor_view';
							$data['title'] = 'Welcome Doctor';
							$data['bar1'] = "Doctor Order";
							$data['linkbar1'] ="radiology/request";
							$this->load->view('includes/template', $data);		
						}
					else if ($_POST['ID']=='admin')
					{
							$data['title'] = 'Welcome Admin';
							$data['main_content'] ='admin_view';	
							$data['bar1'] = "Create member";
							$data['linkbar1'] ="login/add_doctor";
							$this->load->view('includes/template',$data);
					}
					else
						redirect('Hospital',$data);
						
			
		}
		else // incorrect username or password
		{
			echo "Error Not Valid";	
			redirect('login',$data);
		}
	}	
	function red()
	{
		$this->load->view('station', $data);
	}
		function station()
	{
		$this->load->view('station', $data);
	}
	function add_doctor()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	function add_paitent()
	{
		$data['main_content'] = 'signup_form_patient';
		$this->load->view('includes/template', $data);
	}
	
	function create_member($r)
	{
		$this->load->library('form_validation');
		
	  //  field name, error message, validation rules
		$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[32]');
		

		if($this->form_validation->run() == FALSE)
		{
				if ($r==2){
							$data['title'] = 'Welcome Admin';
							$data['main_content'] ='signup_form';	
							$data['bar1'] = "Create member";
							$data['linkbar1'] ="login/add_doctor";
							$this->load->view('includes/template',$data);
}
				else{
							$data['title'] = 'Welcome Admin';
							$data['main_content'] ='signup_form_patient';	
							$data['bar1'] = "Create member";
							$data['linkbar1'] ="login/add_doctor";
							$this->load->view('includes/template',$data);			
				}
		}
		
		else
		{			
			$this->load->model('Membership_model');
			/**/
			if($query = $this->Membership_model->create_member($r))
			{
							$data['title'] = 'Welcome Admin';
							$data['main_content'] ='admin_view';	
							$data['bar1'] = "Create member";
							$data['linkbar1'] ="login/add_doctor";
							$this->load->view('includes/template',$data);
			}
			else
			{
							$data['title'] = 'Welcome Admin';
							$data['main_content'] ='signup_form_patient';	
							$data['bar1'] = "Create member";
							$data['linkbar1'] ="login/add_doctor";
							$this->load->view('includes/template',$data);			
			}
		}
		
	}

	function setorder()
	{
			session_start();
			//$this->load->view('services');
			if (isset($_SESSION['username']))
						{ 
						  if ($_SESSION['user']=='doctor')
						     $this->A1();
						  else	if ($_SESSION['user']=='admin') 
						     $this->A2();
						} 
			else
						echo "If you don't have an account Plz SignUp.";
					
					
	}
	function A1()
	{$this->load->view('nonserv'); }
	function A2()
	{$this->load->view('services');}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

}