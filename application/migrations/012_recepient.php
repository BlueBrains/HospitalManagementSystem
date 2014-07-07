<?php
class Migration_recepient extends CI_Migration {
    public function up(){
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("id_patient int(11) unsigned NOT NULL");
		$this->dbforge->add_field("ward int(11) unsigned NOT NULL");
		$this->dbforge->add_field("dep_id int(11) unsigned NOT NULL");
		$this->dbforge->add_field("room int(11) unsigned NOT NULL");
		$this->dbforge->add_field("date_in TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("date_out TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("p_entry_state set('Normal','Emergancy','another_hospital') NOT NULL DEFAULT 'Normal'");
		
        $this->dbforge->add_key('id', TRUE);        
        $this->dbforge->create_table('entries', TRUE);
		
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("doctor_id int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("patient_id int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("entry_id int(11) unsigned NOT NULL ");
 		$this->dbforge->add_field("state text CHARACTER SET utf8 ");
        $this->dbforge->add_key('id', TRUE);        
       
        $this->dbforge->create_table('visit', TRUE);
    }
 
    public function down(){
        $this->dbforge->drop_table('visit');
		$this->dbforge->drop_table('entries');
    }
}