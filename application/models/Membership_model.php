<?php

class Membership_model extends CI_Model {

	function validate()
	{
			
		$this->db->where('username',$_POST['username']);
		$this->db->where('password', $_POST['password']);
		$query = $this->db->get('data');
	
		if($query->num_rows == 1)
		{
			
			return true;
		}
		else
		{
		return false;
		}
		
	}
	function generate_xml()
	{
		$this->db->where('username',$_POST['username']);
		$this->db->where('password', $_POST['password']);
		$query = $this->db->get('data');
		$selected_radio = $_POST['ID'];

			if ($selected_radio == 'Patient') 
			{		
				if($query->num_rows == 1)
		{
			
			$name=$_POST['username'];
			//$query = $this->db->get('data');
			foreach($query->result() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}	
			}
			else 
				{		
					
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