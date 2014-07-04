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
        $this->dbforge->add_field("Sample_required VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ");
        $this->dbforge->add_field("required_time VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ");
        $this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('analyse', TRUE);
		
		 $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("patient_id int(11) unsigned NOT NULL ");
        $this->dbforge->add_field("analyse_id int(11) unsigned NOT NULL ");
        $this->dbforge->add_field("request_date date NOT NULL DEFAULT NOW()");
		$this->dbforge->add_field("doctor_id  int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("comment varchar(255) NOT NULL DEFAULT '' "); 
		$this->dbforge->add_field("state SET(  '0',  '1',  '2' ) NOT NULL DEFAULT '0'");
		$this->dbforge->add_field("description mediumtext NULL DEFAULT ''");
		 $this->dbforge->add_field("result_date DATE NULL");
		 $this->dbforge->add_field("result VARCHAR(100) NULL");
		   $this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('analyse_request', TRUE);
		
  }

 public function down()
  {
    $this->dbforge->drop_table('analyse');
    $this->dbforge->drop_table('catagoury');
    $this->dbforge->drop_table('analyse_request');  

  }
}
?>