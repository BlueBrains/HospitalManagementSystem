<?php 
class nurse extends CI_Controller
{
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
}

?>