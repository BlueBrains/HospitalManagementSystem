<?php

class Migration_Add_Notification_Field extends CI_Migration {
	
    public function up(){        
        $fields = array(
        "recived_by_nurse BOOLEAN NOT NULL DEFAULT  '0'",
     	 "recived_by_admin BOOLEAN NOT NULL DEFAULT  '0'",
     	  "recived_by_user BOOLEAN NOT NULL DEFAULT  '0'",
     	   "uploaded BOOLEAN NOT NULL DEFAULT  '0'",
     	   "sended BOOLEAN NOT NULL DEFAULT  '0'"
    	);

    $this->dbforge->add_column('analyse_request', $fields);


    }
 
    public function down(){
        $this->dbforge->drop_column('analyse_request', 'recived_by_nurse');
		 $this->dbforge->drop_column('analyse_request', 'recived_by_admin');
		 $this->dbforge->drop_column('analyse_request', 'recived_by_user');
		 $this->dbforge->drop_column('analyse_request', 'uploaded');
		  $this->dbforge->drop_column('analyse_request', 'sended');
    }
}