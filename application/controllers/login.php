<?php

class Login extends CI_Controller {
	
	function index()
	{
		$data['main_content'] = 'index';
		$this->load->view('login', $data);


	}
	
	function validate_credentials()
	{		
		$this->load->model('Membership_model');
		$q = $this->Membership_model->validate();
		
		if($q) // if the user's credentials validated...
		{	
			
		    session_start();
			$_SESSION['username']=$_POST["username"];
			$_SESSION['is_logged_in']=true;
		if ($_POST['ID']=='Doctor')	
			$_SESSION['user']='doctor';
		else if	($_POST['ID']=='Admin')	
		    $_SESSION['user']='admin';
		else		
			$_SESSION['user']='patients';
	
			redirect('site/members_area',$data);
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
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('signup_form', $data);
	}
	
	function create_member()
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
			if($query = $this->Membership_model->create_member($_POST['username'],$_POST['password'],$_POST['first_name'],$_POST['last_name'],$_POST['mobile'],$_POST['email']))
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
	function request()
	{
		$this->load->view('request');
	}
	function bit()
	{$this->load->view('js');}
	function tbit()
	{$this->load->view('script.html');}
	function logout()
	{
	    session_start();	
	    session_destroy();
		$this->load->view('station');
	}

}