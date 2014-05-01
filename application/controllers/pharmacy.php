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
			$this->load->model('medicine_model');

			if($patientId =$this->pharmacy_model->findPatient($this->input->post('patientName')) 
			&&  $medicineId =$this->Medicine_model->findMedicine($this->input->post('medicineName'))){
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

	public function newMed(){
		$data['main_content'] = 'newMed';
		$this->load->view('includes/template',$data);
	}
	public function addMed(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('MedicineName','Medicine Name','trim|required');
		$this->form_validation->set_rules('group','Group','trim|required');
		$this->form_validation->set_rules('quantity','Quantity','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$this->newMed();	
		}
		
		$this->load->model('Medicine_model');
		if($med_id = $this->Medicine_model->findMedicine($this->input->post('MedicineName'))){
			$this->Medicine_model->updateQuantity($med_id,
			$this->input->post('quantity')
			);
		}
		else
		{
			$med = array(
				'tradeName' => $this->input->post('MedicineName') ,
				'quantity' =>  $this->input->post('quantity'),
				'med_group' => $this->input->post('group'),
				'price' => $this->input->post('price'),
				'unit_per_packing' => $this->input->post('upp'),
				'packing_per_unitpacking' => $this->input->post('pppu'),
				'manufacturerName' => $this->input->post('provider')
			);

			$this->Medicine_model->addMedicine($med);
		}
	}

	public function listOrder(){
		$this->load->model('pharmacy_model');
		$this->load->library('pagination');
		
		$config['base_url'] = base_url()."pharmacy/listOrder";
		$config['per_page'] = 20;
		$config['total_rows'] = 200; //should be reaplaced

		$config['per_page'] = 2;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["results"] = $this->pharmacy_model->getOrders($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['main_content'] = 'list_orders';

		$this->load->view('includes/template',$data);
	}
	
}
