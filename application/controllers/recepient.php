<?php
require(APPPATH.'libraries/rest_controller.php');
 
class recepient extends REST_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('radiograph_model');
		// if (!isset($this->session->userdata('tag') || $this->session->userdata('tag') != " recipient")
		// {
			// echo "You dont have permission to start this action";
		// }
// 	
	}
	
	function  homepage_get ()
	{
			$bar[0]=" fa-edit , Add Patient , add_patient ,False";
			$bar[1]=" fa-qrcode ,Patient in Hospital,#,False";
			$bar[2]=" fa-qrcode ,All hospital patients,radiograph_supervisor/order_list,False";
			
			$data['main_content'] = 'reciption/reciption';	
			$data['section'] = 'reception';	
			$data['side'] = $bar;
			$this->load->view('includes/template',$data);
			//$this->load->view('radiograph/test',$data);
		
	}
	
	function add_patient_get()
	{
		
	}
	
	function add_patient_post()
	{
		
	}
	
	function patients_in_hospital_get()
	{
		
	}
	function patient_state_get()
	{
		
	}
	function patients_visit_hospital_get()
	{
		
	}
	
	 function patient_state_get($id)
	 {
	 	
	 }
	 
	 function patient_state_put($id)
	 {
	 	
		
	 }
	
}	