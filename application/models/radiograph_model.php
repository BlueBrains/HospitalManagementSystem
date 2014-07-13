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
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id ");
		else if ($id == -1)
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE state = 2 and out1 = '0'");
		else if ($id == -2)
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE state = 1 and out1 = '0'");
		else if ($id == -3)
			$sql=$this->db->query('SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE out1 = "1"');	
		else if ($id == -4)
			$sql=$this->db->query('SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE state = "0"');
		else 
			$sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE patient_id = '".$id."'");
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
		if ($sql->num_rows >= 1)
           { return $data;}
		else {
			$f=0;	
			return $f;
		}
           
        }
					
	function create_req($dep)
	{
				if ($this->input->get('checked')=="on")
							$x=1;
				else 
					$x=0;			
			$now=getdate();
			$id=$this->input->get('patient_id');
			$y=$now['year']."-".$now['mon']."-".$now['mday'];
					
			if ($dep<0)	
			{
					$new_rad_request_insert_data = array(
				'patient_id' => $this->input->get('patient_id'),
				'date' => $y,
				'state'=>'0',
				'emergancy'=>$x,
				'out1'=>'1',
				'section_name' =>$this->input->get('section_name'),
				'comment' => $this->input->get('comment'),	
				'image_id'=> $this->input->get('image_id'),
				'part_of_body'=> $this->input->get('part_of_body'),
				'position'=> $this->input->get('position'),
				);		
			}
			else
			{
					
				$new_rad_request_insert_data = array(
			'patient_id' => $this->input->get('patient_id'),
			'date' => $y,
			'state'=>'0',
			'emergancy'=>$x,
			'section_name' =>$this->input->get('section_name'),
			'comment' => $this->input->get('comment'),	
			'image_id'=> $this->input->get('image_id'),
			'part_of_body'=> $this->input->get('part_of_body'),
			'position'=> $this->input->get('position'),
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
	
	function confirm($id)
	{
		$sql="UPDATE rad_request SET state = '1' WHERE id = '".$id."'";
        $result=$this->db->query($sql)or die (mysql_error ());
		}
		
	function finish($id)
	{
		$sql="UPDATE rad_request SET state = '2' WHERE id = ".$id;
        $result=$this->db->query($sql)or die (mysql_error ());
	}	
	
	function upload_image($request_id)
	{
		
		 $now=getdate();
        $nowDate=$now['year']."-".$now['mon']."-".$now['mday'];
		$ret=is_uploaded_file ($_FILES['fic']['tmp_name']);
        //$ret=TRUE;
        if ( !$ret )
        {
            echo "error on uploading";
            return false;
        }
        else
        {
        	 $filename = $_FILES['fic']['name'];
        	 $tmp_name=$_FILES['fic']['tmp_name'];
        	 $location=realpath($_SERVER['DOCUMENT_ROOT'])."\\project-1\\uploads\\radiograph\\".$filename;
        	 move_uploaded_file($tmp_name, $location);
        	  $sql="UPDATE rad_request SET file_name='".$filename."' ,date='".$nowDate."',comment='".$_POST['description']."', state = '2' WHERE id='".$request_id."'";
        	  $result=$this->db->query($sql)or die (mysql_error ());
        	return true;
       	}	
	}
	
	function show_image($id)
    {
       
        $sql=$this->db->query("SELECT * FROM rad_request INNER JOIN radiology ON rad_request.image_id = radiology.image_id WHERE id = '".$id."'");
       
        foreach ($sql->result() as $raw ) {
            $data[]=$raw;
        }
        return $data;
        
    }
	function update_req($id)
	{
		$sql="UPDATE rad_request SET description= '".$this->input->get('description')."' WHERE id = '".$id."'";
		$result=$this->db->query($sql)or die (mysql_error ());
        	return true;
	}
} 