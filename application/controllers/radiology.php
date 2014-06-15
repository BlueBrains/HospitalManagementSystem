<?php

class radiology extends CI_Controller {
	function __construct()
	{
		parent::__construct();$this->load->library('session');
	
	}	
	
	function request()
	{

		$isLoggedIn = $this->session->userdata('isLoggedIn');
		$roll = $this->session->userdata('rollname');
		$this->load->model('Membership_model');
		if(isset($isLoggedIn) && $isLoggedIn == true && $this->Membership_model->can_do($roll,'send_requests'))
		{
		    $this->load->model('Membership_model');
			$res=$this->Membership_model->findDoctor($this->session->userdata('ID'));	
			$data['dep']=$res->department_name;
			$data['nam']=$res->firstName." ".$res->lastName;
			$data['main_content'] = 'request';	
			$data['title'] = 'Welcome Doctor';	
			$data['bar1'] = "Doctor";
			$data['linkbar1'] ="hospital/doctor";
			$this->load->view('includes/template',$data);
			//die();
		}			
	
	}
	function send_req()
	{
		$this->load->model('radiology_model');
		$this->load->model('patient_departe_model');
		 $id=$this->input->post('patient_id');
		$deppp = $this->patient_departe_model->get_depart($id); 
		 $this->load->model('Membership_model');
		
		if($this->Membership_model->findPatient($id) && $deppp!= FALSE){
			if($data['record'] = $this->radiology_model->create_req($deppp))
			{	
			$res=$this->Membership_model->findDoctor($this->session->userdata('ID'));	
			$data['dep']=$res->department_name;
			$data['nam']=$res->firstName." ".$res->lastName;	
			$data['main_content'] = 'requests_page';	
			$data['title'] = 'Request Submited';	
			$data['bar1'] = "Doctor";
			$data['linkbar1'] ="hospital/doctor";
			$this->load->view('includes/template',$data);

			}
		}
		else {
			$res=$this->Membership_model->findDoctor($this->session->userdata('ID'));	
			$data['dep']=$res->department_name;
			$data['nam']=$res->firstName." ".$res->lastName;
		  	$data['error']='no patient id matches';
			$data['main_content'] = 'request';	
			$data['title'] = 'Welcome Admin';	
			$data['bar1'] = "Doctor";
			$data['linkbar1'] ="hospital/doctor";
			$this->load->view('includes/template',$data);
		}
	}
	function patient_req($id)
	{

		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if(isset($isLoggedIn) && $isLoggedIn == true)
		{
		$this->load->model('radiology_model');
		$data['record'] = $this->radiology_model->fetch_req($id);	
		//$this->load->view('requests_page',$data);
			$data['main_content'] = 'admin_view';	
			$data['title'] = 'Welcome Admin';	
			$data['bar1'] = "not specified";
			$data['linkbar1'] ="#";
			$data['idd']="2";
			$this->load->view('includes/template',$data);
							
		}
		
	}
	
	public function upload($id)
	{
		$data['id']=$id;
		$this->load->view('upload',$data);
	}

	public function send_photo($id)
	{
		$this->load->model('radiology_model');
		$this->radiology_model->photo_upload($id);
	}
	
	// function send_photo()
	// {
		// $this->load->model('radiology_model');
		// if($query = $this->Membership_model->upload())
			// {
				// $this->load->view('requests_page', $query);
			// }
			// else
			// {
				// $this->load->view('request');			
			// }
// 		
	// }
	function show_image($id)
    {
        $this->load->model('radiology_model');
        $data['records']=$this->radiology_model->show_image($id);
        $this->load->view("photo",$data);
    }
	function delete($id)
	{
		$isLoggedIn = $this->session->userdata('isAdminLoggedIn');
		$isdLoggedIn = $this->session->userdata('isDoctorLoggedIn');
		if(isset($isLoggedIn) && $isLoggedIn == true){		
		$this->load->model('radiology_model');
        $this->radiology_model->delete_req($id);
		$data['record'] = $this->radiology_model->fetch_req(0);	
		//$this->load->view('requests_page',$data);
			$data['main_content'] = 'admin_view';	
			$data['title'] = 'Welcome Admin';	
			$data['bar1'] = "not specified";
			$data['linkbar1'] ="#";
			$data['idd']="2";
			$this->load->view('includes/template',$data);
		}
		else if (isset($isdLoggedIn) && $isdLoggedIn == true){		
		$this->load->model('radiology_model');
        $this->radiology_model->delete_req($id);
		$data['record'] = $this->radiology_model->fetch_req(0);	
		//$this->load->view('requests_page',$data);
			$data['main_content'] = 'doctor_view';	
			$data['title'] = 'Welcome Admin';	
			$data['bar1'] = "Doctor Order";
			$data['linkbar1'] ="hospital/doctor";
			$this->load->view('includes/template',$data);
		}
	}
	
	function search ()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if(isset($isLoggedIn) && $isLoggedIn == true)
		{	
		$this->load->model('radiology_model');
		$e = $this->input->post('op');
		$data['record'] = $this->radiology_model->search_by($e);	
			$data['main_content'] = 'admin_view';	
			$data['title'] = 'Welcome Admin';	
			$data['bar1'] = "not specified";
			$data['linkbar1'] ="#";
			$data['idd']="2";
			$this->load->view('includes/template',$data);		
		}
	}
}

