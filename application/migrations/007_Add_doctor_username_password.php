<?php

class Migration_Add_doctor_username_password extends CI_Migration {

  public function up()
  {


        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("password varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("username  varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("first_name varchar(255) NOT NULL DEFAULT '' ");		
		$this->dbforge->add_field("last_name  varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("email_address  varchar(255) NOT NULL DEFAULT '' ");
 		$this->dbforge->add_field("Mobile  int(11) unsigned NOT NULL ");
        $this->dbforge->add_key('id', TRUE);        
                   
        $this->dbforge->create_table('data', TRUE);
	

  }

  public function down()
  {
     $this->dbforge->drop_table('data');
  }
  }