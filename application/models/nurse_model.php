<?php 

/**
 * 
 */
class Nurse_model extends CI_Model {
	
	public function get_number_notification()
	 {
	 	 $q=$this->db->query("SELECT COUNT(id)as not_number FROM analyse_request WHERE recived_by_nurse=0");
         if($q->num_rows()>0)
         {
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
         }
         else {
             return 0;
         }
	 }
	 public function get_notification()
     {
         $q=$this->db->query("SELECT analyse_request.id as id,state,patients.name as Pname,doctors.name as Dname,analyse_name as Nname FROM analyse_request
                             INNER JOIN patients on patients.id=analyse_request.patient_id
                              INNER JOIN analyse on analyse_request.analyse_id=analyse.id
                              INNER JOIN doctors on analyse_request.doctor_id=doctors.id
                              WHERE recived_by_nurse=0
         ");
         if($q->num_rows()>0)
         {
              $x=$this->db->query("UPDATE analyse_request SET recived_by_nurse=1 WHERE recived_by_nurse=0");
              foreach ($q->result() as $raw ) {
                $data[]=$raw;
            }
            return $data;
            
         }
        
        
     }
}
