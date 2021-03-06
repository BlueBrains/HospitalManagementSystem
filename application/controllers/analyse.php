<?php
require(APPPATH.'libraries/rest_controller.php');
class analyse extends REST_Controller
{
		
	function __construct() {
		parent::__construct();
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group("analysis"))
		{
			redirect('auth/login');
		}	
		else{
			$this->load->model('analyse_model');
		}
	}
		function  homepage_get ()
	{
	//	$info = $this->radiograph_model->radiograph_supervisor_info($this->session->userdata('id'));
		
	//		$data['nam']=$info->firstName." ".$info->lastName;
			//$data['main_content'] = 'radiograph/radiograph_index';
			$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,False";
			
			$data['main_content'] = 'radiograph/test';	
			$data['title'] = 'Home Page';	
			$data['section'] = 'analyse';	
			$data['side'] = $bar;
			$data['idd']="2";
			$this->load->view('includes/template',$data);
			//$this->load->view('radiograph/test',$data);
		
	}
	
	
	function order_list_get ()
	{
		
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->order_list();
		$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,True";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';
			$data['title']='Un Confirmed Order';
			$data['section'] = 'analyse';
		$this->load->view('includes/template',$data);
	}
	
	function confirmed_order_list_get()
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->confirmed_order_list();
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,false";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,True";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['title']='confirmed Order';
			$data['section'] = 'analyse';	
		$this->load->view('includes/template',$data);
	}
	
	function finished_order_list_get()
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->finished_order_list();
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,false";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,True";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';	
					$data['title']='Finished Order';
			$data['section'] = 'analyse';	
		$this->load->view('includes/template',$data);
	}
	
	function total_order_list_get()
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->total_order_list();
		$data['user'] = $this->ion_auth->user()->row();
		 $bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';	
					$data['title']='Total Order';
			$data['section'] = 'analyse';	
		$this->load->view('includes/template',$data);
	}
	function confirm_request_get()
	{
		$id=$this->get('id');
		$this->load->model('analyse_model');
		$this->analyse_model->confirm_request($id);
		echo "done done";
		$this->total_order_list_get();
	}
	function confirm_request_all_get()
	{
		$this->load->model('analyse_model');
		$this->analyse_model->confirm_request_all();
		$this->total_order_list_get();
	}
	/**
	//this function for doctor to edit all analyses which finished for specified patient :)
	function finish_request_get($patient_id)
	{
		$this->load->model('analyse_model');
		$this->analyse_model->finish_order_list_patient($patient_id);
	}**/
	
	function upload_result_post()
	{
		$this->load->model('analyse_model');
		$this->analyse_model->upload_result();
		$this->homepage_get();
		
	}
	
	function upload_get()
	{
		$request_id=$this->get('id');
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->upload($request_id);
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,false";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/upload_view';	
			$data['title']='Upload Page';
			$data['section'] = 'analyse';	
		
		$this->load->view('includes/template',$data);
	}
	
	function upload_outer_get()
	{
		$request_id=$this->get('id');
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->upload_external($request_id);
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,false";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/upload_view';	
			$data['title']='Upload Page';
			$data['section'] = 'analyse';	
		
		$this->load->view('includes/template',$data);
	}
	
/**
// this function for doctor to create request 
	function new_request_post($doctor_id,$patient_id)
	{
		 $this->load->model('analyse_model');
          $this->analyse_model->create_request($doctor_id,$patient_id);
		  //تحميل صفحة التملاية مرة اخرى
	}**/
	
	function edit_analyse_get()
	{
		$request_id=$this->get('id');
	    $this->load->model('analyse_model');
	    $data['records']=$this->analyse_model->edit_Analyse($request_id);
	    $this->load->view("analyse/edit_result",$data);
	}
	
	function out_order_list_get()
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->out_order_list();
		$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order List,analyse/out_order_list,True";
			$bar[5]=" fa-edit ,Out Order Manege,analyse/out_order,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['title'] = 'Out Order List';	
			$data['section'] = 'analyse';	
			$data['outer']="true";
		$this->load->view('includes/template',$data);
	}
	
	function out_order_get()
	{
		$this->load->model('analyse_model');
         $data['records']=$this->analyse_model->get_analyses();
         $data['records2']=$this->analyse_model->get_catagoury();
		 $data['user'] = $this->ion_auth->user()->row();
		 $bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order List,analyse/out_order_list,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/creat_request_view';	
			$data['title'] = 'Out Order';	
			$data['section'] = 'analyse';	
		$this->load->view('includes/template',$data);
	}
	
	function new_analyse_request_post()
	{
		 $this->load->model('analyse_model');
         $this->analyse_model->create_request();
		 $this->out_order_list_get();
		  //تحميل صفحة التملاية مرة اخرى
	}
}
?>