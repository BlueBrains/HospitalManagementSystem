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

	public function listOrder(){
		$this->load->model('pharmacy_model');
		$this->load->library('pagination');
		
		$config['base_url'] = base_url()."pharmacy/listOrder";
		$config['per_page'] = 20;
		$config['total_rows'] = 200; //should be reaplaced

		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["results"] = $this->pharmacy_model->getOrders($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['main_content'] = 'list_orders';

		$this->load->view('includes/template',$data);
	}
	
}
