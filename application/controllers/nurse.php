<?php 
require(APPPATH.'libraries/rest_controller.php');
require(APPPATH.'libraries/CI_Pusher.php');
class nurse extends REST_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		// if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group("pharmacy_supervisor"))
		// {
			// redirect('auth/login');
		// }	
		// else{			
			$this->load->model('nurse_model');	
		// }
		
		$this->p = new CI_Pusher();
	}	
	
	function get_number_notification()
    {
        $this->load->model('nurse_model');
         $data['num_not']=$this->nurse_model->get_number_notification();
        $this->load->view('notification_number', $data);
    }
	function get_notification()
    {
        $this->load->model('nurse_model');
        $data['records']=$this->nurse_model->get_notification();
        $this->load->view('notification', $data);
        
    }
	
	public function homepage_get()
	{
		$id = $this->seeion->userdate('user_id');
		$data = $this->pharmacy_model->supervisor_info($id);
	}
	public function taskes_get()
	{
		// $data['records'] = $this->nurse_model->getAllTaskes($this->ion_auth->user()->id);
		$data['records'] = $this->nurse_model->getAllTaskes(1);			
		$bar[0]=" fa-edit ,Taskes,nurse/taskes,False";
		$bar[1]=" fa-edit ,Food Programs,nurse/foodprog,False";
		$data['side'] = $bar;
		$data['section'] = 'nurses';		
		$data['main_content'] = 'nurse/taskes_view';
		$data['title'] = "Taskes";
		$this->load->view('includes/template',$data);				
	}
	public function get_nurses_get()
	{
		if ( $this->input->get('term')){
			$q = strtolower($this->input->get('term'));
			$this->nurse_model->terms($q,'1');
		}
	}
}

?>