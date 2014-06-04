<?php

class Migration_patient_depart_field_medRadAna extends CI_Migration {
    public function up(){
    	
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("patient_id int(11) NULL ");
		$this->dbforge->add_field("department_id int(11) NOT NULL DEFAULT 1");
		$this->dbforge->add_field("entry_date Date NULL");
		$this->dbforge->add_field("close_bill boolean NOT NULL DEFAULT False");		
		$this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('patient_depart', TRUE);
		
		
        $fields = array("patient_depart_id int(11) UNSIGNED NOT NULL DEFAULT 0");
		
		$this->dbforge->add_column('order_medicine',$fields);
		$this->dbforge->add_column('request',$fields);
		$this->dbforge->add_column('analyse_request',$fields);
    }
 
    public function down(){
        $this->dbforge->drop_column('order_medicine','patient_depart_id');
		$this->dbforge->drop_column('request','patient_depart_id');
		$this->dbforge->drop_column('analyse_request','patient_depart_id');
		$this->dbforge->drop_table('patient_depart');
    }
}


