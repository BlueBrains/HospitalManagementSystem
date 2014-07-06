<?php
require(APPPATH.'libraries/pusher.php');
class testPusher extends CI_Controller{
	function t(){
		$p = new CI_Pusher();
		$p->trigger('channel1','event1','hello world');
	}

	function c(){
		$this->load->view('pusher.html');
	}
}