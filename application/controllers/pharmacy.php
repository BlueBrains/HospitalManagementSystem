<?php 


/**
 * 
 */
class Pharmacy extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		//$this->isLoggedIn();
	}
	
	public function isLoggedIn()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if(!isset($isDoctorLoggedIn) || $isDoctorLoggedIn != true)
		{
			$data['main_content'] = 're-try';
			$this->load->view('includes/template',$data);
			die();			
		}
	}
	
	public function newOrder() //$patientId,$doctorId
	{
		$data['main_content'] = 'addMed';
		$this->load->view('includes/template',$data);
	}
	public function addOrder()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('patientName','Patient Name','trim|required');
		$this->form_validation->set_rules('medicineName','Medicine Name','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$this->newOrder();	
		}
		else
		{
			$this->load->model('pharmacy_model');
			
			if($patientId =$this->pharmacy_model->findPatient($this->input->post('patientName')) 
			&&  $medicineId =$this->pharmacy_model->findMedicine($this->input->post('medicineName'))){
				$data = array(
					'patientID' => $patientId,
					'doctorID' => $this->uri->segment(3),
					'medicineID' => $medicineId	
				);
				if($query = $this->pharmacy_model->addOrder($data))
				{
					$data['main_content']='registered_successfully';
					$this->load->view('includes/template',$data);				
				}
				else
				{
					$this->newOrder();	
				}
			}
		 }
	}
	
}
