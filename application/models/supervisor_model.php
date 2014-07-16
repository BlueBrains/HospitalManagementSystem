<?php 
class supervisor_model extends CI_Model {
	function create_call($val='null',$l)
	{
		if ($val=='null'){
		$pieces = explode(" ", $this->input->post('stuff_name'));
		//$sql=$this->db->query("SELECT * FROM users  where  fname ='".$pieces[0] ."' and lname ='".$pieces[1] ."'");
		if ($l==1)
		$sql=$this->db->query("SELECT * FROM doctors  where  fname ='".$pieces[0] ."' and lname ='".$pieces[1] ."'");
		else {
			$sql=$this->db->query("SELECT * FROM nurses where  fname ='".$pieces[0] ."' and lname ='".$pieces[1] ."'");
		}
		foreach ($sql->result() as $raw ) {
                	
                $stuff_id=$raw->id;
            }
		$new_member = array(
		
				'sender_id' => $this->ion_auth->user()->row()->profile_id,
				'reciever_id' => $stuff_id,
				'w_r_b' => $this->input->post('w').','.$this->input->post('r').','.$this->input->post('b'),
			);
		}
		else 
		{
			$pieces = explode(" ", $this->input->post('stuff_name'));	
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  where entries.checkout = '0' and entries.id_patient='".$val."'");
			foreach ($sql->result() as $raw ) {
                	
                $w=$raw->ward;
				$r=$raw->room;
				$b=$raw->bed;
            }
            $sql=$this->db->query("SELECT * FROM nurses where  fname ='".$pieces[0] ."' and lname ='".$pieces[1] ."'");
			foreach ($sql->result() as $raw ) {
                	
             	$rec=$raw->id;
            }
		$new_member = array(		
				'sender_id' => $this->ion_auth->user()->row()->profile_id,
				'reciever_id' => $rec,
				'w_r_b' => $w.','.$r.','.$b
			);
		}		
		$insert = $this->db->insert('calls', $new_member);
		
	}
	
	
	function create_call_super()
	{
		$sql=$this->db->query("SELECT * FROM users_groups  where  group_id ='".$this->input->post('section')."'");
		foreach ($sql->result() as $raw ) {
                	
                $rec_id=$raw->user_id;
            }
			$new_member = array(
				'sender_id' => $this->ion_auth->user()->row()->profile_id,
				'reciever_id' =>$rec_id ,
			);
		$insert = $this->db->insert('calls', $new_member);
	}
	
	
	function p_i_h()
	{
		$u=$this->ion_auth->get_users_groups()->result();
		$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  where entries.checkout = '0' and dep_id='".$u[0]->id."'");
		//$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  where entries.checkout = '0'");
			foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		if ($sql->num_rows >= 1)
           { return $data;}
		else {
			$f=0;	
			return $f;
		}
	}
	function add_mypatient()
	{
		$pieces = explode(" ", $this->input->post('stuff_name'));
		$sql=$this->db->query("SELECT * FROM doctors  where  fname ='".$pieces[0] ."' and lname ='".$pieces[1] ."'");
		foreach ($sql->result() as $raw ) {
                	
                $doctor_id=$raw->id;
            }
	
		
		$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  where entries.checkout = '0' and entries.ward ='".$this->input->post('w')."' and entries.room ='".$this->input->post('r')."' and entries.bed ='".$this->input->post('b')."'");
			foreach ($sql->result() as $raw ) {
                	
                $patient_id=$raw->id_patient;
            }
		if (isset($patient_id) && isset($doctor_id)){
		$new_member = array(
				'doctor_id' => $doctor_id,
				'patient_id' => $patient_id,
			);
		$insert = $this->db->insert('my_patients', $new_member);
		return TRUE;
			}
		else 
			return FALSE;
	}  
}

