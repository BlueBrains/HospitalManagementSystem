<?php
require(APPPATH.'libraries/rest_controller.php');
class doctor extends REST_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group("doctors"))
		{
			redirect('auth/login');
		}	
		else{
			$this->load->model('patient_model');
			$this->load->model('medicine_model');
			$this->load->model('pharmacy_model');
			$this->load->model('radiograph_model');
			$this->load->model('doctor_model');			
			$this->load->model('supervisor_model');						
		}		

	}
	function homepage_get()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$user_groups = $this->ion_auth->get_users_groups()->result();
		//$dep_id= $user_groups[0]->profile_id;
		$dep_id= $this->ion_auth->user()->row()->profile_id;
		$this->load->model('doctor_model');
		$data['records']=$this->doctor_model->get_patients($dep_id);
				
		$bar[0]=" fa-desktop ,Home Page,doctor/homepage,True";
		$data['side'] = $bar;
		
		$sub[0]="fa-qrcode ,Creat Request,#,False";
		$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order,False";
		$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req,False";			
		$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request,False";

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
		$data['user'] = $this->ion_auth->user()->row();
		$id=$this->get('id');
		$this->load->model('doctor_model');
		$data['records']=$this->doctor_model->get_patient($id);
		$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},TRUE";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";

			$sub_menue[0] = $sub;
			
			$sub[0]="fa-qrcode ,Edit analyse Request,#,False";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},False";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$sub[0]="fa-qrcode ,Edit Medicin Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[3] = $sub;
			
			
			$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
			$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$id},false";
			$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$id},FALSE";
			$sub_menue[3] = $sub;			
			
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
		//$patient_id=$id;
		$data['user'] = $this->ion_auth->user()->row();
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->finish_order_list_patient($patient_id);
		$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$patient_id},false";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$patient_id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$patient_id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
			$sub_menue[0] = $sub;
			
			$sub[0]="fa-qrcode ,Edit analyse Request,#,True";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$patient_id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$patient_id},False";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$patient_id},True";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$patient_id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$patient_id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$patient_id},FALSE";
			$sub_menue[2] = $sub;
			
			$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
			$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$patient_id},false";
			$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$patient_id},FALSE";
			$sub_menue[3] = $sub;			
			
			$data['sub_menue']=$sub_menue;
			
			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['title']='finish analyse request';
			$data['section'] = 'doctor';	
			$data['patient']="true";
		$this->load->view('includes/template',$data);
	}
	
	function total_analyse_request_get()
	{$data['user'] = $this->ion_auth->user()->row();
		$patient_id=$this->get('id');
		$this->load->model('analyse_model');		
		$data['records']=$this->analyse_model->total_order_list_patient($patient_id);
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
		$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$patient_id},false";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$patient_id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";

			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,true";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$patient_id},TRUE";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$patient_id},False";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$patient_id},FALSE";
			$sub_menue[1] = $sub;
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
			$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$patient_id},false";
			$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$patient_id},FALSE";
			$sub_menue[3] = $sub;			
			
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
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
		$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$patient_id},false";
		$data['side'] = $bar;
		$data['user'] = $this->ion_auth->user()->row();
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$patient_id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$patient_id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$patient_id},False";
			
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,True";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$patient_id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$patient_id},TRUE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$patient_id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$patient_id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$patient_id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$patient_id},FALSE";

			$sub_menue[2] = $sub;
			
			$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
			$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$patient_id},false";
			$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$patient_id},FALSE";
			$sub_menue[3] = $sub;			
			
			$data['sub_menue']=$sub_menue;

			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['title']='finished analyse request';
			$data['section'] = 'doctor';	
			
		$this->load->view('includes/template',$data);
	}
	
	function new_analyse_request_post()
	{
		 //$doctor_id=$_SESSION['user_id'];
		 $doctor_id= $this->ion_auth->user()->row()->profile_id;
		 $this->load->model('analyse_model');
         $this->analyse_model->create_request($doctor_id);
		 redirect(base_url()."doctor/total_analyse_request/id/".$_POST['patient_id']);
		  
		  //تحميل صفحة التملاية مرة اخرى
	}
	
	function Fill_order_patient_get()
	{
		$this->load->model('doctor_model');
			$id=$this->get('id');
			$data['patient']=$this->doctor_model->get_patient_name($id);
			$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},false";
			$data['side'] = $bar;
		$data['user'] = $this->ion_auth->user()->row();
			$sub[0]="fa-qrcode ,Creat Request,#,TRUE";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},TRUE";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";

			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,false";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
			$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$id},false";
			$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$id},FALSE";
			$sub_menue[3] = $sub;			
			
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
			$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$data['side'] = $bar;
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order,False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req,False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request,False";
			$data['user'] = $this->ion_auth->user()->row();
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
		$id = $this->get('id');
		 $data['record'] = $this->radiograph_model->fetch_req($id);
		$data['main_content'] = 'radiograph/radiograph_order_list_view';
	
		if($this->response->format == 'html'){
			$data['user'] = $this->ion_auth->user()->row();
			$data['patient']=$this->doctor_model->get_patient_name($id);
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},false";
			$data['side'] = $bar;
		
			$sub[0]="fa-qrcode ,Creat Request,#,TRUE";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},TRUE";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,false";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;
		$data['user'] = $this->ion_auth->user()->row();
       
		$data['main_content'] = 'radiograph/radiograph_order_list_view';	
		$data['title']='Home Page';
		$data['section'] = 'doctor';		
			$this->load->view('includes/template',$data);	
			
		}
		else 
			$this->response($request,200);
	}



	function radiograph_internal_request_sign_get()
	{
		$id = $this->input->get('patient_id');
		$data['record'] = $this->radiograph_model->create_req($id);	
		
			
$data['patient']=$this->doctor_model->get_patient_name($id);
			$bar[0]="fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},false";
			$data['side'] = $bar;
		$data['user'] = $this->ion_auth->user()->row();
			$sub[0]="fa-qrcode ,Creat Request,#,TRUE";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},TRUE";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,false";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;
					
         $data['record'] = $this->radiograph_model->fetch_req($id);
		$data['main_content'] = 'radiograph/radiograph_order_list_view';	
		$data['title']='Home Page';
		$data['section'] = 'doctor';		
			$this->load->view('includes/template',$data);	
		
	}
	

	#################################pharmacy Requsets###############################
	public function new_med_request_get() 
	{
			$id = $this->get('id');
			if($this->get())
			$data['patient']=$this->doctor_model->get_patient_name($id);			
			$data['user'] = $this->ion_auth->user()->row();		
			$data['records'] = $this->medicine_model->getAllMed();
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},TRUE";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order,False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
			$sub_menue[0] = $sub;
			$data['user'] = $this->ion_auth->user()->row();
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
			
			$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
			$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$id},false";
			$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$id},FALSE";					
			$sub_menue[3] = $sub;			
			
			$data['sub_menue']=$sub_menue;
		
		$data['title'] = 'Request a medicine';	
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
			$id =$this->patient_model->find_by_name($this->input->post('patientName')) ;
			$medicineId =$this->medicine_model->findMedicine($this->input->post('medicineName'),$this->input->post('caliber'));					
			$data = array(
				'patient_id' => $id,
				'doctor_id' => $this->ion_auth->user()->row()->profile_id,
				'medicine_id' => $medicineId,
				'dose' => $this->input->post('dose'),
				'state' => '0',
				'details' => $this->input->post('details')	
				);
			if($query = $this->pharmacy_model->addOrder($data))
				{
					$data['user'] = $this->ion_auth->user()->row();		
					$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
					$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},TRUE";
					$data['side'] = $bar;
					
					$sub[0]="fa-qrcode ,Creat Request,#,False";
					$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{id},False";
					$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order,False";
					$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
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
					
					$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
					$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$id},false";
					$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$id},FALSE";					
					$sub_menue[3] = $sub;			
					$data['user'] = $this->ion_auth->user()->row();
					$data['sub_menue']=$sub_menue;					
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
		
		$sql=$this->doctor_model->get_doctor_info($this->ion_auth->user()->row()->profile_id);
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		$id=$this->get('id');
		if (isset($id) && $id >0)
		{$data['user'] = $this->ion_auth->user()->row();
		
			$data['patient']=$this->doctor_model->get_patient_name($id);
			$bar[0]="fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},false";
			$data['side'] = $bar;
		
			$sub[0]="fa-qrcode ,Creat Request,#,TRUE";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},TRUE";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,false";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;
			

			$data['name']=$raw->fname." ".$raw->lname;
			$data['dep']=$raw->name;			
			$data['main_content'] = 'radiograph/doctor_rad_request';	
			$data['title']='Home Page';
			$data['section'] = 'doctor';
			
			$this->load->view('includes/template',$data);	

		}
		else{
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$data['side'] = $bar;
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order,False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req,False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request,False";
			$sub_menue[0] = $sub;
			$data['sub_menue']=$sub_menue;
$data['user'] = $this->ion_auth->user()->row();
			$data['name']=$raw->fname." ".$raw->lname;
			$data['dep']=$raw->name;		
			$data['main_content'] = 'radiograph/doctor_rad_request';	
			$data['title']='Home Page';
			$data['section'] = 'doctor';			
			$this->load->view('includes/template',$data);	
			
		}


		}
	/*
	function doctor_create_req_get()
		{
		//if (isset($_SESSION['user_id'])){
		$sql=$this->doctor_model->get_doctor_info(1/*$_SESSION['user_id']);
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		
		if (isset($data))
		{	
			
			$data['name']=$raw->fname." ".$raw->lname;
			$data['dep']=$raw->name;			
			$data['main_content'] = 'radiograph/doctor_rad_request';	
						$this->loadview_get($data,$id);

		}
		//}
		}*/
	function confirmed_radiology_request_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-2);
		$sql=$this->doctor_model->get_doctor_info(1/*$_SESSION['user_id']*/);
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		
		if (isset($data))
		{	$id=$this->get('id');
			$bar[0]="fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},false";
			$data['side'] = $bar;
		$data['user'] = $this->ion_auth->user()->row();
			$sub[0]="fa-qrcode ,Creat Request,#,TRUE";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},TRUE";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,false";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;
			
			$data['section'] = 'doctor';			
			$data['name']=$raw->fname." ".$raw->lname;
			$data['dep']=$raw->name;			
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			//$data['id'] = $this->get('id');	
			$this->load->view('includes/template',$data);

		}
	}	

function finished_radiology_request_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-1);
		$sql=$this->doctor_model->get_doctor_info(1/*$_SESSION['user_id']*/);
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		
		if (isset($data))
		
		{
			$data['user'] = $this->ion_auth->user()->row();
			$id=$this->get('id');
			$bar[0]="fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},false";
			$data['side'] = $bar;
		
			$sub[0]="fa-qrcode ,Creat Request,#,TRUE";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},TRUE";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,false";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;
			
			$data['section'] = 'doctor';			
			$data['name']=$raw->fname." ".$raw->lname;
			$data['dep']=$raw->name;			
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			//$data['id'] = $this->get('id');	
			$this->load->view('includes/template',$data);

		}
	}	
function show_result_get()
	{
		$data['record']=$this->radiograph_model->show_image($this->get('id'));
		$sql=$this->doctor_model->get_doctor_info(1/*$_SESSION['user_id']*/);
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		
		if (isset($data))
		{	$id=$this->get('id');
			$bar[0]="fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},false";
			$data['side'] = $bar;
		$data['user'] = $this->ion_auth->user()->row();
			$sub[0]="fa-qrcode ,Creat Request,#,TRUE";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},TRUE";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/doctor_req/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
			$sub_menue[0] = $sub;
			$sub[0]="fa-qrcode ,Edit analyse Request,#,false";
			$sub[1]="fa-desktop ,ALL Analyse Requests,doctor/total_analyse_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_analyse_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finish_analyse_request/id/{$id},FALSE";
			$sub_menue[1] = $sub;
			
			$sub[0]="fa-qrcode ,Edit radiology Request,#,false";
			$sub[1]="fa-desktop ,ALL Radiology Requests,doctor/total_radiograph_request/id/{$id},false";
			$sub[2]="fa-desktop ,Un Uploded Request,doctor/confirmed_radiology_request/id/{$id},FALSE";
			$sub[3]="fa-desktop ,Implemented Request,doctor/finished_radiology_request/id/{$id},FALSE";
			$sub_menue[2] = $sub;
			
			$data['sub_menue']=$sub_menue;
			
			$data['section'] = 'doctor';			
			$data['name']=$raw->fname." ".$raw->lname;
			$data['dep']=$raw->name;			
			$data['main_content'] = 'radiograph/show_result';
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
	public function medorder_list_get(){
		
		$id=$this->get('id');		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url()."doctor/medorder_list";
		$config['per_page'] = 20;
		$config['total_rows'] = 200; //should be reaplaced
	
		$config['per_page'] = 100;
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
		$doctor_id = $this->ion_auth->user()->row()->profile_id;
		$results = $this->pharmacy_model->getDoctorOrders($config["per_page"], $page, $doctor_id, $id);			

		if($this->response->format == 'html'){		
		$data["results"] = $results;
		$data["links"] = $this->pagination->create_links();
		
			$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},TRUE";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
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
			
			$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
			$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$id},false";
			$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$id},FALSE";
			$sub_menue[3] = $sub;			
			
			$data['sub_menue']=$sub_menue;

		$data['section'] = 'doctor';		
		$data['main_content'] = 'doctor/medorder_list_view';
		$data['title'] = "Requests";
		$this->load->view('includes/template',$data);
		}
		else {
			$this->response($results,200);
		}
	}	
	public function total_medorder_list_get(){
		
		$id=$this->get('id');		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url()."doctor/total_medorder_list";
		$config['per_page'] = 20;
		$config['total_rows'] = 200; //should be reaplaced
	
		$config['per_page'] = 100;
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
		
		$doctor_id = $this->ion_auth->user()->row()->profile_id;
		$results = $this->pharmacy_model->getAllDoctorOrders($config["per_page"], $page, $doctor_id, $id);
		
		if($this->response->format == 'html'){		
		$data["results"] = $results;
		$data["links"] = $this->pagination->create_links();
		$data['main_content'] = 'doctor/medorder_list_view';
		$data['title'] = "medicines requests";
		$data['user'] = $this->ion_auth->user()->row();
		
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},TRUE";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
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
			
			$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
			$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$id},false";
			$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$id},FALSE";
			$sub_menue[3] = $sub;			
			
			$data['sub_menue']=$sub_menue;
			
		$data['section'] = 'doctor';		
		$this->load->view('includes/template',$data);
		}
		else {
			$this->response($results,200);
		}
	}
	public function finish_request_get(){
		$value = $this->get('id');
		$this->pharmacy_model->finishOrder($value);		
		redirect('doctor/homepage');	
	}

	public function detail_request_get()
	{
		$value = $this->get('id');		
		if($q = $this->pharmacy_model->detailOrder($value)){
			$id = $q[0]->patient_id;	
			$data['user'] = $this->ion_auth->user()->row();		
			$bar[0]=" fa-desktop ,Home Page,doctor/homepage,false";
			$bar[1]=" fa-desktop ,Patient information,doctor/patient_info/id/{$id},TRUE";
			$data['side'] = $bar;
			
			$sub[0]="fa-qrcode ,Creat Request,#,False";
			$sub[1]="fa-qrcode ,Creat Analyse Request,doctor/Fill_order_patient/id/{$id},False";
			$sub[2]="fa-qrcode ,Creat Photography Request,doctor/Fill_order/id/{$id},False";
			$sub[3]="fa-qrcode ,Creat Medicine Request,doctor/new_med_request/id/{$id},False";
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
			
			$sub[0]="fa-qrcode ,Edit medicine Request,#,false";
			$sub[1]="fa-desktop ,ALL medicine Requests,doctor/total_medorder_list/id/{$id},false";
			$sub[2]="fa-desktop ,Un finished Requests,doctor/medorder_list/id/{$id},FALSE";
			$sub_menue[3] = $sub;			
			
			$data['sub_menue']=$sub_menue;			
			$data['main_content'] = 'doctor/detail_medrequest_view';
			$data['title'] = "Details";
			$data['result'] = $q[0];			
			$this->load->view('includes/template',$data);
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
	################################### end auto_complete_functions BLOCK #########################################	

	function v_get()
	{
		$data['main_content']='doctor/patient_info_view';
		$data['title']='Patient Profile';
		$this->load->view('includes/template',$data);
	}

	function doc_call_nurse_get()
	{
		$this->supervisor_model->create_doctonu();
		$this->homepage_get();
	}
	function all_doc_call_nurse_post()
	{
		$data['record']=$this->supervisor_model->all_doctonu();
	}	
	
	function doc_call_sup_post()
	{
		$data['record']=$this->supervisor_model->creat_doctosup();
	}
	
	function visit_get()
	{
		$data['record']=$this->doctor_model->creat_visit($this->get('idd'));
		$this->homepage_get();
	}
}

?>