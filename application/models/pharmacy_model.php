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
	
	public function addOrder($data)
	{
		return $this->db->insert('order_medicine',$data);
	}
	
	public function getOrders($limit,$start){
		$this->db->limit($limit, $start);
		if($q = $this->db->get('order_medicine')){
			$data = $q->result();
			return $data;
		}

	}
	
}
