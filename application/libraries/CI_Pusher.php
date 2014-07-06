<?php
require_once('Pusher.php');

class CI_Pusher {
	function __construct(){
		$app_id = '80504';
		$app_key= 'd26bc1412f47bb53c081';
		$app_secret='bb9ba63408764cb96b5e';
		$this->pusher = new Pusher($app_key,$app_secret,$app_id);
	}

	function trigger($channel,$event,$message){
		$this->pusher->trigger($channel,$event,$message);
	}
}