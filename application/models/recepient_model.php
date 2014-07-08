<?php
  
class recepient_model extends CI_Model {
		function p_i_h()
		{
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  where entries.date_out = '0000-00-00 00:00:00'");
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
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  ");
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
			$sql=$this->db->query("SELECT date_in, date_out , ward , room , state , patient_id , doctors.fname as Dfname , doctors.lname as Dlname , patients.fname , patients.lname FROM entries INNER JOIN patients ON entries.id_patient = patients.id  INNER JOIN visit ON entries.id_patient = visit.patient_id  INNER JOIN doctors ON doctors.id = visit.doctor_id WHERE visit.patient_id='".$id."' and entries.date_out = '0000-00-00 00:00:00'");
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
			
		$sql="UPDATE entries SET  date_out = now() WHERE id='".$id."' and date_out !='0000-00-00 00:00:00'";
			$result=$this->db->query($sql)or die (mysql_error ());
        	return true;
		}
		
		function s_v($id)
		{
			
		 $now=getdate();
        $nowDate=$now['year']."-".$now['mon']."-".$now['mday'];
		$sql="UPDATE entries SET  date_out".$nowDate." WHERE id='".$id."'";
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
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  where entries.date_out != '0000-00-00 00:00:00' and entries.id_patient='".$id."'");
		if ($sql->num_rows >= 1)
           { return TRUE;}
		else {
				
			return FALSE;
		}
		}

}

	  