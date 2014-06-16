<?php

class Membership_model extends CI_Model {

	function validate()
	{
			
		$this->db->where('username',$_POST['username']);
		$this->db->where('password', $_POST['password']);
		
		$query = $this->db->get('membership');
		if($query->num_rows == 1)
		{			
			return $query;
		}

		else
		{
		return false;
		}
		
	}
	 	
	function create_member($x)
	{
			
		if ($x==1){
			$new_member_insert_data = array(
				'name' => $_POST['name'],
				'password' => $_POST['password'],
				'firstName' => $_POST['first_name'],
				'lastName' => $_POST['last_name'],
				'birthdate' => $_POST['birthdate'],
				'country' => $_POST['country'],
				'city' => $_POST['city'],
				'address' => $_POST['address'],
				'phone' => $_POST['phone'],
				'mobile' => $_POST['mobile'],
				'emergencyPhone1' => $_POST['emergenceyPhone1'],
				'emergencyPhone2' => $_POST['emergenceyPhone2'],
				'chronicDiseases' => $_POST['chronicDiseases'],
				'addiction' => $_POST['addication'],
				'bloodGroup' => $_POST['bloodGroup'],
				'tallness' => $_POST['tallness']						
			);
				$insert = $this->db->insert('patients', $new_member_insert_data);
				return $insert;
			
		}
		else {
				$new_member_insert_data = array(
				'name' => $_POST['name'],
				'password' => $_POST['password'],
				'firstName' => $_POST['first_name'],
				'lastName' => $_POST['last_name'],
				'emailAddress' => $_POST['email'],
				'Certificate_id' => $_POST['certificate'],
				'department_id' => $_POST['department']						
			);
				$insert = $this->db->insert('doctors', $new_member_insert_data);
				return $insert;
						
		}
					
	}
	public function findPatient($value)
	{
		$this->db->where('id', $value);
		$query = $this->db->get('patients');
		if($query->num_rows == 1)
		{			
			return true;
		}
		else 
		return false;
	}

	public function findDoctor($value)
	{
		$query=$this->db->query("SELECT * FROM doctors INNER JOIN department ON department.department_id = doctors.department_id WHERE id = '".$value."'");
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $raw ) {
                $data[]=$raw;
            	}				
			return $raw;
		}
		else 
		return false;
	}
	public function can_do($roll,$value)
	{
		$query=$this->db->query("SELECT * FROM privilege WHERE rollname = '".$roll."'");
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $raw ) {
                $data[]=$raw;
            	}			
			return $raw->$value;
		}
		else 
		return false;
	}
	function all_prev($roll)
	{
		$query=$this->db->query("SELECT * FROM privilege WHERE rollname = '".$roll."'");
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $raw ) {
                $data[]=$raw;
            	}			
			return $raw;
		}
		else 
		return false;
		
	}
}