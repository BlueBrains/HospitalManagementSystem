<?php

class radiology_model extends CI_Model {

	function fetch_req($id=0)
	{
					// $query = "SELECT * ".
			                 // "FROM request INNER JOIN  radiology on request.image_id = radiology.image_id ".
				             // "WHERE request.patient_id = ".$id;            
		if ($id>0)
			$sql=$this->db->query("SELECT * FROM request WHERE patient_id = '".$id."' and checked = 0");
		else 
			$sql=$this->db->query("SELECT * FROM request ");
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
	function create_req()
	{
			$now=getdate();
			$id=$this->input->post('patient_id');
			$y=$now['year']."-".$now['mon']."-".$now['mday'];
			$new_request_insert_data = array(
			'patient_id' => $this->input->post('patient_id'),
			'date' => $y,
			'section_name' =>$this->input->post('section_name'),
			'comment' => $this->input->post('comment'),	
			'image_id'=> $this->input->post('image_id'),
			'part_of_body'=> $this->input->post('part_of_body'),
			'position'=> $this->input->post('position')
		);	
		$insert = $this->db->insert('request', $new_request_insert_data);	
		$sql=$this->db->query("SELECT * FROM request WHERE patient_id = '".$id."' and checked = 0");
		foreach ($sql->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
		
	//	return $sql;
		
	}
	
	function photo_upload($req_id)
	{
		echo "$req_id";
        $now=getdate();
        $nowDate=$now['year']."-".$now['mon']."-".$now['mday'];
        $ret=FALSE;
        $lob='';
        $taille='o';
        $type='';
        $nom='';
        $size_max=25000000;
        //$des=$_POST['description'];
        $ret=is_uploaded_file ($_FILES['fic']['tmp_name']);
        if ( !$ret )
        {
            echo "خطأ في التحميل";
            return false;
        }
        else
        {
        
             $size = $_FILES['fic']['size'];
             $type = $_FILES['fic']['type'];
             $name = $_FILES['fic']['name'];
			 
      $blob = mysql_real_escape_string(file_get_contents($_FILES['fic']['tmp_name']));
        $sql="UPDATE request SET name='".$name."' , file_size = '".$size."' , mime_type ='".$type."' , file_data='".$blob."' WHERE id = ".$req_id;
        $result=$this->db->query($sql)or die (mysql_error ());
        return true;
        }
        
    }
	function show_image($id)
    {
        $id = intval ($id);        
        $sql=$this->db->query("SELECT id, mime_type, file_data FROM request WHERE id = ".$id);
       
        foreach ($sql->result() as $raw ) {
            $data[]=$raw;
        }
        return $data;
        
    }
	
	function delete_req($id)
	{
		$this->db->query("DELETE FROM request WHERE id = ".$id);
		
	}
}