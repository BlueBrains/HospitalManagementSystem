<?php 
require(APPPATH.'libraries/rest_controller.php');
require(APPPATH.'libraries/CI_Pusher.php');
class nurse extends REST_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group("nurses"))
		{
			redirect('auth/login');
		}	
		else{			
			$this->load->model('nurse_model');
			$this->load->model('doctor_model');	
		}
		
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
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-edit ,Taskes,nurse/taskes,False";
		$bar[1]=" fa-edit ,Food Programs,nurse/foodprog,False";
		$bar[2]=" fa-edit ,call doctor,nurse/call_doctor,False";
		$bar[3]=" fa-edit ,my calls,nurse/yourcalls,False";		
		$data['side'] = $bar;
		$data['section'] = 'nurses';		
		$data['main_content'] = 'nurse/homepage_view';
		$data['title'] = "homepage| nurse";
		$this->load->view('includes/template',$data);
	}
	public function taskes_get()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['records'] = $this->nurse_model->getAllTaskes($this->ion_auth->user()->row()->profile_id);;			
		$bar[0]=" fa-edit ,Taskes,nurse/taskes,False";
		$bar[1]=" fa-edit ,Food Programs,nurse/foodprog,False";
		$bar[2]=" fa-edit ,call doctor,nurse/call_doctor,False";
		$bar[3]=" fa-edit ,my calls,nurse/yourcalls,False";
		$data['side'] = $bar;
		$data['section'] = 'nurses';		
		$data['main_content'] = 'nurse/taskes_view';
		$data['title'] = "Taskes";
		$this->load->view('includes/template',$data);				
	}

	public function call_doctor_get()
	{
		$data['user'] = $this->ion_auth->user()->row();				
		$bar[0]=" fa-edit ,Taskes,nurse/taskes,False";
		$bar[1]=" fa-edit ,calls,nurse/calls,False";
		$bar[2]=" fa-edit ,call doctor,nurse/call_doctor,False";
		$bar[3]=" fa-edit ,my calls,nurse/yourcalls,False";
		$data['side'] = $bar;
		$data['section'] = 'nurses';		
		$data['main_content'] = 'nurse/calldoc_view';
		$data['title'] = "Taskes";
		$this->load->view('includes/template',$data);				
	}
	
	public function call_doctor_post()
	{
		$data = array(
			'sender_id' =>  $this->ion_auth->user()->row()->profile_id,
			'reciever_id' => $this->doctor_model->find_by_name($this->input->post('DoctorName')),
			'w_r_b' => $this->input->post('w_r_b')
		);				
		$this->db->insert('nurtodoc_calls',$data);
		redirect('nurse/yourcalls');
	}

	public function calls_get()
	{
		$data['user'] = $this->ion_auth->user()->row();	
		$data['records'] = $this->nurse_model->getAllCalls($this->ion_auth->user()->row()->profile_id);			
		$bar[0]=" fa-edit ,Taskes,nurse/taskes,False";
		$bar[1]=" fa-edit ,calls,nurse/calls,False";
		$bar[2]=" fa-edit ,call doctor,nurse/call_doctor,False";
		$bar[3]=" fa-edit ,my calls,nurse/yourcalls,False";
		$data['side'] = $bar;
		$data['section'] = 'nurses';		
		$data['main_content'] = 'nurse/calls_view';
		$data['title'] = "Call Requests";
		$this->load->view('includes/template',$data);				
	}

	public function yourcalls_get()
	{
		$data['user'] = $this->ion_auth->user()->row();	
		$data['records'] = $this->nurse_model->getYourCalls($this->ion_auth->user()->row()->profile_id);			
		$bar[0]=" fa-edit ,Taskes,nurse/taskes,False";
		$bar[1]=" fa-edit ,calls,nurse/calls,False";
		$bar[2]=" fa-edit ,call doctor,nurse/call_doctor,False";
		$bar[3]=" fa-edit ,my calls,nurse/yourcalls,False";
		$data['side'] = $bar;
		$data['section'] = 'nurses';		
		$data['main_content'] = 'nurse/mycalls_view';
		$data['title'] = "My Calls";
		$this->load->view('includes/template',$data);				
	}		
	
	public function seen_get()
	{
		$id = $this->get('id');
		$this->nurse_model->seen($id);
		redirect('nurse/calls');
	}
		
	function get_doctors_get(){		   
    	if ( $this->input->get('term')  ){
     		$q = strtolower($this->input->get('term'));
      		$this->doctor_model->terms($q);
    	}
 	 }
	
}

?>