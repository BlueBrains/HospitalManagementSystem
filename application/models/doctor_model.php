<?php
class doctor_model extends CI_Model
{
	function get_patients($dep_id)
	{
		$q=$this->get_doctor_info($dep_id);
		
		foreach ($q->result() as $raw ) {
                $dep_id=$raw->department_id;
            }
		
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
	
	function get_doctor_info($id)
	{
		
		$sql=$this->db->query("SELECT * FROM doctors INNER JOIN department ON doctors.department_id = department.id  INNER JOIN users ON doctors.id = users.profile_id WHERE doctors.id = '".$id."'");
		if ($sql->num_rows >= 1)
           { return $sql;}
		else {
			$f=0;	
			return $f;
		}
           
	}

	function doctor_info($id)
	{
		
		$sql=$this->db->query("SELECT * FROM doctors INNER JOIN department ON doctors.department_id = department.id  INNER JOIN users ON doctors.id = users.profile_id WHERE profile_id = '".$id."'");
		if ($sql->num_rows >= 1)
           { return $sql;}
		else {
			$f=0;	
			return $f;
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
		$qq="SELECT entries.id as e_id, patients.id,CONCAT(patients.fname,' ',patients.lname)as Pname,ward,bed,room,date_in,visit.state as Lstate FROM patients 
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
	
	function creat_visit($idd)
	{
		$now=getdate();
			$nowDate=$now['year']."-".$now['mon']."-".$now['mday']." ".$now['hours'].":".$now['minutes'].":".$now['seconds'];
			
			$new_entry_insert_data = array(
			'doctor_id' => $this->ion_auth->user()->row()->profile_id,
			'patient_id' => $this->input->get('iid'),
			'entry_id'=>$idd,
			'state'=>$this->input->get('state'),
			'Temperature'=>$this->input->get('temp'),
			'pulse'=>$this->input->get('pulse'),
			'Respiration' =>$this->input->get('res'),
			'blood_pressure' => $this->input->get('blood'),	
			
			);
		$insert = $this->db->insert('visit', $new_entry_insert_data);	
		return TRUE;
	}

	
}

?>