<?php

class site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	session_start();
		$this->is_logged_in();
		$this->user_is();
		
	}

	function members_area()
	{
		   redirect('login/request');
		   die();
	}
	function user_is()
	{
		if ($_SESSION['user']=='doctor')
			echo "doctor";
		else if ($_SESSION['user']=='admin') 
			echo "Admin";			     
		else 
			echo"Patient";
		
		
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