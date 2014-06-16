<?php  

/**
 * 
 */
class Doctors extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('patient_model');
		$this->load->model('medicine_model');
		$this->load->model('pharmacy_model');
		//isDoctorLoggedIn();
	}
	
	// ############################################ PHARMACY BLOCK #######################################################
	public function newMedOrder() 
	{
		$data['title'] = 'Request a medicine';	
		$data['bar1'] = "Log In";
		$data['linkbar1'] ="/login";
		$data['main_content'] = 'addMed';
		$this->load->view('includes/template',$data);
	}
	
	public function addMedOrder()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('patientName','Patient Name','trim|required|callback_find_patientName');
		$this->form_validation->set_rules('medicineName','Medicine Name','trim|required|callback_find_medicineName['.$this->input->post("caliber").']');		
		if($this->form_validation->run()==FALSE)
		{
			$this->newMedOrder();	
		}
		else
		{						
			$patientId =$this->pharmacy_model->findPatient($this->input->post('patientName')) ;
			$medicineId =$this->medicine_model->findMedicine($this->input->post('medicineName'),$this->input->post('caliber'));					
			$data = array(
				'patientID' => $patientId,
				'doctorID' => 3,//$this->session->userdata('doctor_id')
				'medicineID' => $medicineId,
				'dose' => $this->input->post('dose'),
				'details' => $this->input->post('details')	
				);
			if($query = $this->pharmacy_model->addOrder($data))
				{
					$data['main_content']='registered_successfully';
					$data['title']='Registered Successfully';
					$this->load->view('includes/template',$data);				
				}
			else
				{
					$this->newMedOrder();	
				}
		}
	}

	public function find_patientName($patientname)
	{	
		if($this->pharmacy_model->findPatient($patientname))
			return TRUE;
		else {
			$this->form_validation->set_message('find_patientName', 'The %s field does not exist yet, check you write correctness');
			return FALSE;
		}
	}
	public function find_medicineName($medicinename,$caliber)
	{	
		if($this->medicine_model->findMedicine($medicinename,$caliber))
			return TRUE;
		else {		
			$this->form_validation->set_message('find_medicineName', 'The %s field does not exist yet, check you write correctness');
			return FALSE;
		}
	}
	//################################### END PHARMACY BLOCK ########################################################
	function get_patients(){    
    	if ( $this->input->get('term')  ){
     		$q = strtolower($this->input->get('term'));
      		$this->patient_model->get_patient($q);
    	}
 	 }
	function get_medicines(){    	
    	if ( $this->input->get('term')  ){
     		$q = strtolower($this->input->get('term'));
      		$this->medicine_model->get_medicine($q);
    	}
 	 }
	function patient_details($id){
		$data['patient'] = $this->patient_model->patient_details($id);
		$data['main_content']='patient_details';
		$data['title']='Patient Profile';
		$this->load->view('includes/template',$data);
	}
}

