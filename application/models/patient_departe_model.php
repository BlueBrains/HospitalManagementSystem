<?php

class patient_departe_model extends CI_Model {
	function assert_t_depart()
	{
		
		$now=getdate();
		$y=$now['year']."-".$now['mon']."-".$now['mday'];
			$insert_data = array(
			'patient_id' => $this->input->post('assert'),
			'entry_date' => $y,
			'department_id' =>$this->input->post('section')
				
		);	
		$insert = $this->db->insert('patient_depart', $insert_data);	
		return true;
	}
	
	function get_depart($r)
	{   	
        $sql=$this->db->query("SELECT * 
FROM patient_depart
WHERE patient_id =  '".$r."'
AND department_id=  '".$this->input->post('section')."'
AND close_bill =  '0'");
        
        foreach ($sql->result() as $raw ) {
            $id=$raw->id;
			return $id;
        }
		
        	
		return FALSE;
	}
}
	