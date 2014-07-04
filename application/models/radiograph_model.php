<?php
  
class radiograph_model extends CI_Model {
	  
  function radiograph_supervisor_info($id)
	{
		
		$sql=$this->db->query("SELECT * FROM ----- WHERE **radiograph_supervisor_id = '".$id."'");
		
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		if ($sql->num_rows >= 1)
            return $data;
		return FALSE;
           
     }
	
	function fetch_req($id)
	{
		if ($id == 0)
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE 'out' = '0'");
		else if ($id == -1)
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE state = 2 and 'out' = '0'");
		else if ($id == -2)
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE state = 1 and 'out' = '0'");
		else if ($id == -3)
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE 'out' = '1'");			
		else if ($id == -4)
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE state = 0");
		else 
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE patient_id = '".$id."'");
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		if ($sql->num_rows >= 1)
            return $data;
		else {
			$f=0;	
			return $f;
		}
           
        }
					
	function create_req($dep)
	{
			$now=getdate();
			$id=$this->input->post('patient_id');
			$y=$now['year']."-".$now['mon']."-".$now['mday'];
					
			if ($dep<0)	
			{
					$new_rad_request_insert_data = array(
				'patient_id' => $this->input->post('patient_id'),
				'date' => $y,
				'state'=>'0',
				'emergancy'=>$this->input->post('checked'),
				'out'=>'1',
				'section_name' =>$this->input->post('section_name'),
				'comment' => $this->input->post('comment'),	
				'image_id'=> $this->input->post('image_id'),
				'part_of_body'=> $this->input->post('part_of_body'),
				'position'=> $this->input->post('position'),
				);		
			}
			else
			{
					
				$new_rad_request_insert_data = array(
			'patient_id' => $this->input->post('patient_id'),
			'date' => $y,
			'state'=>'0',
			'emergancy'=>$this->input->post('checked'),
			'section_name' =>$this->input->post('section_name'),
			'comment' => $this->input->post('comment'),	
			'image_id'=> $this->input->post('image_id'),
			'part_of_body'=> $this->input->post('part_of_body'),
			'position'=> $this->input->post('position'),
		);		
			}
			
		$insert = $this->db->insert('rad_request', $new_rad_request_insert_data);	
		// $sql=$this->db->query("SELECT * FROM rad_request WHERE patient_id = '".$id."' and state = 0");
		// foreach ($sql->result() as $raw ) {
                // $data[]=$raw;
            // }
            // return $data;
// 		
	//	return $sql;
		
	}
	
} 