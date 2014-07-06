<?php
require(APPPATH.'libraries/rest_controller.php');
class doctor extends REST_Controller
{
	function __construct() {
		parent::__construct();
		// if (!$this->ion_auth->logged_in())
		// {
			// redirect('auth/login');
		// }	
		// else{
			// $this->load->model('patient_model');
		// }
		$this->load->model('patient_model');
	}
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
	#################################pharmacy Requsets###############################
	public function new_med_request_get() 
	{
		$data['title'] = 'Request a medicine';	
		$data['bar1'] = "Log In";
		$data['linkbar1'] ="/login";
		$data['main_content'] = 'pharmacy/request_view';
		$this->load->view('includes/template',$data);
	}
	public function new_med_request_post() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('patientName','Patient Name','trim|required|callback_find_patientName_get');
		$this->form_validation->set_rules('medicineName','Medicine Name','trim|required|callback_find_medicineName_get['.$this->input->post("caliber").']');		
		if($this->form_validation->run()==FALSE)
		{
			$this->new_med_request_get();	
		}
		else
		{						
			$patientId =$this->patient_model->find_by_name($this->input->post('patientName')) ;
			$medicineId =$this->medicine_model->findMedicine($this->input->post('medicineName'),$this->input->post('caliber'));					
			$data = array(
				'patient_id' => $patientId,
				'doctor_id' => 3,//$this->session->userdata('doctor_id')
				'medicine_id' => $medicineId,
				'dose' => $this->input->post('dose'),
				'details' => $this->input->post('details')	
				);
			if($query = $this->pharmacy_model->addOrder($data))
				{
					$data['main_content']='pharmacy/registered_successfully_view';
					$data['title']='Registered Successfully';
					$this->load->view('includes/template',$data);				
				}
			else
				{
					$this->new_med_request_get();	
				}
		}

	}
	public function find_patientName_get($patientname)
	{	
		if($this->patient_model->find_by_name($patientname))
			return TRUE;
		else {
			$this->form_validation->set_message('find_patientName', 'The %s field does not exist yet, check you write correctness');
			return FALSE;
		}
	}
	public function find_medicineName_get($medicinename,$caliber)
	{	
		if($this->medicine_model->findMedicine($medicinename,$caliber))
			return TRUE;
		else {		
			$this->form_validation->set_message('find_medicineName', 'The %s field does not exist yet, check you write correctness');
			return FALSE;
		}
	}
	################################### END PHARMACY BLOCK ########################################################
	
	################################### auto_complete_functions ###################################################
	function get_patients_get(){    
    	if ( $this->input->get('term')  ){
     		$q = strtolower($this->input->get('term'));
      		$this->patient_model->terms($q);
    	}
 	 }
	function get_medicines_get(){    	
    	if ( $this->input->get('term')  ){
     		$q = strtolower($this->input->get('term'));
      		$this->medicine_model->terms($q);
    	}
 	 }
	function patient_details($id){
		//TODO tell Eyad to add this fun			
		$data['patient'] = $this->patient_model->patient_details($id);
		$data['main_content']='patient/patient_details_view';
		$data['title']='Patient Profile';
		$this->load->view('includes/template',$data);
	}
	################################### end auto_complete_functions BLOCK #########################################	
}
?>