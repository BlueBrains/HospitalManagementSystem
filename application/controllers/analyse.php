<?php
require(APPPATH.'libraries/rest_controller.php');
class analyse extends REST_Controller
{
	function homepage_get()
	{
		$id=$_SESSION['user_id'];
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->get_info($id);
	}
	
	function order_list_get ()
	{
		
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->order_list();
			$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Seen Request,analyse/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,True";
			$bar[3]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[4]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['section'] = 'analyse';	
		$this->load->view('includes/template',$data);
	}
	
	function confirmed_order_list_get()
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->confirmed_order_list();
		
		$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,false";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,True";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['section'] = 'analyse';	
		$this->load->view('includes/template',$data);
	}
	
	function finished_order_list_get()
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->finished_order_list();
		$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,false";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,True";
			$bar[4]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['section'] = 'analyse';	
		$this->load->view('includes/template',$data);
	}
	
	function total_order_list_get()
	{
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->total_order_list();
		 $bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';	
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
	}
	
	function upload_get()
	{
		$request_id=$this->get('id');
		$this->load->model('analyse_model');
		$data['records']=$this->analyse_model->upload($request_id);
		$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,false";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/upload_view';	
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
			$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order List,analyse/out_order_list,True";
			$bar[5]=" fa-edit ,Out Order Manege,analyse/out_order,False";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/analyses_order_list';	
			$data['section'] = 'analyse';	
		$this->load->view('includes/template',$data);
	}
	
	function out_order_get()
	{
		$this->load->model('analyse_model');
         $data['records']=$this->analyse_model->get_analyses();
         $data['records2']=$this->analyse_model->get_catagoury();
		 $bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order List,analyse/out_order_list,false";
			$data['side'] = $bar;
			$data['main_content'] = 'analyse/create_out_request_view';	
			$data['section'] = 'analyse';	
		$this->load->view('includes/template',$data);
	}
	
	function new_analyse_request_post()
	{
		 $this->load->model('analyse_model');
         $this->analyse_model->create_request();
		  //تحميل صفحة التملاية مرة اخرى
	}
}
?>