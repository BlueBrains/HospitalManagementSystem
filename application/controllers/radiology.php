<?php

class radiology extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}	
	
	function request()
	{
			$data['main_content'] = 'request';	
			$data['title'] = 'Welcome Doctor';	
			$data['bar1'] = "Doctor Order";
			$data['linkbar1'] ="login";
			$this->load->view('includes/template',$data);
			
	//	$this->load->view('request');
	}
	function send_req()
	{
		$this->load->model('radiology_model');
		if($query = $this->radiology_model->create_req())
			{
				$this->load->view('requests_page', $query);
			}
			else
			{
				$this->load->view('request');			
			}
	
	}
	function patient_req($id)
	{
		$this->load->model('radiology_model');
		$query['record'] = $this->radiology_model->fetch_req($id);	
		$this->load->view('requests_page',$query);	
	}
	
	public function upload()
	{
		$this->load->view('upload');
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
}

