<?php

class site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	session_start();
		$this->is_logged_in();
		$this->is_Doctor();
		
	}

	function members_area()
	{
		   redirect('login');
		   die();
	}
	function is_Doctor()
	{
		// database fetching and proccessing
		$is_Doctor = $_SESSION['is_Doctor'];
		if ($is_Doctor)
		{
			echo"Admin";
		}
		
	}
	function another_page() // just for sample
	{
		echo 'good. you\'re logged in.';
	}
	
	function is_logged_in()
	{
		
		$is_logged_in = $_SESSION['is_logged_in'];
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';	
			die();		
			$this->load->view('login_form');
		}			
	}	

}
?>