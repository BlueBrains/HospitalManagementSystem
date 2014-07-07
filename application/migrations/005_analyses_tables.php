<?php
class Migration_analyses_tables extends CI_Migration {

  public function up()
  {
      $this->dbforge->add_field("catagoury_id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("catagoury_name varchar(255) NOT NULL DEFAULT ''");       
        $this->dbforge->add_key('catagoury_id', TRUE);                           
        $this->dbforge->create_table('catagoury', TRUE);

        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("analyse_name varchar(255) NOT NULL DEFAULT ''");  
        $this->dbforge->add_field("catagoury_id int(11) NOT NULL ");     
        $this->dbforge->add_field("Sample_required VARCHAR( 55 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ");
        $this->dbforge->add_field("required_time VARCHAR(55) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ");
        $this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('analyse', TRUE);
		
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("patient_id int(11) unsigned NOT NULL ");
        $this->dbforge->add_field("analyse_id int(11) unsigned NOT NULL ");
        $this->dbforge->add_field("request_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("doctor_id  int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("comment varchar(255) NOT NULL DEFAULT '' "); 
		$this->dbforge->add_field("state SET(  '0',  '1',  '2' ) NOT NULL DEFAULT '0'");
		$this->dbforge->add_field("out1 TINYINT(1) NOT NULL DEFAULT '0'");
		$this->dbforge->add_field("patient_out varchar(55) NOT NULL DEFAULT '0'");
		$this->dbforge->add_field("description mediumtext NULL DEFAULT'' ");
		$this->dbforge->add_field("result_date DATE NULL");
		$this->dbforge->add_field("result VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL");
		$this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('analyse_request', TRUE);
		
		$new_member = array(
				'catagoury_id' => '1',
				'catagoury_name' => "chemistry",				
			);
		$insert = $this->db->insert('catagoury', $new_member);
		
		$new_member = array(
				'catagoury_id ' => '2',
				'catagoury_name' => "haematology",			
			);
		$insert = $this->db->insert('catagoury', $new_member);
		
		$new_member = array(
				'catagoury_id ' => '3',
				'catagoury_name' => "hormones",				
			);
		$insert = $this->db->insert('catagoury', $new_member);
		
		$new_member = array(
				'catagoury_id ' => '4',
				'catagoury_name' => "serology",				
			);
		$insert = $this->db->insert('catagoury', $new_member);
		
		$new_member = array(
				'catagoury_id ' => '5',
				'catagoury_name' => "drug",			
			);
		$insert = $this->db->insert('catagoury', $new_member);

		$new_member = array(
				'catagoury_id ' => '6',
				'catagoury_name' => "microscopic",						
			);
		$insert = $this->db->insert('catagoury', $new_member);
		
				$new_member = array(
				'catagoury_id ' => '7',
				'catagoury_name' => "Molecular Biology",				
			);
		$insert = $this->db->insert('catagoury', $new_member);	
		
		$new_member = array(
				'catagoury_id ' => '8',
				'catagoury_name' => "Cytogetic",				
			);
		$insert = $this->db->insert('catagoury', $new_member);	
		
		
		$new_member = array(
				'id ' => '1',
				'analyse_name' => "Urea",		
				'catagoury_id'=> '1',
				'Sample_required'=> 'Blood',
				'required_time' => '2 houres',
			);
		$insert = $this->db->insert('analyse', $new_member);	
		
		$new_member = array(
				'id ' => '2',
				'analyse_name' => "GOT",		
				'catagoury_id'=> '1',
				'Sample_required'=> 'Blood',
				'required_time' => '1 houres',
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '3',
				'analyse_name' => "GGT",		
				'catagoury_id'=> '1',
				'Sample_required'=> 'Blood',
				'required_time' => '3 houres',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '4',
				'analyse_name' => "PAP",		
				'catagoury_id'=> '1',
				'Sample_required'=> 'Urine',
				'required_time' => '20 minutes',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '5',
				'analyse_name' => "ADA",		
				'catagoury_id'=> '1',
				'Sample_required'=> 'Urine',
				'required_time' => '45 minutes',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '6',
				'analyse_name' => "ESR",		
				'catagoury_id'=> '2',
				'Sample_required'=> 'Blood',
				'required_time' => '1 Houres',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '7',
				'analyse_name' => "APTT",		
				'catagoury_id'=> '2',
				'Sample_required'=> 'Blood',
				'required_time' => '2 Houres',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '8',
				'analyse_name' => "FDP",		
				'catagoury_id'=> '2',
				'Sample_required'=> 'Urine',
				'required_time' => '15 Minutes',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '9',
				'analyse_name' => "Blood Group",		
				'catagoury_id'=> '2',
				'Sample_required'=> 'Blood',
				'required_time' => '2 seconds :)',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '10',
				'analyse_name' => "T4",		
				'catagoury_id'=> '3',
				'Sample_required'=> 'Blood',
				'required_time' => '4 Houres',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '11',
				'analyse_name' => "FSH",		
				'catagoury_id'=> '3',
				'Sample_required'=> 'Blood',
				'required_time' => '2 Houres',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '12',
				'analyse_name' => "PTH",		
				'catagoury_id'=> '3',
				'Sample_required'=> 'Blood',
				'required_time' => '4 Houres',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '13',
				'analyse_name' => "ACTH",		
				'catagoury_id'=> '3',
				'Sample_required'=> 'Blood',
				'required_time' => '4 Houres',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		
		$new_member = array(
				'id ' => '14',
				'analyse_name' => "Protein C",		
				'catagoury_id'=> '4',
				'Sample_required'=> 'Blood',
				'required_time' => '1 Houres',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '15',
				'analyse_name' => "RF",		
				'catagoury_id'=> '4',
				'Sample_required'=> 'Blood',
				'required_time' => '12 Houres',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '16',
				'analyse_name' => "CRP",		
				'catagoury_id'=> '4',
				'Sample_required'=> 'Blood',
				'required_time' => '30 minutes',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		
		$new_member = array(
				'id ' => '17',
				'analyse_name' => "ASLO",		
				'catagoury_id'=> '4',
				'Sample_required'=> 'Urine',
				'required_time' => '30 minutes',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
		$new_member = array(
				'id ' => '18',
				'analyse_name' => "AL",		
				'catagoury_id'=> '1',
				'Sample_required'=> 'Urine',
				'required_time' => '5 minutes',
				 
			);
		$insert = $this->db->insert('analyse', $new_member);
		
  }

 public function down()
  {
  	$this->dbforge->drop_table('analyse_request');  
    $this->dbforge->drop_table('analyse');
    $this->dbforge->drop_table('catagoury');
    

  }
}
?>