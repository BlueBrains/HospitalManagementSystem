<?php
class analyse_model extends  CI_Model
{
    public function get_information($id)
     {
         $q=$this->db->query("SELECT id,CONCAT(firstName ,' ' , lastName)as patientName,date_format(birthdate,'%w:%M%d,%Y')as dates,country,city,address,phone,mobile,emergencyPhone1,
            bloodGroup,chronicDiseases,addiction FROM patients
            WHERE id=".$id);
            foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
     }
     public function get_result_analyses()
   {
       $q=$this->db->query("SELECT id,analyse_name,catagoury_id FROM analyse ORDER BY catagoury_id");
       foreach ($q->result() as $raw ) {
            $data[]=$raw;
        }
        return $data;
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
       public function createRequest()
       {
           
           $now=getdate();
           $state=0;
           $nowDate=$now['year']."-".$now['mon']."-".$now['mday'];
           foreach($_POST['check'] as $value)
              {
                  echo "Enter";
                 $q=$this->db->query("INSERT INTO analyse_request(patient_id,doctor_id,analyse_id,date,state)
                 VALUES('".$_POST['patient_id']."','".$_POST['doctor_id']."','".$value."','". $nowDate."','". $state."')");
              }
       }
       public function uploadAnalyse($req_id)
       {
           //echo "enterrrrrrr";
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
        //$ret=TRUE;
        if ( !$ret )
        {
            echo "error on uploading";
            return false;
        }
        else
        {
            $size = $_FILES['fic']['size'];
             $type = $_FILES['fic']['type'];
             $name = $_FILES['fic']['name'];
        $blob = mysql_real_escape_string(file_get_contents ($_FILES['fic']['tmp_name']));
        //echo "$blob";
        $sql="UPDATE analyse_request SET name='".$name."' , file_size='".$size."' , mime_type ='".$type."' , file_data='".$blob."' WHERE analyse_request.id = ".$req_id;
        $result=$this->db->query($sql)or die (mysql_error ());
        return true;
        } 
       
       }

    public function edit_Analyses($id)
    {
         $q=$this->db->query("SELECT patients.id,patients.name,date_format(birthdate,'%w:%M%d,%Y')as dates,bloodGroup,
                              analyse_request.id as analyse_id,analyse_name as analyse_type,analyse_request.result_date,description,analyse_request.name as file_name FROM analyse_request
                              INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              WHERE analyse_request.patient_id=".$id);
        foreach ($q->result() as $raw ) {
            $data[]=$raw;
        }
        return $data;
    }
    function edit_Analyse($id)
    {
        $id = intval ($id);
        
        $sql=$this->db->query("SELECT id, mime_type,file_data FROM analyse_request WHERE id = ".$id);
        
        foreach ($sql->result() as $raw ) {
            $data[]=$raw;
        }
        return $data;
        
    }
    
}
?>