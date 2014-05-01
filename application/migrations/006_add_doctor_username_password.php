<?php

class Migration_Add_Password_To_Patients extends CI_Migration {

  public function up()
  {
    $fields = array(
      "password varchar(255) NOT NULL DEFAULT ''",
      "username varchar(255) NOT NULL DEFAULT ''",
    );
	$sign_up_fields = array(
      "password varchar(255) NOT NULL DEFAULT ''",
      "username varchar(255) NOT NULL DEFAULT ''",
      "first_name varchar(255) NOT NULL DEFAULT ''",
      "last_name varchar(255) NOT NULL DEFAULT ''",
      "email_address varchar(255) NOT NULL DEFAULT ''",
      "Mobile  int(16) unsigned NOT NULL DEFAULT ''"
    );

    $this->dbforge->add_column('doctors', $fields);
	$this->dbforge->add_column('data', $sign_up_fields);
	
  }

  public function down()
  {
    $this->dbforge->drop_column('doctors', 'password');
	$this->dbforge->drop_column('doctors', 'username');
	$this->dbforge->drop_column('data', 'password');
	$this->dbforge->drop_column('data', 'username');
	$this->dbforge->drop_column('data', 'first_name');
	$this->dbforge->drop_column('data', 'last_name');
	$this->dbforge->drop_column('data', 'email_address');
	$this->dbforge->drop_column('data', 'Mobile');
  }
  }