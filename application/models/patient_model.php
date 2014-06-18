<?php 

/**
 * 
 */
class Patient_model extends CI_Model {
	
	function get_patient($q){
    	$this->db->select('CONCAT(firstName, " " , lastName) As name , id',FALSE);
    	$this->db->like('firstName', $q);
    	$query = $this->db->get('patients');
    	if($query->num_rows > 0){
      		foreach ($query->result_array() as $row){
      			$new_row['label']=htmlentities(stripslashes($row['name']));
				$new_row['value']=htmlentities(stripslashes($row['name']));
				$new_row['image']=htmlentities(stripslashes($row['id']));
        		//$row_set[] = htmlentities(stripslashes($row['name'])); //build an array
        		//$row_set[] = htmlentities(stripslashes(base_url()+"/photos/patients/"+$row['id'])); //build an array
        		$row_set[] = $new_row;
      		}
      		echo json_encode($row_set); //format the array into json data
    	}
  	}
	public function patient_details($value)
	{
		$this->db->where('id', 2);
		$q = $this->db->get('patients');
		if($q->num_rows() > 0){			
			$data = $q->result();	
		}
			return $data[0];
	}	
}



