<?php 
require(APPPATH.'libraries/rest_controller.php');
 
class supervisor extends REST_Controller{
	function __construct()
	{
		parent::__construct();
		
		
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group("admin"))
		{
			redirect('auth/login');
		}	
		else{
		$this->load->model('supervisor_model');
		}
	}
	function homepage_get ()
	{
		$data['user'] = $this->ion_auth->user()->row();
			$data['record'] = $this->supervisor_model->p_i_h();			
			$data['main_content'] = 'supervisor/sv_view';	
			$data['section'] = 'SuperVisor';	
			//$data['side'] = $bar;
			$this->load->view('includes/template',$data);
	}
	
	function doc_call_nurse_post()
	{
		$this->supervisor_model->create_doctonu();
	}
	function all_doc_call_nurse_post()
	{
		$data['record']=$this->supervisor_model->all_doctonu();
	}	
	// function caller_1_post()
	// {
		// $this->supervisor_model->create_call($this->input->post("p_id"),2);
	// }
// 	
	// function caller_sv_post()
	// {
		// $this->supervisor_model->create_call_super();
	// }
// 	
	// function caller_post()
	// {
		// $data['user'] = $this->ion_auth->user()->row();
		// $this->supervisor_model->create_call('null',$this->input->post('caller'));
		// if( $this->input->post('caller')==1)
			// $this->add_p_t_d_post();
			// $data['main_content'] = 'supervisor/sv_view';	
			// $data['section'] = 'SuperVisor';	
			// //$data['side'] = $bar;
			// $this->load->view('includes/template',$data);
	// }
// 	
	// function add_p_t_d_post()
	// {
		// $data['user'] = $this->ion_auth->user()->row();
			// $this->supervisor_model->add_mypatient();
			// $data['main_content'] = 'supervisor/sv_view';	
			// $data['section'] = 'SuperVisor';	
			// //$data['side'] = $bar;
			// $this->load->view('includes/template',$data);
	// }
	
}	
