<?php
class Migration_state_visit extends CI_Migration {
    public function up(){
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("request_id int(11) unsigned NOT NULL");
		$this->dbforge->add_field("state_num set('0','1','2') NOT NULL DEFAULT '0'");
		$this->dbforge->add_field("state_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("request_type set('ana','med','rad') NOT NULL DEFAULT 'rad'");
		
        $this->dbforge->add_key('id', TRUE);        
        $this->dbforge->create_table('request_state', TRUE);
		
		
		$Fields = array( "doctor_id int(11) unsigned");
		$this->dbforge->add_column('rad_request', $Fields);
		
		$Fields = array( "Temperature varchar(255)");
		$this->dbforge->add_column('visit', $Fields);
		$Fields = array( "pulse varchar(255)");
		$this->dbforge->add_column('visit', $Fields);
		$Fields = array( "Respiration varchar(255)");
		$this->dbforge->add_column('visit', $Fields);
		$Fields = array( "blood_pressure varchar(255)");
		$this->dbforge->add_column('visit', $Fields);
		
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("visit_id int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("mesuare_type varchar(255) ");
		$this->dbforge->add_field("mesuare_value varchar(255) ");
        $this->dbforge->add_key('id', TRUE);        
        $this->dbforge->create_table('mesuare', TRUE);
		
		
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("sender_id int(11) unsigned NOT NULL");
		$this->dbforge->add_field("reciever_id int(11) unsigned NOT NULL");
		$this->dbforge->add_field("w_r_b varchar(255) NOT NULL DEFAULT ''");
		
		
        $this->dbforge->add_key('id', TRUE);        
        $this->dbforge->create_table('calls', TRUE);
		
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("doctor_id int(11) unsigned NOT NULL");
		$this->dbforge->add_field("patient_id int(11) unsigned NOT NULL");
		
        $this->dbforge->add_key('id', TRUE);        
        $this->dbforge->create_table('my_patients', TRUE);
    }
 
    public function down(){
    	$this->dbforge->drop_column('visit','Temperature');
		$this->dbforge->drop_column('visit','pulse');
		$this->dbforge->drop_column('visit','Respiration');
		$this->dbforge->drop_column('visit','blood_pressure');
		
    	$this->dbforge->drop_column('rad_request','doctor_id');


        $this->dbforge->drop_table('request_state');
		$this->dbforge->drop_table('mesuare');
		
		$this->dbforge->drop_table('calls');
		$this->dbforge->drop_table('my_patients');
    }
}