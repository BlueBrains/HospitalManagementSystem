<?php
  
class recepient_model extends CI_Model {
		function p_i_h()
		{
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  where entries.checkout = '0'");
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
		
		function p_r()
		{
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id where checkout = 1 ");
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
	
		function p_r_d($id)
		{
			
			$sql=$this->db->query("SELECT entries.id,bed,visit_time,date_in, date_out , ward , room , state , patient_id , doctors.fname as Dfname , doctors.lname as Dlname , patients.fname , patients.lname FROM entries INNER JOIN patients ON entries.id_patient = patients.id  INNER JOIN visit ON entries.id = visit.entry_id  INNER JOIN doctors ON doctors.id = visit.doctor_id WHERE checkout = '0' and entries.id_patient='".$id."'");
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
	
		function e_v($id)
		{
			echo "string".$id;
		$sql="UPDATE entries SET  date_out = now() , checkout = 1 WHERE id_patient='".$id."' and checkout='0' ";
			$result=$this->db->query($sql)or die (mysql_error ());
        	return true;
		}
		
		function s_v($id)
		{
			
		 $now=getdate();
        $nowDate=$now['year']."-".$now['mon']."-".$now['mday'];
		$sql="UPDATE entries SET  date_out".$nowDate."  WHERE id_patient='".$id."'";
			$result=$this->db->query($sql)or die (mysql_error ());
        	return true;
		}
		
		function e_p_h($id)
		{
			$now=getdate();
			$nowDate=$now['year']."-".$now['mon']."-".$now['mday']." ".$now['hours'].":".$now['minutes'].":".$now['seconds'];
			
			$new_entry_insert_data = array(
			'id_patient' => $id,
			'date_in' => $nowDate,
			'dep_id'=>$this->input->get('section'),
			'aider'=>$this->input->get('aider_id'),
			'p_entry_state'=>$this->input->get('state_id'),
			'room'=>$this->input->get('room_id'),
			'ward' =>$this->input->get('ward_class'),
			'bed' => $this->input->get('bed_id'),	
			'doctor_name'=> $this->input->get('doctor_name'),
			'doctor_phone'=> $this->input->get('doctor_phone'),
			'diagnosis'=> $this->input->get('comment')
			);
		$insert = $this->db->insert('entries', $new_entry_insert_data);	
		return TRUE;
		}
		
		function g_p($id)
		{
			$sql=$this->db->query("SELECT * FROM  patients where id ='".$id."'");
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
		
		function findEntry($id)
		{
			//echo "string".$id;
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  where entries.checkout = '0' and entries.id_patient='".$id."'");
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		if ($sql->num_rows >= 1)
           { return $data;}
		else {
				
			return FALSE;
		}
		}

}

	  