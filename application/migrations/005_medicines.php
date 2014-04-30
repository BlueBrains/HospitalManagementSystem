<?php

class Migration_Medicines extends CI_Migration {
    public function up(){
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("tradeName varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("scientificName varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("manufacturerName varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("caliber int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("quantity int(11) unsigned NOT NULL ");       
 
        $this->dbforge->add_key('id', TRUE);        
       
        $this->dbforge->create_table('medicines', TRUE);
    }
 
    public function down(){
        $this->dbforge->drop_table('medicines');
    }
}