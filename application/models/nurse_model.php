<?php
class Nurse_model extends CI_Model{
	//read operations

	public function find_by_name($name){
		$result = explode(" ",$name);
		if(isset($result[1])){
			$data = $this->db->get_where('nurses',array('fname'=>$result[0],'lname'=>$result[1]))->result();
		}
		else {
			$data = $this->db->get_where('nurses',array('fname'=>$result[0]))->result();
		}
		if($data){
		return $data[0]->id;
		}
	}

	function terms($q,$id){
    	$this->db->select('CONCAT(fname, " " , lname) As name , id',FALSE);
		$this->db->from('nurses');
		// $this->db->where('department_id',$id);
    	$this->db->like('fname', $q);
    	$query = $this->db->get();
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
	
	public function get_name($id){
		$this->db->select('fname,lname');
		$res = $this->db->get_where('nurses',array(
			'id'=>$id))->result();
		$res = $res[0];			
		return $res->fname." ".$res->lname;
	}
	
	public function names(){
		$this->db->select('id,fname,lname');
		return $this->db->get('nurses')->result();
	}
	// create operations

	public function create($data){
		$this->db->insert_batch('nurses', $data); 
	}
	//update operations

	public function update($id,$data){
		$this->db->update('nurses', $data, array('id' => $id));
	}
	//delete operations

	public function delete($id){
		$this->db->delete('nurses', array('id' => $id));
	}
	//functionalty
	public function getAllTaskes($id)
	{
		$this->db->select('patient_id ,doctors.fname dfname, doctors.lname dlname,patients.fname pfname ,patients.lname plname,tradeName,medicine_request.caliber,dose,medicine_request.date offerdate')
		->from('medicine_request')
		->join('medicines', 'medicine_request.medicine_id = medicines.id','inner')
		->join('doctors', 'medicine_request.doctor_id = doctors.id','inner')
		->join('patients', 'medicine_request.patient_id = patients.id','inner')
		->join('nurses', 'medicine_request.nurse_id = nurses.id','inner')
		->where('nurse_id',$id)
		->where('state','1');
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}	
	}
	
	public function getAllCalls($id)
	{
		$this->db->select('doctonur_calls.id, sender_id, reciever_id, w_r_b, doctors.fname dfname, doctors.lname dlname, callDate, checked')
		->from('doctonur_calls')
		->join('doctors', 'sender_id = doctors.id','inner')
		->where('reciever_id',$id);
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}				
	}

	public function getYourCalls($id)
	{
		$this->db->select('nurtodoc_calls.id, sender_id, reciever_id, w_r_b, doctors.fname dfname, doctors.lname dlname, callDate, checked')
		->from('nurtodoc_calls')
		->join('doctors', 'reciever_id = doctors.id','inner')
		->where('sender_id',$id);
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}				
	}
	public function seen($id)
	{
		$this->db->update('doctonur_calls',array('checked' => 1));
	}

			
}