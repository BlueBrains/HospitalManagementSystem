<?php
require(APPPATH.'libraries/rest_controller.php');
 
class radiograph_supervisor extends REST_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('radiograph_model');
		// if ($this->session->userdata('tag') != "radiograph_supervisor")
		// {
			// echo "You dont have permission to start this action";
		// }
// 	
	}
	
	function  homepage_get ()
	{
	//	$info = $this->radiograph_model->radiograph_supervisor_info($this->session->userdata('id'));
		
	//		$data['nam']=$info->firstName." ".$info->lastName;
			//$data['main_content'] = 'radiograph/radiograph_index';
			$data['main_content'] = 'radiograph/test';	
			$data['title'] = 'Welcome Admin';	
			$data['bar1'] = "not specified";
			$data['linkbar1'] ="#";
			$data['idd']="2";
			//$this->load->view('includes/template',$data);
			$this->load->view('radiograph/test',$data);
		
	}
	
	function total_order_list_get ()
	{
		$data['record'] = $this->radiograph_model->fetch_req(0);
		    $data['main_content'] = 'radiograph/test';	
			$data['title'] = 'Welcome Admin';	
			$data['bar1'] = "not specified";
			$data['linkbar1'] ="#";
			$data['idd']="2";
			
		$this->load->view('radiograph/radiograph_order_list_view',$data);
		
	}
	
	function order_list_implemented_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-1);
		$this->load->view('radiograph/radiograph_order_list_view',$data);
		
	}
	
	function order_list_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-2);
		$this->load->view('radiograph/radiograph_order_list_view',$data);
		
	}
	
	function radiograph_external_request_done_get ()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-3);
		$this->load->view('radiograph/radiograph_order_list_view',$data);
		
	}
	 
	function un_seen_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-4);
		$this->load->view('radiograph/radiograph_order_list_view',$data);
	} 	
	
	function radiograph_external_request_get()
	{
		$this->load->view('radiograph/radiograph_external_request_view');
	}
	
	function radiograph_external_request_sign_get()
	{
		$data['record'] = $this->radiograph_model->create_req(-1);	
		$this->load->view('radiograph/test');
	}
	
	function confirm_request_get($id)
	{
			
		$this->load->view('radiograph/upload_result',$data);
	}	
	
	function finish_request_get($id)
	{
		$this->load->view('radiograph/test',$data);
		$data['record'] = $this->radiograph_model->create_req(-1);
	}
	
	function delete($id)
	{
		
	}
}