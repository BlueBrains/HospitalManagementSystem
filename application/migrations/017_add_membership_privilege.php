<?php 

class Migration_add_membership_privilege extends CI_Migration {

  public function up()
  {
        
        $this->dbforge->add_field("rollname varchar(255) NOT NULL");
		$this->dbforge->add_field("send_requests boolean default false");
		$this->dbforge->add_field("delete_requests boolean default false");
		$this->dbforge->add_field("pharmacy_admin boolean default false");
		$this->dbforge->add_field("radiology_admin boolean default false");
		$this->dbforge->add_field("analysis_admin boolean default false");
		$this->dbforge->add_field("add_admin boolean default false");
		$this->dbforge->add_field("add_doctor boolean default false");
		$this->dbforge->add_field("add_patient boolean default false");
		$this->dbforge->add_field("delete_patient boolean default false");
		$this->dbforge->add_field("assert_patient boolean default false");
		$this->dbforge->add_field("eject_patient boolean default false");
		$this->dbforge->add_field("view_patient boolean default false");
        $this->dbforge->add_key('rollname', TRUE);                           
        $this->dbforge->create_table('privilege', TRUE);
		
		
        $this->dbforge->add_field("username varchar(255) not null");
		$this->dbforge->add_field("password varchar(255) not null");
		$this->dbforge->add_field("doctor_id int(11) unsigned NULL ");
		$this->dbforge->add_field("patient_id int(11) unsigned NULL ");
		$this->dbforge->add_field("rollname varchar(255) not null");
		$this->dbforge->add_key('username', TRUE);                           
        $this->dbforge->create_table('membership', TRUE);
		
		$new_member = array(
				'username ' => "super",
				'password' => '1234',
				'doctor_id' => '1',
				'patient_id' => '0',
				'rollname' => "superadmin"					
			);
		$insert = $this->db->insert('membership', $new_member);
		$new_member = array(
				'username ' => "pharmacy",
				'password' => '1234',
				'doctor_id' => '0',
				'patient_id' => '0',
				'rollname' => "pharmacy_admin"					
			);
		$insert = $this->db->insert('membership', $new_member);
		$new_member = array(
				'username ' => "radiology",
				'password' => '1234',
				'doctor_id' => '0',
				'patient_id' => '0',
				'rollname' => "radiology_admin"					
			);
		$insert = $this->db->insert('membership', $new_member);
		$new_member = array(
				'username ' => "analyse",
				'password' => '1234',
				'doctor_id' => '0',
				'patient_id' => '0',
				'rollname' => "analyse_admin"					
			);
		$insert = $this->db->insert('membership', $new_member);		
		
				$new_member = array(
				'username ' => "doctor",
				'password' => '1234',
				'doctor_id' => '2',
				'patient_id' => '0',
				'rollname' => "doctor"					
			);
		$insert = $this->db->insert('membership', $new_member);	
		
		$new_member = array(
				'username ' => "reciver",
				'password' => '1234',
				'doctor_id' => '0',
				'patient_id' => '0',
				'rollname' => "recive_admin"					
			);
		$insert = $this->db->insert('membership', $new_member);	
		
		$new_member_roll = array(
				'rollname' => "superadmin",
				'send_requests' => '1',
				'pharmacy_admin' => '1',
				'radiology_admin' => '1',
				'analysis_admin' => '1',
				'view_patient' => '1',
				'add_admin' => '1',
				'add_doctor' => '1',
				'add_patient' => '1',	
				'delete_patient' => '1',
				'assert_patient' => '1',
				'eject_patient' => '1',
				'delete_requests'=>'1'							
			);
				$insert = $this->db->insert('privilege', $new_member_roll);
						$new_member_roll = array(
				'rollname' => "pharmacy_admin",
				'send_requests' => '0',
				'pharmacy_admin' => '1',
				'radiology_admin' => '0',
				'analysis_admin' => '0',
				'view_patient' => '0',
				'add_admin' => '0',
				'add_doctor' => '0',
				'add_patient' => '0',	
				'delete_patient' => '0',
				'assert_patient' => '0',
				'eject_patient' => '0',
				'delete_requests'=>'1'						
			);
				$insert = $this->db->insert('privilege', $new_member_roll);
						$new_member_roll = array(
				'rollname' => "radiology_admin",
				'send_requests' => '0',
				'pharmacy_admin' => '0',
				'radiology_admin' => '1',
				'analysis_admin' => '0',
				'view_patient' => '0',	
				'add_admin' => '0',
				'add_doctor' => '0',
				'add_patient' => '0',	
				'delete_patient' => '0',
				'assert_patient' => '0',
				'eject_patient' => '0',
				'delete_requests'=>'1'				
			);
				$insert = $this->db->insert('privilege', $new_member_roll);
						$new_member_roll = array(
				'rollname' => "analyse_admin",
				'send_requests' => '0',
				'pharmacy_admin' => '0',
				'radiology_admin' => '0',
				'analysis_admin' => '1',
				'view_patient' => '0',
				'add_admin' => '0',
				'add_doctor' => '0',
				'add_patient' => '0',	
				'delete_patient' => '0',
				'assert_patient' => '0',
				'eject_patient' => '0',
				'delete_requests'=>'1'									
			);
				$insert = $this->db->insert('privilege', $new_member_roll);
						$new_member_roll = array(
				'rollname' => "doctor",
				'send_requests' => '1',
				'pharmacy_admin' => '0',
				'radiology_admin' => '0',
				'analysis_admin' => '1',
				'view_patient' => '1',
				'add_admin' => '0',
				'add_doctor' => '0',
				'add_patient' => '0',	
				'delete_patient' => '0',
				'assert_patient' => '0',
				'eject_patient' => '0',
				'delete_requests'=>'1'									
			);
				$insert = $this->db->insert('privilege', $new_member_roll);	
									$new_member_roll = array(
				'rollname' => "recive_admin",
				'send_requests' => '0',
				'pharmacy_admin' => '0',
				'radiology_admin' => '0',
				'analysis_admin' => '1',
				'view_patient' => '0',
				'add_admin' => '0',
				'add_doctor' => '0',
				'add_patient' => '1',	
				'delete_patient' => '1',
				'assert_patient' => '1',
				'eject_patient' => '1',
				'delete_requests'=>'0'									
			);
				$insert = $this->db->insert('privilege', $new_member_roll);
					
				    $this->dbforge->drop_column('doctors',"name");
					$this->dbforge->drop_column('doctors',"password");
					$this->dbforge->drop_column('patients',"name");
					$this->dbforge->drop_column('patients',"password");
					$this->dbforge->drop_table('admin');
  }

  public function down()
  {
    $this->dbforge->drop_table('privilege');
	$this->dbforge->drop_table('membership');
	$this->dbforge->add_column('doctors',"name");
	$this->dbforge->add_column('doctors',"password");
	$this->dbforge->add_column('patients',"name");
	$this->dbforge->add_column('patients',"password");
	$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("name varchar(255) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("password varchar(255) NOT NULL DEFAULT ''");	
		$this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('admin', TRUE);
  }
}


?>