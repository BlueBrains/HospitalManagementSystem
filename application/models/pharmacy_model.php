<?php	

/**
 * 
 */
class Pharmacy_model extends CI_Model {
	

	public function confirmOrder($value)	
	{
		$this->db->where('id',$value);
		$this->db->update('medicine_request',array('state'=>'1'));				
	}
	public function finishOrder($value)	
	{
		$this->db->where('id',$value);
		$this->db->update('medicine_request',array('state'=>'2'));				
	}	
	public function addOrder($data)
	{
		return $this->db->insert('medicine_request',$data);
	}
	
	public function getOrders($limit,$start){		
		$this->db->select('medicine_request.id,medicine_request.state,medicines.tradeName,medicines.caliber,medicines.quantity,doctors.fname,doctors.lname,patients.fname pfname,patients.lname plname,date')   		
		->from('medicine_request')
		->join('medicines', 'medicine_request.medicine_id = medicines.id','inner')		
		->join('doctors', 'medicine_request.doctor_id = doctors.id','inner')
		->join('patients', 'medicine_request.patient_id = patients.id','inner')
		->where('medicine_request.state','0')
		->or_where('medicine_request.state','1')
		->limit($limit, $start);			
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}
	}
	public function getDoctorOrders($limit,$start,$id){
		$where = "(medicine_request.state='0' or medicine_request.state='1')"; 		
		$this->db->select('medicine_request.id,medicine_request.state,medicines.tradeName,medicines.caliber,medicines.quantity,doctors.fname,doctors.lname,patients.fname pfname,patients.lname plname,date')   		
		->from('medicine_request')
		->join('medicines', 'medicine_request.medicine_id = medicines.id','inner')		
		->join('doctors', 'medicine_request.doctor_id = doctors.id','inner')
		->join('patients', 'medicine_request.patient_id = patients.id','inner')
		->where($where)
		->where('medicine_request.doctor_id',$id)
		->limit($limit, $start);			
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}
	}
	public function getAllOrders($limit,$start){		
		$this->db->select('medicine_request.id,medicine_request.state,medicines.tradeName,medicines.caliber,medicines.quantity,doctors.fname,doctors.lname,patients.fname pfname,patients.lname plname,date')   		
		->from('medicine_request')
		->join('medicines', 'medicine_request.medicine_id = medicines.id','inner')		
		->join('doctors', 'medicine_request.doctor_id = doctors.id','inner')
		->join('patients', 'medicine_request.patient_id = patients.id','inner')
		->limit($limit, $start);			
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}
	}
	public function getAllDoctorOrders($limit,$start,$id){		
		$this->db->select('medicine_request.id,medicine_request.state,medicines.tradeName,medicines.caliber,medicines.quantity,doctors.fname,doctors.lname,patients.fname pfname,patients.lname plname,date')   		
		->from('medicine_request')
		->join('medicines', 'medicine_request.medicine_id = medicines.id','inner')		
		->join('doctors', 'medicine_request.doctor_id = doctors.id','inner')
		->join('patients', 'medicine_request.patient_id = patients.id','inner')
		->where('medicine_request.doctor_id',$id)
		->limit($limit, $start);					
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}

	}

	
	public function detailOrder($value){				
		$this->db->select('medicine_request.id,medicine_request.details,medicines.tradeName,medicines.caliber,medicine_request.dose,doctors.fname,doctors.lname,patients.fname pfname,patients.lname plname');   		
		$this->db->from('medicine_request');
		$this->db->join('medicines', 'medicine_request.medicine_id = medicines.id','inner');		
		$this->db->join('doctors', 'medicine_request.doctor_id = doctors.id','inner');
		$this->db->join('patients', 'medicine_request.patient_id = patients.id','inner');
		$this->db->where('medicine_request.id',$value);
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}

	}
	
}
