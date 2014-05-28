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
		$data['title'] = 'Request a medicine';	
		$data['bar1'] = "Log In";
		$data['linkbar1'] ="/login";
		$data['main_content'] = 'addMed';
		$this->load->view('includes/template',$data);
	}
	public function addOrder()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('patientName','Patient Name','trim|required|callback_find_patientName');
		$this->form_validation->set_rules('medicineName','Medicine Name','trim|required|callback_find_medicineName['.$this->input->post("caliber").']');		
		if($this->form_validation->run()==FALSE)
		{
			$this->newOrder();	
		}
		else
		{
			$this->load->model('pharmacy_model');
			$this->load->model('medicine_model');

			$patientId =$this->pharmacy_model->findPatient($this->input->post('patientName')) ;
			$medicineId =$this->medicine_model->findMedicine($this->input->post('medicineName'),$this->input->post('caliber'));					
			$data = array(
				'patientID' => $patientId,
				'doctorID' => $this->uri->segment(3),
				'medicineID' => $medicineId,
				'dose' => $this->input->post('dose'),
				'details' => $this->input->post('details')	
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
	public function find_patientName($patientname)
	{
		$this->load->model('pharmacy_model');
		if($this->pharmacy_model->findPatient($patientname))
			return TRUE;
		else {
			$this->form_validation->set_message('find_patientName', 'The %s field does not exist yet, check you write correctness');
			return FALSE;
		}
	}
	public function find_medicineName($medicinename,$caliber)
	{
		$this->load->model('medicine_model');
		if($this->medicine_model->findMedicine($medicinename,$caliber))
			return TRUE;
		else {		
			$this->form_validation->set_message('find_medicineName', 'The %s field does not exist yet, check you write correctness');
			return FALSE;
		}
	}
	public function newMed(){
		$data['main_content'] = 'newMed';
		$data['title'] = "New Medicine";
		$this->load->view('includes/template',$data);
	}
	public function updateMed(){
		$data['main_content'] = 'updateMed';
		$data['title'] = "Enter Medicines Order";
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
		
		$this->load->model('medicine_model');
		if($med_id = $this->medicine_model->findMedicine($this->input->post('MedicineName'),$this->input->post('caliber'))){
			$this->medicine_model->updateQuantity($med_id,
			$this->input->post('quantity')
			);
		}
		else
		{
			$med = array(
				'tradeName' => $this->input->post('MedicineName') ,
				'scientificName' => $this->input->post('scientificName') ,
				'quantity' =>  $this->input->post('quantity'),
				'med_group' => $this->input->post('group'),
				'caliber' => $this->input->post('caliber'),
				'price' => $this->input->post('price'),
				'unit_per_packing' => $this->input->post('upp'),
				'packing_per_unitpacking' => $this->input->post('pppu'),
				'manufacturerName' => $this->input->post('provider')
			);

			$this->medicine_model->addMedicine($med);
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
		$data['title'] = "Orders";

		$this->load->view('includes/template',$data);
	}
	public function confirmOrder($value){
		//TODO adding the med to the patient bill
		$this->load->model('pharmacy_model');
		$this->pharmacy_model->deleteOrder($value);		
		redirect('Pharmacy/listOrder/0');	
	}
	public function rejectOrder($value){
		//TODO telling the doctor that his order has rejected
		$this->load->model('pharmacy_model');
		$this->pharmacy_model->deleteOrder($value);
		redirect('Pharmacy/listOrder/');	
	}		
}
