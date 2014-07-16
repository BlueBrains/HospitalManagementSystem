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

	public function updateQuantity($def,$id,$order_id){
		$this->db->set('quantity',"quantity + ".(int)$def,FALSE);
		$this->db->where('id',$id);
		$this->db->update('medicines');
		$this->db->insert('medicine_insertion',array('medicine_id'=>$id,'quantity'=>$def, 'order_id'=>$order_id));
	}
		
	function terms($q){
    	$this->db->select('tradeName');
    	$this->db->like('tradeName', $q);
    	$query = $this->db->get('medicines');
    	if($query->num_rows > 0){
      		foreach ($query->result_array() as $row){
        		$row_set[] = htmlentities(stripslashes($row['tradeName'])); //build an array        		
      		}
      		echo json_encode($row_set); //format the array into json data
    	}
  	}
	public function updateMed($id,$data)
	{
		$this->db->update('medicines', $data, array('id' => $id));		
	}
	public function getMed($id)
	{
		$q = $this->db->get_where('medicines', array('id' => $id));
		if($q->num_rows()>0)
        {
        	$data = $q->result();             
           	return $data[0];           
        }		
	}
	public function getAllMed()
	{
		$q = $this->db->select('*')->from('medicines')->get();
		if($q->num_rows()>0)
        {
        	foreach ($q->result() as $raw ) {
               $data[]=$raw;
           	}
           return $data;           
        }		
		
	}
	
	public function saleMed($data)
	{
		$this->db->insert('medicine_exrequest',$data);
		$result = $this->db->get_where('medicines', array('id' => $data['medicine_id']))->result();
		$last_quantity = $result[0]->quantity;
		$new_quantity = $last_quantity - $data['quantity'];
		$this->db->update('medicines', array('quantity'=>$new_quantity), array('id' => $data['medicine_id']));
	}
	
	public function getSaledMed()
	{
		$q = $this->db->select('customerName,medicine_exrequest.quantity,tradeName,caliber,sale_date')
		->from('medicine_exrequest')
		->join('medicines', 'medicine_exrequest.medicine_id = medicines.id','inner')
		->get();
		if($q->num_rows()>0)
        {
        	foreach ($q->result() as $raw ) {
               $data[]=$raw;
           	}
           return $data;           
        }		
			
	}
	public function getMedInsertion($id)
	{
		$q = $this->db->select('tradeName,caliber,medicine_insertion.quantity')
		->from('medicine_insertion')
		->join('medicines', 'medicine_insertion.medicine_id = medicines.id','inner')
		->where('medicine_insertion.order_id',$id)
		->get();
		if($q->num_rows()>0)
        {
        	foreach ($q->result() as $raw ) {
               $data[]=$raw;
           	}
           return $data;           
        }		
		
	}
	
	public function getOrders(){
		$this->db->order_by("date", "desc");
		return $this->db->get('pharmacy_order')->result();
	}
	
	public function assignTask($request_id,$nurse_id)
	{		
		$this->db->update('medicine_request', array('nurse_id'=>$nurse_id), array('id' => $request_id));
	}
	 	
}

?>