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
	
	function get_doctor_info($id)
	{
		
		$sql=$this->db->query("SELECT * FROM doctors INNER JOIN department ON doctors.department_id = department.id WHERE doctors.id = '".$id."'");
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
	
	public function find_by_name($name){
		$result = explode(" ",$name);
		if(isset($result[1])){
			$data = $this->db->get_where('doctors',array('fname'=>$result[0],'lname'=>$result[1]))->result();
		}
		else {
			$data = $this->db->get_where('doctors',array('fname'=>$result[0]))->result();
		}
		if($data){
		return $data[0]->id;
		}
	}	
	
	function terms($q){
    	$this->db->select('CONCAT(fname, " " , lname) As name , id',FALSE);
    	$this->db->like('fname', $q);
    	$query = $this->db->get('doctors');
    	if($query->num_rows > 0){
      		foreach ($query->result_array() as $row){
      			$new_row['label']=htmlentities(stripslashes($row['name']));
				$new_row['value']=htmlentities(stripslashes($row['name']));
				$new_row['image']=htmlentities(stripslashes($row['id']));
        		$row_set[] = $new_row;
      		}
      		echo json_encode($row_set); //format the array into json data
    	}
  	}	

	
}

?>