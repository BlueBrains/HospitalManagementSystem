<?php
require(APPPATH.'libraries/rest_controller.php');
class doctor extends REST_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('radiograph_model');
		$this->load->model('doctor_model');
		// if (!$this->ion_auth->logged_in())
		// {
			// redirect('auth/login');
		// }	
		// else{
			// $this->load->model('patient_model');
		// }
		$this->load->model('patient_model');
		$this->load->model('medicine_model');
		$this->load->model('pharmacy_model');
	}
	function homepage_get()
	{
		//$doctor_id=$_SESSION['user_id'];
		//$dep_id=$_SESSION['dep_id'];
		$dep_id=1;
		$this->load->model('doctor_model');
		$data['records']=$this->doctor_model->get_patients($dep_id);
		$bar[0]=" fa-desktop ,Home Page,doctor/homepage,True";
		$data['side'] = $bar;
		
		$sub[0]="fa-qrcode ,Creat Request,#,False";
		$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order,False";
		$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order,False";			
		$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/Fill_order,False";
		$sub_menue[0] = $sub;
			
		$data['sub_menue']=$sub_menue;
		
		$data['main_content'] = 'doctor/home_page_view';	
		$data['title']='Home Page';			
		$data['section'] = 'doctor';	
		$data['patient']='false';
		$this->load->view('includes/template',$data);
	}

	function patient_info_get()
	{
		$id=$this->get('id');
		$this->load->model('doctor_model');
		$data['records']=$this->doctor_model->get_patient($id);
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},TRUE";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order,False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/Fill_order,False";
			$sub_menue[0] = $sub;
			
			$sub[0]="fa-qrcode ,Edit analyse Request,#,False";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},False";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;
			$data['main_content'] = 'doctor/patient_info_view';	
			$data['title']='Patient info';
			$data['section'] = 'doctor';	
			$data['patient']="true";
		$this->load->view('includes/template',$data);
	}
	function finish_analyse_request_get()
	{
		$patient_id=$this->get('id');
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->finish_order_list_patient($patient_id);
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$patient_id},false";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$patient_id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order,False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/Fill_order,False";
			$sub_menue[0] = $sub;
			
			$sub[0]="fa-qrcode ,Edit analyse Request,#,True";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$patient_id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$patient_id},False";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$patient_id},True";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;
			
			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['title']='finish analyse request';
			$data['section'] = 'doctor';	
			$data['patient']="true";
		$this->load->view('includes/template',$data);
	}
	
	function total_analyse_request_get()
	{
		$patient_id=$this->get('id');
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->total_order_list_patient($patient_id);
		$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
		$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$patient_id},false";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$patient_id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order,False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/Fill_order,False";
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,true";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$patient_id},TRUE";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$patient_id},False";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$patient_id},FALSE";
			$sub_menue[1] = $sub;
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;

			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['title']='total analyse request';
			$data['section'] = 'doctor';	
		$this->load->view('includes/template',$data);
		
	}

	function confirmed_analyse_request_get()
	{
		$patient_id=$this->get('id');
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->confirmed_order_list_patient($patient_id);
		$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
		$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$patient_id},false";
		$data['side'] = $bar;
		
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$patient_id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order,False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/Fill_order,False";
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,True";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$patient_id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$patient_id},TRUE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$patient_id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;

			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['title']='finished analyse request';
			$data['section'] = 'doctor';	
			
		$this->load->view('includes/template',$data);
	}
	
	function new_analyse_request_post()
	{
		 //$doctor_id=$_SESSION['user_id'];
		 $doctor_id=1;
		 $this->load->model('analyse_model');
         $this->analyse_model->create_request($doctor_id);
		  
		  //تحميل صفحة التملاية مرة اخرى
	}
	function Fill_order_patient_get()
	{
		$this->load->model('doctor_model');
			$id=$this->get('id');
			$data['patient']=$this->doctor_model->get_patient_name($id);
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},false";
			$data['side'] = $bar;
		
			$sub[0]="fa-qrcode ,Creat Request,#,TRUE";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},TRUE";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order,False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/Fill_order,False";
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,false";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;
			$this->load->model('analyse_model');
         $data['records']=$this->analyse_model->get_analyses();
         $data['records2']=$this->analyse_model->get_catagoury();
		$data['main_content'] = 'analyse/creat_request_view';	
		$data['title']='Home Page';
		$data['section'] = 'doctor';	
		$this->load->view('includes/template',$data);
	}

	function Fill_order_get()
	{
		
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$data['side'] = $bar;
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order,False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order,False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/Fill_order,False";
			$sub_menue[0] = $sub;
			$data['sub_menue']=$sub_menue;
		$this->load->model('analyse_model');
         $data['records']=$this->analyse_model->get_analyses();
         $data['records2']=$this->analyse_model->get_catagoury();
		 $dep_id=1;
		$data['main_content'] = 'analyse/creat_request_view';	
		$data['title']='Home Page';
		$data['section'] = 'doctor';	
		$this->load->view('includes/template',$data);
         //$this->load->view("analyse/creat_request_view",$data);
	}



	function total_radiograph_request_get()
	{
		//$patient_id=$this->get('id');
		$request = $this->radiograph_model->fetch_req($this->get('id'));
	
		if($this->response->format == 'html'){
			$data['request'] = $request;
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);	
		}
		else 
			$this->response($request,200);
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
				'state' => '0',
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

	function doctor_req_get()
		{
		$sql=$this->doctor_model->get_doctor_info($_SESSION['user_id']);
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		
		if (isset($data))
		{	
			$data['side'] = $bar;
			$data['name']=$raw->fname." ".$raw->lname;
			$data['dep']=$raw->name;			
			$data['main_content'] = 'radiograph/doctor_rad_request';	
			//$data['id'] = $this->get('id');	
			$this->load->view('includes/template',$data);

		}
		}
	

	public function find_patientName_get($patientname)
	{	
		if($this->patient_model->find_by_name($patientname))
			return TRUE;
		else {
			$this->form_validation->set_message('find_patientName_get', 'The %s field does not exist yet, check you write correctness');
			return FALSE;
		}
	}
	public function find_medicineName_get($medicinename,$caliber)
	{	
		if($this->medicine_model->findMedicine($medicinename,$caliber))
			return TRUE;
		else {		
			$this->form_validation->set_message('find_medicineName_get', 'The %s field does not exist yet, check you write correctness');
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
	function patient_details_get(){
		//TODO tell Eyad to add this fun
		$id = $this->input->get('id');					
		$data['patient'] = $this->patient_model->patient_details($id);
		$data['main_content']='patient/patient_details_view';
		$data['title']='Patient Profile';
		$this->load->view('includes/template',$data);
	}
	################################### end auto_complete_functions BLOCK #########################################	

}
?>