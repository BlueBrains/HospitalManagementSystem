<?php
class doctor_model extends CI_Model
{
	function get_patients($dep_id)
	{
		$qq="SELECT patients.id,CONCAT(patients.fname,' ',patients.lname)as Pname,room,date_in FROM patients 
		INNER JOIN entries on id_patient=patients.id
		WHERE dep_id='".$dep_id."' AND date_out='0000-00-00 00:00:00'
		";
		$q=$this->db->query($qq);
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }		
	}
	function get_patient_name($id)
	{
		$qq="SELECT patients.id,CONCAT(patients.fname,' ',patients.lname)as Pname FROM patients WHERE patients.id= ".$id;
		$q=$this->db->query($qq);
		if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }	
	}
	function get_patient($id)
	{
		$qq="SELECT patients.id,CONCAT(patients.fname,' ',patients.lname)as Pname,room,date_in,visit.state as Lstate FROM patients 
		INNER JOIN entries on id_patient=patients.id
		INNER JOIN visit on visit.patient_id=patients.id
		WHERE patients.id='".$id."'
		HAVING MAX(visit.id)
		";
		$q=$this->db->query($qq);
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }	
	}
	
}

?>