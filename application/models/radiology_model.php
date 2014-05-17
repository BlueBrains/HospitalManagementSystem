<?php

class radiology_model extends CI_Model {

	function fetch_req($id)
	{
					$query = "SELECT * ".
			                 "FROM request INNER JOIN  radiology on request.image_id=radiology.image_id ".
				             "WHERE request.patinet_id = ".$id;
				 
					$q=$this->db->query($query);
            foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
        }				
	function create_req()
	{
			$now=getdate();
			$y=$now['year']."-".$now['mon']."-".$now['mday'];
			$new_request_insert_data = array(
			'patient_id' => $_POST['patient_id'],
			'date' => $y,
			'section_name' =>$_POST['section_name'],
			'comment' => $_POST['comment'],	
			'image_id'=> $_POST['image_id'],
			'part_of_body'=> $_POST['part_of_body'],
			'position'=> $_POST['position']
		);	
		$insert = $this->db->insert('request', $new_request_insert_data);	
		return $insert;
	}
	
	function photo_upload($req_id)
	{
        $now=getdate();
        $nowDate=$now['year']."-".$now['mon']."-".$now['mday'];
        $ret=FALSE;
        $lob='';
        $taille='o';
        $type='';
        $nom='';
        $size_max=25000000;
        $des=$_POST['descreption'];
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
        $blob = file_get_contents ($_FILES['fic']['tmp_name']);
        
        $sql="UPDATE request SET name='".$name."' , file_size='".$size."' , mime_type ='".$type."' , file_data='".$blob."' WHERE request.id = ".$req_id;
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
}