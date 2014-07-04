<?php
require(APPPATH.'libraries/rest_controller.php');
class analyse extends REST_Controller
{
	function homepage_get()
	{
		$id=$_SESSION['user_id'];
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->get_info($id);
	}
	function order_list_get ()
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->order_list();
		$thus->load->view('analyse/analyses_order_list');
	}
	function total_order_list_get()
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->total_order_list();
		$thus->load->view('analyse/analyses_order_list');
	}
	function confirm_request_post($id)
	{
		$this->load->model('analyse_model');
		$this->analyse_model->confirm_request($id);
		$this->total_order_list_get();
	}
	function confirm_request_all_post()
	{
		$this->load->model('analyse_model');
		$this->analyse_model->confirm_request_all();
		$this->total_order_list_get();
	}
	/**
	//this function for doctor to edit all analyses which finished for specified patient :)
	function finish_request_get($patient_id)
	{
		$this->load->model('analyse_model');
		$this->analyse_model->finish_order_list_patient($patient_id);
	}**/
	
	function upload_result_post($request_id)
	{
		$this->load->model('analyse_model');
		$this->analyse_model->upload_result($request_id);
	}
	function upload_get($request_id)
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->upload($request_id);
		$this->load->view('analyse/upload_view',$data);
	}
/**
// this function for doctor to create request 
	function new_request_post($doctor_id,$patient_id)
	{
		 $this->load->model('analyse_model');
          $this->analyse_model->create_request($doctor_id,$patient_id);
		  //تحميل صفحة التملاية مرة اخرى
	}**/
	
	function Analyse_get($request_id)
	{
	    $this->load->model('analyse_model');
	    $data['records']=$this->analyse_model->edit_Analyse($request_id);
	    $this->load->view("edit_Analyse",$data);
	}
}
?>