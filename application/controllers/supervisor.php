<?php 
require(APPPATH.'libraries/rest_controller.php');
 
class supervisor extends REST_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('supervisor_model');
		
		
		// if (!isset($this->session->userdata('tag') || $this->session->userdata('tag') != "radiograph_supervisor")
		// {
			// echo "You dont have permission to start this action";
		// }
// 	
	}
	function homepage_get ()
	{
			$data['record'] = $this->supervisor_model->p_i_h();			
			$data['main_content'] = 'supervisor/sv_view';	
			$data['section'] = 'SuperVisor';	
			//$data['side'] = $bar;
			$this->load->view('includes/template',$data);
	}
	
	function caller_post()
	{
		$this->supervisor_model->create_call();
		if( $this->input->post('caller')==1)
		$this->add_p_t_d_post();
			$data['main_content'] = 'supervisor/sv_view';	
			$data['section'] = 'SuperVisor';	
			//$data['side'] = $bar;
			$this->load->view('includes/template',$data);
	}
	
	function add_p_t_d_post()
	{
			$this->supervisor_model->add_mypatient();
			$data['main_content'] = 'supervisor/sv_view';	
			$data['section'] = 'SuperVisor';	
			//$data['side'] = $bar;
			$this->load->view('includes/template',$data);
	}
	
}	
