<?php

class AndroidModel extends  CI_Model{
	
	function getAlldataFromTable($tableName){
		$data = $this->db->query("SELECT * FROM {$tableName} ;")->result();
		return $data;
	}
	
	function insertDataIntoTable($tableName,$data){
		 foreach ($data as $key => $value) {
			 $this->db->insert($tableName,$value);
		 }
			
	}
	
}
