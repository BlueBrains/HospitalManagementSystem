<?php
require(APPPATH.'libraries/rest_controller.php');
 
class radiograph_supervisor extends REST_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('radiograph_model');
		// if (!isset($this->session->userdata('tag') || $this->session->userdata('tag') != "radiograph_supervisor")
		// {
			// echo "You dont have permission to start this action";
		// }
// 	
	}
	
	function  homepage_get ()
	{
	//	$info = $this->radiograph_model->radiograph_supervisor_info($this->session->userdata('id'));
		
	//		$data['nam']=$info->firstName." ".$info->lastName;
			//$data['main_content'] = 'radiograph/radiograph_index';
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			
			$data['main_content'] = 'radiograph/test';	
			$data['section'] = 'radiograph';	
			$data['side'] = $bar;
			$data['idd']="2";
			$this->load->view('includes/template',$data);
			//$this->load->view('radiograph/test',$data);
		
	}
	
	function total_order_list_get ()
	{
		$data['record'] = $this->radiograph_model->fetch_req(0);
		    $bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);
	}
	
	function order_list_implemented_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-1);
		    $bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,True";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';
			$data['side'] = $bar;	
			$this->load->view('includes/template',$data);
	}
	
	function order_list_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-2);
				    $bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,True";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);
		
	}
	
	function radiograph_external_request_done_get ()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-3);
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,True";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);
		
	}
	 
	function un_seen_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-4);
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,True";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);
	} 	
	
	function radiograph_external_request_get()
	{
			
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,True";
			$data['side'] = $bar;
			$data['main_content'] = 'radiograph/radiograph_external_request_view';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);	
	}
	
	function radiograph_external_request_sign_get()
	{
		
		$data['record'] = $this->radiograph_model->create_req(-1);	
		
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,True";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);	
		
	}
	
	function u_get(){
		$request = $this->radiograph_model->fetch_req($this->get('id'));
		if($this->response->format == 'html'){
			$data['request'] = $request;
			$data['main_content']='radiograph/test';
			
			$this->load->view('includes/template',$data);
		}
		else 
			$this->response($request,200);
	}
	
	function confirm_request_get()
	{
		$this->radiograph_model->confirm($this->get('id'));	
		
		$this->total_order_list_get();	
	
	}	
	

	function finish_request_get()
	{
		$data['req_id']=$this->get('id');

			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['main_content'] = 'radiograph/upload_form';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);		
	}
	
	function upload_image_post()
	{
		if ($this->radiograph_model->upload_image($this->post('id')))
		{	
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);

		}
		else
			{
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['main_content'] = 'radiograph/upload_form';	
			$data['section'] = 'radiograph';	
		//	$this->load->view('includes/template',$data);	
			}			
	}
	
	function show_result_get()
	{
		$data['record']=$this->radiograph_model->show_image($this->get('id'));
		if (isset($data))
		{	
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['main_content'] = 'radiograph/show_result';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);

		}
		
		
	}
	function delete($id)
	{
		
	}
}