<?php
require(APPPATH.'libraries/rest_controller.php');
 
class radiograph_supervisor extends REST_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group("radiograph"))
		{
			redirect('auth/login');
		}	
		else{
			$this->load->model('radiograph_model');
			$this->load->model('doctor_model');
		}
	}
	
	function  homepage_get ()
	{
	//	$info = $this->radiograph_model->radiograph_supervisor_info($this->session->userdata('id'));
		
	//		$data['nam']=$info->firstName." ".$info->lastName;
			//$data['main_content'] = 'radiograph/radiograph_index';
			$data['user'] = $this->ion_auth->user()->row();		
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			
			$data['main_content'] = 'radiograph/test';	
			$data['section'] = 'radiograph';	
			$data['side'] = $bar;
				$data['title'] = 'radiograph';
			$data['idd']="2";
			$this->load->view('includes/template',$data);
			//$this->load->view('radiograph/test',$data);
		
	}
	
	function total_order_list_get ()
	{
		$data['record'] = $this->radiograph_model->fetch_req(0);
			$data['user'] = $this->ion_auth->user()->row();
		    $bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';
			$data['title'] = 'radiograph';	
			$this->load->view('includes/template',$data);
	}
	
	function order_list_implemented_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-1);
			$data['user'] = $this->ion_auth->user()->row();
		    $bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,True";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['title'] = 'radiograph';
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';
			$data['side'] = $bar;	
			$this->load->view('includes/template',$data);
	}
	
	function order_list_get()
	{
		$data['record'] = $this->radiograph_model->fetch_req(-2);
			$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,True";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';
			$data['title'] = 'radiograph';	
			$this->load->view('includes/template',$data);
		
	}
	
	function radiograph_external_request_done_get ()
	{
		$data['user'] = $this->ion_auth->user()->row();
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
			$data['title'] = 'radiograph';	
			$this->load->view('includes/template',$data);
		$data['title'] = 'radiograph';
	}
	 
	function un_seen_get()
	{
		$data['user'] = $this->ion_auth->user()->row();
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
			$data['title'] = 'radiograph';	
			$this->load->view('includes/template',$data);
	} 	
	
	function radiograph_external_request_get()
	{
			$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,True";
			$data['side'] = $bar;
			$data['main_content'] = 'radiograph/radiograph_external_request_view';	
			$data['section'] = 'radiograph';	
			$data['title'] = 'radiograph';
			$this->load->view('includes/template',$data);	
	}
	
	function radiograph_external_request_sign_get()
	{
		
		$data['record'] = $this->radiograph_model->create_req(-1);	
		$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';
			$data['title'] = 'radiograph';	
			$this->load->view('includes/template',$data);	
		
	}
	
	
	
	
	function radiograph_request_sign_get()
	{
		
		$data['record'] = $this->radiograph_model->create_req($this->get('patient_id'));	
		$data['user'] = $this->ion_auth->user()->row();
			// $bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,True";
			// $bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			// $bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			// $bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			// $bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			// $bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			// $data['side'] = $bar;			
			// $data['main_content'] = 'radiograph/radiograph_order_list_view';	
			// $data['section'] = 'radiograph';	
			// $this->load->view('includes/template',$data);	
		
	}
	
	function u_get(){
		$request = $this->radiograph_model->fetch_req($this->get('id'));
		if($this->response->format == 'html'){
			$data['request'] = $request;
			$data['main_content']='radiograph/test';
			$data['title'] = 'radiograph';
			$data['user'] = $this->ion_auth->user()->row();
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
		$data['user'] = $this->ion_auth->user()->row();
			$data['record'] = $this->radiograph_model->fetch_req(0);
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['title'] = 'radiograph';
			$data['main_content'] = 'radiograph/upload_form';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);		
	}
	
	function upload_image_post()
	{
		if ($this->radiograph_model->upload_image($this->post('id')))
		{
			$data['user'] = $this->ion_auth->user()->row();	
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,True";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['title'] = 'radiograph';
			$data['main_content'] = 'radiograph/radiograph_order_list_view';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);

		}
		else
			{
				$data['user'] = $this->ion_auth->user()->row();
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['title'] = 'radiograph';
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
			$data['user'] = $this->ion_auth->user()->row();	
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;			
			$data['title'] = 'radiograph';
			$data['main_content'] = 'radiograph/show_result';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);

		}
		
		
	}

	function doctor_req()
		{
		$sql=$this->doctor_model->get_doctor_info($this->get('id'));
		
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		
		if (isset($data))
		{
			$data['user'] = $this->ion_auth->user()->row();	
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";
			$data['side'] = $bar;
			$data['name']=$raw->fname." ".$raw->lname;
			$data['dep']=$raw->name;		
			$data['title'] = 'radiograph';	
			$data['main_content'] = 'radiograph/show_result';	
			$data['section'] = 'radiograph';	
			$this->load->view('includes/template',$data);

		}
		}
	function add_request_comment_get()
	{
			$this->radiograph_model->update_req($this->get('id'));
			$this->total_order_list_get ();
	}	
	function delete($id)
	{
		
	}
}	