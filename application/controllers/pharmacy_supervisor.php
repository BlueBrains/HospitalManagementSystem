<?php 

require(APPPATH.'libraries/rest_controller.php');
/**
 * 
 */
class Pharmacy_supervisor extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}	
		else{
			$this->load->model('pharmacy_model');
		}
	}
	
	public function homepage_get()
	{
		$id = $this->seeion->userdate('user_id');
		$data = $this->pharmacy_model->supervisor_info($id);
		$data['main_content'] = 'pharmacy/homepage';
		$this->load->view('include/template',$data);
	}
	
	public function order_list_get(){		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url()."pharmacy/order_list_get";
		$config['per_page'] = 20;
		$config['total_rows'] = 200; //should be reaplaced
	
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		if(isset($this->get('type'))){
			$results = $this->pharmacy_model->getAllOrders($config["per_page"], $page);
		}
		else{
			$results = $this->pharmacy_model->getOrders($config["per_page"], $page);			
		}
		if($this->response->format == 'html'){		
		$data["results"] = $results;
		$data["links"] = $this->pagination->create_links();
		$data['main_content'] = 'pharmacy/order_list_view';
		$data['title'] = "Orders";
		$this->load->view('includes/template',$data);
		}
		else {
			$this->response($results,200);
		}
	}

	public function confirm_request_get(){
		$value = $this->get('id');
		$this->pharmacy_model->confirmOrder($value);		
		redirect('Pharmacy/order_list_get/0');	
	}

	public function detail_request_get()
	{
		$value = $this->get('id');		
		if($q = $this->pharmacy_model->detailOrder($value)){
			$data['main_content'] = 'pharmacy/detail_request_view';
			$data['title'] = "Details";
			$data['result'] = $q[0];			
			$this->load->view('includes/template',$data);
		}		
	}
	
}

