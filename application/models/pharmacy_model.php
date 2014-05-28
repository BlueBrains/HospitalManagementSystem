<?php	

/**
 * 
 */
class Pharmacy_model extends CI_Model {
	
	public function findPatient($value)
	{
		$this->db->select('id');
		$this->db->from('patients');
		$this->db->where('name', $value);
		if($q = $this->db->get()){			
			$data = $q->result();		
			return $data[0]->id;		
		}			
	}	
	public function deleteOrder($value)
	{		
		$this->db->where('id',$value);
		$this->db->delete('order_medicine');					
	}
	public function addOrder($data)
	{
		return $this->db->insert('order_medicine',$data);
	}
	
	public function getOrders($limit,$start){		
		$this->db->select('order_medicine.id,medicines.tradeName,medicines.caliber,medicines.quantity,doctors.firstName,doctors.lastName,patients.firstName pfirstName,patients.lastName plastName');   		
		$this->db->from('order_medicine');
		$this->db->join('medicines', 'order_medicine.medicineID = medicines.id','inner');		
		$this->db->join('doctors', 'order_medicine.doctorID = doctors.id','inner');
		$this->db->join('patients', 'order_medicine.patientID = patients.id','inner');
		$this->db->limit($limit, $start);						
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}

	}
	
}
