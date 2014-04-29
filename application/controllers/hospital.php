<?php

class Hospital extends CI_Controller {

	public function index()
	{
		$data['main_content'] = 'welcome_page';
		$this->load->view('includes/template',$data);
	}
}
