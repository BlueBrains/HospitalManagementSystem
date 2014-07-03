<?php
class analyse extends CI_Controller
{
    function information()
     {
          $this->load->model('analyse_model');
          $v=1;
          $data['records']=$this->analyse_model->get_information($v);
          $this->load->view("information.php",$data);
     }
     function Fill_order_anlayze()
     {
         $this->load->model('analyse_model');
         $data['records']=$this->analyse_model->get_analyses();
         $data['records2']=$this->analyse_model->get_catagoury();
         $this->load->view("fetch_request",$data);
     }
     function createRequest($patient_id)
     {
         $this->load->model('analyse_model');
          $this->analyse_model->createRequest();
          $this->Fill_order_anlayze();
     }
	 
     function saveAnalyse($request_id)
     {
         $this->load->model('analyse_model');
         $request_id=1;
        $this->analyse_model->uploadAnalyse($request_id);
     }
     
     function uploadAnalyse()
     {
          $this->load->model('analyse_model');
         $data['records']=$this->analyse_model->get_result_analyses();
         $data['records2']=$this->analyse_model->get_catagoury();
        $this->load->view("uploadAnalyse",$data);
     }
     
     function Analyses($patient_id)
    {
        $this->load->model('analyse_model');
        $patient_id=1;
        $data['records']=$this->analyse_model->edit_Analyses($patient_id);
        $this->load->view('edit_analyses',$data);
    }
    function Analyse($request_id)
	{
	    $this->load->model('analyse_model');
	    $data['records']=$this->analyse_model->edit_Analyse($request_id);
	    $this->load->view("edit_Analyse",$data);
	}
    function get_number_notification()
    {
        $this->load->model('analyse_model');
         $data['num_not']=$this->analyse_model->get_number_notification();
        $this->load->view('notification_number', $data);
    }
	function get_notification()
    {
        $this->load->model('analyse_model');
        $data['records']=$this->analyse_model->get_notification();
        $this->load->view('notification', $data);
        
    }
}


?>