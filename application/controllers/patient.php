<?php
require(APPPATH.'libraries/rest_controller.php');
 
class patient extends REST_Controller{
	function u_get(){
		$id = array($this->get('id'));
		if($this->response->format == 'html'){
			$data['id'] = $id;
			$this->load->view('patient/t.html',$data);
		}
		
		else 
			$this->response($id,200);
	}
}