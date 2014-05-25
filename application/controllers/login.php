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
		
		if ($_POST['ID']=='doctor')
			$state = 'isDoctorLoggedIn';
		else if ($_POST['ID']=='admin')
			$state = 'isAdminLoggedIn';
		else
			$state = 'isPatientLoggedIn';
		if($q) // if the user's credentials validated...
		{			
				$data = array(
				'username' => $this->input->post('username'),
				 $state => true,
//				 'isDoctorLoggedIn'=> true
			);
			$this->session->set_userdata($data);
					
					if ($_POST['ID']=='doctor')
						redirect('Hospital/doctor',$data);
					else if ($_POST['ID']=='admin')
						redirect('Hospital/admin',$data);
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
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		
	
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		
		else
		{			
	
			
			$this->load->model('Membership_model');
			/**/
			if($query = $this->Membership_model->create_member($r))
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('signup_successful', $data);
			}
			else
			{
				$this->load->view('signup_form');			
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
		$this->index();
	}

}