<?php 

require(APPPATH.'libraries/rest_controller.php');
/**
 * 
 */
class Pharmacy_supervisor extends REST_Controller {
	
	function __construct() {
		if(!$this->session->userdata('tag')=="pharmacy_supervisor"){
			redirect("");
		}
		else{
			$this->load->model('pharmacy_model');
		}
	}
	
	public function homepage_get()
	{
		$id = $this->seeion->userdate('user_id');
		$data = $this->pharmacy_model->supervisor_info($id);
		$data['main_content'] = 'pharmacy_homepage';
		$this->load->view('include/template',$data);
	}
}

