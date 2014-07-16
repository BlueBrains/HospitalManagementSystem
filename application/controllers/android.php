<?php

class Android extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('androidModel');
	}

	function syncData() {

		$tableName = $_POST['tableName'];
		$JSONData = $_POST['JSONData'];

		if (get_magic_quotes_gpc())
			$JSONData = stripslashes($JSONData);

		$JSONData = preg_replace('/\s+/', '', $JSONData);

		

		
		$response = json_encode($this -> androidModel -> getAlldataFromTable($tableName));
		echo $response;
		
		$data = json_decode($JSONData,TRUE);
		if($JSONData !=null)
			$this -> androidModel -> insertDataIntoTable($tableName, $data);

	}

}
