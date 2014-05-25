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
     function createRequest()
     {
         $this->load->model('analyse_model');
          $this->analyse_model->createRequest();
          $this->Fill_order_anlayze();
     }
     function saveAnalyse()
     {
         $this->load->model('analyse_model');
         $id=1;
        $this->analyse_model->uploadAnalyse($id);
     }
     
     function uploadAnalyse()
     {
          $this->load->model('analyse_model');
         $data['records']=$this->analyse_model->get_result_analyses();
         $data['records2']=$this->analyse_model->get_catagoury();
        $this->load->view("uploadAnalyse",$data);
     }
     
     function edit_Analyses($id)
    {
        $this->load->model('analyse_model');
        $id=1;
        $data['records']=$this->analyse_model->edit_Analyses($id);
        $this->load->view('edit_analyses',$data);
    }
    function edit_Analyse($id)
{
    $this->load->model('analyse_model');
    $data['records']=$this->analyse_model->edit_Analyse($id);
    $this->load->view("edit_Analyse",$data);
}
    
}


?>