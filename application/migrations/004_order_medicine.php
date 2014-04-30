<?php

class Migration_Order_Medicine extends CI_Migration {
    public function up(){
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("doctorID int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("patientID int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("medicineID int(11) unsigned NOT NULL ");       
 
        $this->dbforge->add_key('id', TRUE);        
       
        $this->dbforge->create_table('order_medicine', TRUE);
    }
 
    public function down(){
        $this->dbforge->drop_table('order_medicine');
    }
}