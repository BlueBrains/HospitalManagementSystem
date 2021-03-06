<?php 

require(APPPATH.'libraries/rest_controller.php');
/**
 * 
 */
class Pharmacy_supervisor extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group("pharmacy"))
		{
			redirect('auth/login');
		}	
		else{
			$this->load->model('pharmacy_model');
			$this->load->model('medicine_model');
		}
	}
	
	public function homepage_get()
	{
		$data['user'] = $this->ion_auth->user()->row();		
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';
		$data['title'] = 'homepage| pharmacy';		
		$data['main_content'] = 'pharmacy/homepage_view';
		$this->load->view('includes/template',$data);
	}
	
	public function order_list_get(){		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url()."pharmacy_supervisor/order_list";
		$config['per_page'] = 20;
		$config['total_rows'] = 200; //should be reaplaced
	
		$config['per_page'] = 100;
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
		
		$results = $this->pharmacy_model->getOrders($config["per_page"], $page);			

		if($this->response->format == 'html'){		
		$data["results"] = $results;
		$data["links"] = $this->pagination->create_links();
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';		
		$data['main_content'] = 'pharmacy/order_list_view';
		$data['title'] = "Orders";
		$this->load->view('includes/template',$data);
		}
		else {
			$this->response(json_encode($results),200);
		}
	}

	public function total_order_list_get(){		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url()."pharmacy_supervisor/total_order_list";
		$config['per_page'] = 20;
		$config['total_rows'] = 200; //should be reaplaced
	
		$config['per_page'] = 100;
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
		
		$results = $this->pharmacy_model->getAllOrders($config["per_page"], $page);
		
		if($this->response->format == 'html'){		
		$data["results"] = $results;
		$data["links"] = $this->pagination->create_links();
		$data['main_content'] = 'pharmacy/order_list_view';
		$data['user'] = $this->ion_auth->user()->row();
		$data['title'] = "Orders";
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';		
		$this->load->view('includes/template',$data);
		}
		else {
			$this->response($results,200);
		}
	}

	public function confirm_request_get(){
		$data['id'] = $this->get('id');		
		$data['main_content'] = 'pharmacy/send_task_view';
		$data['user'] = $this->ion_auth->user()->row();
		$data['title'] = "Send Task";
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';		
		$this->load->view('includes/template',$data);			
	}
	public function confirm_request_post(){
		$this->load->model('nurse_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Nurse Name','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$this->confirm_requset_get();	
		}				
		$nurse_id = $this->nurse_model->find_by_name($this->input->post('name'));
		$this->medicine_model->assignTask($this->input->post('id'),$nurse_id);
		$this->pharmacy_model->confirmOrder($this->input->post('id'));		
		redirect('pharmacy_supervisor/order_list/0');	
	}

	public function finish_request_get(){
		$value = $this->get('id');
		$this->pharmacy_model->finishOrder($value);		
		redirect('pharmacy_supervisor/order_list/0');	
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
	public function sale_medicine_get()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';		
		$data['main_content'] = 'pharmacy/sale_med_view';
		$data['title'] = "External Request";
		$this->load->view('includes/template',$data);		
	}
	public function sale_medicine_post()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('MedicineName','Medicine Name','trim|required');
		$this->form_validation->set_rules('CustomerName','Customer Name','trim|required');
		$this->form_validation->set_rules('caliber','caliber','trim|required');
		$this->form_validation->set_rules('quantity','Quantity','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$this->sale_medicine_get();	
		}
		$id = $this->medicine_model->findMedicine($this->input->post('MedicineName'),$this->input->post('caliber'));
		$med = array(
			'medicine_id' => $id ,			
			'customerName' => $this->input->post('CustomerName') ,
			'quantity' =>  $this->input->post('quantity'),
		);		
		$this->medicine_model->saleMed($med);
		redirect('pharmacy_supervisor/saled_med');		
	}

	public function enter_medicine_get()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';		
		$data['main_content'] = 'pharmacy/enter_med_view';
		$data['title'] = "Enter Medicine";
		$this->load->view('includes/template',$data);			
	}
	public function enter_medicine_post()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('MedicineName','Medicine Name','trim|required');
		$this->form_validation->set_rules('caliber','caliber','trim|required');
		$this->form_validation->set_rules('group','Group','trim|required');
		$this->form_validation->set_rules('quantity','Quantity','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$this->enter_medicine_get();	
		}			
		if($med_id = $this->medicine_model->findMedicine($this->input->post('MedicineName'),$this->input->post('caliber'))){
			$this->medicine_model->updateQuantity($med_id,
			$this->input->post('quantity')
			);
		}
		else
		{
			$med = array(
				'tradeName' => $this->input->post('MedicineName') ,
				'scientificName' => $this->input->post('scientificName') ,
				'quantity' =>  $this->input->post('quantity'),
				'med_group' => $this->input->post('group'),
				'caliber' => $this->input->post('caliber'),
				'price' => $this->input->post('price'),
				'unit_per_packing' => $this->input->post('upp'),
				'packing_per_unitpacking' => $this->input->post('pppu'),
				'manufacturerName' => $this->input->post('provider')
			);

			$this->medicine_model->addMedicine($med);
			redirect('pharmacy_supervisor/all_med');
		}
		
	}
	public function all_med_get()
	{		
		$data['records'] = $this->medicine_model->getAllMed();
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';		
		$data['main_content'] = 'pharmacy/all_med_view';
		$data['title'] = "All Medicine";
		$this->load->view('includes/template',$data);		
	}
	
	public function saled_med_get()
	{
		$data['records'] = $this->medicine_model->getSaledMed();
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';		
		$data['main_content'] = 'pharmacy/saled_med_view';
		$data['title'] = "Saled Medicines";
		$this->load->view('includes/template',$data);		
	}
			
	public function update_medquan_get()
	{
		$data['id'] = $this->get('id');
		$data['user'] = $this->ion_auth->user()->row();		
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';		
		$data['main_content'] = 'pharmacy/update_medquan_view';
		$data['title'] = "Insert Medicine";
		$this->load->view('includes/template',$data);			
	}
	
	public function update_medquan_post()
	{		
		$this->medicine_model->updateQuantity($this->input->post('quantity'),$this->input->post('id'));
		redirect('pharmacy_supervisor/all_med');			
	}
	
	public function update_medicine_get()
	{
		$data['result'] = $this->medicine_model->getMed($this->get('id'));
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';				
		$data['main_content'] = 'pharmacy/update_med_view';
		$data['title'] = "Update Medicine";
		$this->load->view('includes/template',$data);			
	}
		
	public function update_medicine_post()
	{
		$med = array(
			'tradeName' => $this->input->post('MedicineName') ,
			'scientificName' => $this->input->post('scientificName') ,
			'quantity' =>  $this->input->post('quantity'),
			'med_group' => $this->input->post('group'),
			'caliber' => $this->input->post('caliber'),
			'price' => $this->input->post('price'),
			'unit_per_packing' => $this->input->post('upp'),
			'packing_per_unitpacking' => $this->input->post('pppu'),
			'manufacturerName' => $this->input->post('provider')
		);		
		$this->medicine_model->updateMed($this->input->post('id'),$med);
		redirect('pharmacy_supervisor/all_med');			
	}
	
	public function medicine_insertion_get()
	{
		$id = $this->get('id');
		$data['id'] = $id;
		$data['records'] = $this->medicine_model->getMedInsertion($id);
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';				
		$data['main_content'] = 'pharmacy/med_insert_view';
		$data['title'] = "Medicine Insertion";
		$this->load->view('includes/template',$data);			
	}
		
	public function medicine_orders_get()
	{
		$data['records'] = $this->medicine_model->getOrders();
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';				
		$data['main_content'] = 'pharmacy/med_orders_view';
		$data['title'] = "Medicine Insertion";
		$this->load->view('includes/template',$data);			
	}	
	public function order_entry_get()
	{
		$data['records'] = $this->medicine_model->getAllMed();
		$data['user'] = $this->ion_auth->user()->row();
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;
		$data['section'] = 'pharmacy';				
		$data['main_content'] = 'pharmacy/order_entry_view';
		$data['title'] = "Order Entry";
		$this->load->view('includes/template',$data);			
	}	
	public function order_entry_post()
	{
		$name = $this->input->post('medicineName');
		$quantity = $this->input->post('quantity');
		$caliber = $this->input->post('caliber');
		$this->db->insert('pharmacy_order',array('num'=>sizeof($name)));
		$order_id = $this->db->insert_id();
		foreach ($quantity as $key => $value) {
			$id = $this->medicine_model->findMedicine($name[$key],$caliber[$key]);
			$this->medicine_model->updateQuantity($quantity[$key],$id,$order_id);			
		}
		$this->medicine_orders_get();		
	}	
	
	public function get_nurses_get()
	{
		$this->load->model('nurse_model');
		if ( $this->input->get('term')){
			$q = strtolower($this->input->get('term'));
			$this->nurse_model->terms($q,'1');
		}
	}	

}

