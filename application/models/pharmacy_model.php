<?php	

/**
 * 
 */
class Pharmacy_model extends CI_Model {
	

	public function confirmOrder($value)	
	{
		$this->db->where('id',$value);
		$this->db->update('medicine_request',array('state'=>1));				
	}
	public function addOrder($data)
	{
		return $this->db->insert('medicine_request',$data);
	}
	
	public function getOrders($limit,$start){		
		$this->db->select('medicine_request.id,medicine_request.state,medicines.tradeName,medicines.caliber,medicines.quantity,doctors.firstName,doctors.lastName,patients.firstName pfirstName,patients.lastName plastName')   		
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
	public function detailOrder($value){				
		$this->db->select('order_medicine.id,order_medicine.details,medicines.tradeName,medicines.caliber,order_medicine.dose,doctors.firstName,doctors.lastName,patients.firstName pfirstName,patients.lastName plastName');   		
		$this->db->from('order_medicine');
		$this->db->join('medicines', 'order_medicine.medicineID = medicines.id','inner');		
		$this->db->join('doctors', 'order_medicine.doctorID = doctors.id','inner');
		$this->db->join('patients', 'order_medicine.patientID = patients.id','inner');
		$this->db->where('order_medicine.id',$value);
		if($q = $this->db->get()){		
			$data = $q->result();
			return $data;
		}

	}
	
}
