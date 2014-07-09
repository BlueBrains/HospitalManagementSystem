<?php
class analyse_model extends CI_Model
{
	function get_info($id)
	{
		
	}
	public function get_analyses()
       {
           $q=$this->db->query("SELECT id,analyse_name,Sample_required,required_time,catagoury_id FROM analyse ORDER BY catagoury_id");
           foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
       }
       public function get_catagoury()
       {
           $q=$this->db->query("SELECT catagoury_id,catagoury_name FROM catagoury");
           foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
       }
	function order_list()
	{
		$q=$this->db->query("SELECT analyse_request.id as id,state,CONCAT(patients.fname,' ',patients.lname) as Pname,CONCAT(doctors.fname,' ',doctors.lname) as Dname,analyse_name as Nname,request_date as rdate FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE state='0' AND out1='0'");
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }							  
	}
	function confirmed_order_list()
	{
		$q=$this->db->query("SELECT analyse_request.id as id,state,CONCAT(patients.fname,' ',patients.lname) as Pname,CONCAT(doctors.fname,' ',doctors.lname) as Dname,analyse_name as Nname,request_date as rdate FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE state='1' AND out1=0");
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }		
	}
	function finished_order_list()
	{
		$q=$this->db->query("SELECT analyse_request.id as id,state,CONCAT(patients.fname,' ',patients.lname) as Pname,CONCAT(doctors.fname,' ',doctors.lname) as Dname,analyse_name as Nname,request_date as rdate FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE state='2' AND out1=0");
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
		$q=$this->db->query("SELECT analyse_request.id as id,state,CONCAT(patients.fname,' ',patients.lname) as Pname,CONCAT(doctors.fname,' ',doctors.lname) as Dname,analyse_name as Nname,request_date as rdate FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE out1=0
                              ORDER BY  state");
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }		
	}
	
	function out_order_list()
	{
		$q=$this->db->query("SELECT analyse_request.id as id,state,patient_out as Pname,analyse_name as Nname,request_date as rdate FROM analyse_request
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              WHERE out1='1'
                              ORDER BY  state,request_date DESC");
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
		$x=$this->db->query("UPDATE analyse_request SET state='1' where id=".$id);
	}
	
	function confirm_request_all()
	{
		$x=$this->db->query("UPDATE analyse_request SET state='1' where state= '0'");
	}
	
	function finish_order_list_patient($id)
	{
		
		$q=$this->db->query("SELECT analyse_request.id as id,state,CONCAT(patients.fname,' ',patients.lname) as Pname,CONCAT(doctors.fname,' ',doctors.lname) as Dname,analyse_name as Nname,request_date as rdate FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE patient_id= '".$id."' AND state='2'");
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
		$q=$this->db->query("SELECT analyse_request.id as id,state,CONCAT(patients.fname,' ',patients.lname) as Pname,CONCAT(doctors.fname,' ',doctors.lname) as Dname,analyse_name as Nname,request_date as rdate FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE patient_id= '".$patient_id."' AND state > '0'
                              ORDER BY state DESC");
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }		
	}
	
	function confirmed_order_list_patient($id)
	{
		$q=$this->db->query("SELECT analyse_request.id as id,state,CONCAT(patients.fname,' ',patients.lname) as Pname,CONCAT(doctors.fname,' ',doctors.lname) as Dname,analyse_name as Nname,request_date as rdate FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE patient_id= '".$id."' AND state='1'");
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
		$q=$this->db->query("SELECT analyse_request.id as id, CONCAT(patients.fname,' ',patients.lname) as Pname,CONCAT(doctors.fname,' ',doctors.lname) as Dname,analyse_name as Nname FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE analyse_request.id=".$request_id);
		 if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }
	}
	function upload_result()
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
        	$location=realpath($_SERVER['DOCUMENT_ROOT'])."\\project-1\\uploads\\analyse\\".$filename;
        	 move_uploaded_file($tmp_name, $location);
        	  $sql="UPDATE analyse_request SET result='".$filename."' ,result_date='".$nowDate."',description='".$_POST['description']."' ,state='2' WHERE id=".$_POST['request_id'];
        	  $result=$this->db->query($sql)or die (mysql_error ());
        	return true;
       	}
	}
	function create_request()
	{
		$now=getdate();
           $state=0;
           $nowDate=$now['year']."-".$now['mon']."-".$now['mday'];
           foreach($_POST['check'] as $value)
              {
              	if(isset($doctor_id))
				{
					  $q=$this->db->query("INSERT INTO analyse_request(patient_id,doctor_id,analyse_id,request_date,state)
                 VALUES('".$_POST['patient_id']."','".$doctor_id."','".$value."','". $nowDate."','". $state."')");
				}
				else{
					$state=1;
					$out1=1;
					 $q=$this->db->query("INSERT INTO analyse_request(patient_out,analyse_id,request_date,state,out1)
                 VALUES('".$_POST['patient_name']."','".$value."','". $nowDate."','". $state."','".$out1."')");
				}
               
              }
	}
	function edit_Analyse($request_id)
	{
		$q=$this->db->query("SELECT result from analyse_request WHERE id=".$request_id);
		foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
	}
	
}

?>