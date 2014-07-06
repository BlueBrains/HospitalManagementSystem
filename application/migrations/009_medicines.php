<?php

class Migration_Medicines extends CI_Migration {
    public function up(){
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("tradeName varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("scientificName varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("manufacturerName varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("caliber int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("quantity int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("price INT(5) NULL");
		$this->dbforge->add_field("unit_per_packing INT(2) NULL");
		$this->dbforge->add_field("packing_per_unitpacking INT(2) NULL");
		$this->dbforge->add_field("med_group VARCHAR(20)");
		
 
        $this->dbforge->add_key('id', TRUE);        
       
        $this->dbforge->create_table('medicines', TRUE);
		
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("doctor_id int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("patient_id int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("medicine_id int(11) unsigned NOT NULL ");       
 		$this->dbforge->add_field("caliber int(11) unsigned NOT NULL ");
 		$this->dbforge->add_field("dose varchar(255) NOT NULL DEFAULT ''");
 		$this->dbforge->add_field("details text CHARACTER SET utf8 ");
		$this->dbforge->add_field("state set('0','1','2') NOT NULL DEFAULT 0");
		$this->dbforge->add_field("date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
 		
        $this->dbforge->add_key('id', TRUE);        
       
        $this->dbforge->create_table('medicine_request', TRUE);
    }
 
    public function down(){
        $this->dbforge->drop_table('medicines');
		$this->dbforge->drop_table('medicine_request');
    }
}