<?php
class Medicine_model extends CI_Model {
	public function findMedicine($med_name,$med_caliber)
	{
		$this->db->select('id');
		$this->db->from('medicines');
		$this->db->where('tradeName',$med_name);
		$this->db->where('caliber',$med_caliber);
		if($q = $this->db->get()){			
			$data = $q->result();
			if($data){
				return $data[0]->id;
			}			
		}			
	}

	public function addMedicine($data){
		$this->db->insert('medicines',$data);
	}

	public function getQuantity($med_name,$med_caliber){
		$this->db->select('quantity');
		$this->db->from('medicines');
		$this->db->where('tradeName',$med_name);
		$this->db->where('tradeName',$med_caliber);
		if($q = $this->db->get()){
			$data = $q->result();
			return $data[0]->quantity;
		}
	}

	public function updateQuantity($def,$id){
		$this->db->set('quantity',"quantity + ".(int)$def,FALSE);
		$this->db->where('id',$id);
		$this->db->update('medicines');
	} 
}

?>