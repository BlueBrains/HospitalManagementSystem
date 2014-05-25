<?php

class radiology extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
	}	
	
	function request()
	{
		//$isLoggedIn = $this->session->userdata('isLoggedIn');
		if(!isset($isDoctorLoggedIn) || $isDoctorLoggedIn != true)
		{
				
			$data['main_content'] = 'request';	
			$data['title'] = 'Welcome Doctor';	
			$data['bar1'] = "Doctor Order";
			$data['linkbar1'] ="doctor_view";
			$this->load->view('includes/template',$data);
			//die();
		}
					
	//	$this->load->view('request');
	}
	function send_req()
	{
		$this->load->model('radiology_model');
		if($data['record'] = $this->radiology_model->create_req())
			{	
		
			$data['main_content'] = 'requests_page';	
			$data['title'] = 'Request Submited';	
			$data['bar1'] = "not specified";
			$data['linkbar1'] ="#";
			$this->load->view('includes/template',$data);

			}
			else
			{
				// error message
			$data['main_content'] = 'requests_page';	
			$data['title'] = 'Welcome Admin';	
			$data['bar1'] = "not specified";
			$data['linkbar1'] ="#";
			$this->load->view('includes/template',$data);
			}
	
	}
	function patient_req($id)
	{

		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if(!isset($isAdminLoggedIn) || $isAdminLoggedIn != true)
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
		$this->load->model('radiology_model');
        $this->radiology_model->delete_req($id);
		$data['record'] = $this->radiology_model->fetch_req(0);	
		//$this->load->view('requests_page',$data);
			$data['main_content'] = 'admin_view';	
			$data['title'] = 'Welcome Admin';	
			$data['bar1'] = "not specified";
			$data['linkbar1'] ="#";
			$this->load->view('includes/template',$data);

	}
}

