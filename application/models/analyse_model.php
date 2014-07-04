<?php
class analyse_model extends CI_Model
{
	function get_info($id)
	{
		
	}
	function order_list()
	{
		$q=$this->db->query("SELECT analyse_request.id as id,state,patients.name as Pname,doctors.name as Dname,analyse_name as Nname FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE state=0");
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }							  
	}
	function total_order_list()
	{
		$q=$this->db->query("SELECT analyse_request.id as id,state,patients.name as Pname,doctors.name as Dname,analyse_name as Nname FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              ORDER BY  state");
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }		
	}
	
	function confirm_request($id)
	{
		$x=$this->db->query("UPDATE analyse_request SET state=1 where id=".$id);
	}
	
	function confirm_request_all()
	{
		$x=$this->db->query("UPDATE analyse_request SET state=1 where state=0");
	}
	
	function finish_order_list_patient($patinet_id)
	{
		$q=$this->db->query("SELECT analyse_request.id as id,state,patients.name as Pname,doctors.name as Dname,analyse_name as Nname FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE patient_id= '".$patient_id."' AND state=2");
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }							  
	}
	function total_order_list_patient($patient_id)
	{
		$q=$this->db->query("SELECT analyse_request.id as id,state,patients.name as Pname,doctors.name as Dname,analyse_name as Nname FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE patient_id= '".$patient_id."' AND state > 0");
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }		
	}
	
	function upload($request_id)
	{
		$q=$this->db->query("SELECT analyse_request.id as id, patients.name as Pname,doctors.name as Dname,analyse_name as Nname FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE id=".$request_id);
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }
	}
	function upload_result($request_id)
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
        	 $location=base_url()."uploads/analyses/".$filename;
        	 move_uploaded_file($tmp_name, $location);
        	  $sql="UPDATE analyse_request SET result='".$filename."' ,result_date='".$nowDate."',description='".$_POST['description']."' state=2 WHER id=".$request_id;
        	  $result=$this->db->query($sql)or die (mysql_error ());
        	return true;
       	}
	}
	function create_request($doctor_id,$patient_id)
	{
		$now=getdate();
           $state=0;
           $nowDate=$now['year']."-".$now['mon']."-".$now['mday'];
           foreach($_POST['check'] as $value)
              {
                 $q=$this->db->query("INSERT INTO analyse_request(patient_id,doctor_id,analyse_id,request_date,state)
                 VALUES('".$patient_id."','".$doctor_id."','".$value."','". $nowDate."','". $state."')");
              }
	}
	function edit_Analyse($request_id)
	{
		
	}
	
}

?>