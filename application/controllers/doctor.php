<?php
require(APPPATH.'libraries/rest_controller.php');
class doctor extends REST_Controller
{
	function finish_analyse_request_get($patient_id)
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->finish_order_list_patient($patient_id);
		$this->load->view('analyse/finish_order_patient_view',$data);
	}
	function total_analyse_request_get($patient_id)
	{
		$this->load->model('analyse_model');
		$this->analyse_model->total_order_list_patient($patient_id);
		$this->load->view('analyse/finish_order_patient_view',$data);
	}
	function new_analyse_request_post($doctor_id,$patient_id)
	{
		 $this->load->model('analyse_model');
          $this->analyse_model->create_request($doctor_id,$patient_id);
		  //تحميل صفحة التملاية مرة اخرى
	}
}
?>