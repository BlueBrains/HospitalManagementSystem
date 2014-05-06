<?php

class Membership_model extends CI_Model {

	function validate()
	{
			
		$this->db->where('username',$_POST['username']);
		$this->db->where('password', $_POST['password']);
		if ($_POST['ID']=='Doctor')
		$query = $this->db->get('doctors');
		else if ($_POST['ID']=='Admin')
		$query = $this->db->get('admin');
		else
		$query = $this->db->get('patients');
		if($query->num_rows == 1)
		{			
			return true;
		}

		else
		{
		return false;
		}
		
	}
	 	
	function create_member($x,$y,$z,$c,$v,$n)
	{
			
		echo "Maybe";
		$new_member_insert_data = array(
			'username' => $x,
			'password' => $y,
			'first_name' => $z,
			'last_name' => $c,
			'email_address' => $v,
			'Mobile' => $n						
		);
		
		$insert = $this->db->insert('Data', $new_member_insert_data);
		return $insert;
	}
}