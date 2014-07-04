<?php
class Patient_model extends CI_Model{
	//read operations
	public function find($id){
		$patient = array();
		$patient['public'] = $this->get_public_info($id);
		$patient['private'] = $this->get_private_info($id);
		$patient['family'] = $this->get_family_info($id);
		$patient['health'] = $this->get_health_recored($id);

		return $patient;
	}

	public function get_public_info($id){
		return $this->db->get_where('patients', array('id' => $id),1)->result()[0];
	}

	public function get_private_info($id){
		return $this->db->get_where('patient_private_info', array('patient_id' => $id),1)->result()[0];
	}

	public function get_family_info($id){
		return $this->db->get_where('patient_family', array('patient_id' => $id))->result();
	}

	public function get_health_recored($id){
		return $this->db->get_where('patient_health_recored', array('patient_id' => $id))->result();
	}

	// create operations

	public function create($data){
		$this->db->insert_batch('patients', $data); 
	}

	public function insert_private_info($data){
		$this->db->insert_batch('patient_private_info', $data);
	}

	public function insert_family_info($data){
		$this->db->insert_batch('patient_family', $data);
	}

	public function insert_health_info($data){
		$this->db->insert_batch('patient_health_recored', $data);
	}

	//update operations

	public function update($id,$data){
		$this->db->update('patients', $data, array('id' => $id));
	}

	public function update_private_info($id,$data){
		$this->db->update('patient_private_info', $data, array('id' => $id));
	}

	public function update_family_info($id,$data){
		$this->db->update('patient_family', $data, array('id' => $id));
	}

	public function update_health_info($id,$data){
		$this->db->update('patient_health_recored', $data, array('id' => $id));
	}

	//delete operations

	public function delete($id){
		$this->db->delete('patients', array('id' => $id));
	}

	public function delete_private_info($id){
		$this->db->delete('patient_private_info', array('id' => $id));
	}

	public function delete_family_info($id){
		$this->db->delete('patient_family', array('id' => $id));
	}

	public function delete_health_info($id){
		$this->db->delete('patient_health_recored', array('id' => $id));
	}
}