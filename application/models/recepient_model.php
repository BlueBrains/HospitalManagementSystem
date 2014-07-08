<?php
  
class recepient_model extends CI_Model {
		function p_i_h()
		{
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  where entries.date_out = '0'");
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
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id ");
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
			$sql=$this->db->query("SELECT * FROM entries INNER JOIN patients ON entries.id_patient = patients.id  INNER JOIN visit ON entries.id_patient = visit.patient_id  INNER JOIN doctors ON doctors.id = visit.doctor_id WHERE visit.patient_id=".$id."' and entries.date_out = '0'");
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
			
		 $now=getdate();
        $nowDate=$now['year']."-".$now['mon']."-".$now['mday'];
		$sql="UPDATE entries SET  date_out".$nowDate." WHERE id='".$id."'";
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
}

	  