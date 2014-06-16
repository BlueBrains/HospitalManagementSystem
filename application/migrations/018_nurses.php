<?php

class Migration_Nurses extends CI_Migration {

	  public function up()
	  {		  
		$fields = array(
		  "id int(11) unsigned NOT NULL AUTO_INCREMENT",
		  "name varchar(255) NOT NULL DEFAULT ''",
	      "password varchar(255) NOT NULL DEFAULT ''",	   
	      "firstName varchar(255) NOT NULL DEFAULT ''",
	      "lastName varchar(255) NOT NULL DEFAULT ''",
	      "emailAddress varchar(255) NOT NULL DEFAULT ''",
	      "mobile varchar(40) NOT NULL",
	      "department_id int(11) NOT NULL"
	    );
		
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('name');		
		$this->dbforge->create_table('nurses', TRUE);				   
	  }
	
	  public function down()
	  {
		$this->dbforge->drop_table('nurses');
	  }
  }

