<?php

class Migration_Add_Info_To_Doctors extends CI_Migration {

	  public function up()
	  {
		$patientsFields= array( 
		  "firstName varchar(255) NOT NULL DEFAULT ''",
	      "lastName varchar(255) NOT NULL DEFAULT ''",
		  "birthdate date NOT NULL",
		  "country varchar(25) CHARACTER SET utf8 NOT NULL",
		  "city varchar(25) CHARACTER SET utf8 NOT NULL",
		  "address varchar(255) CHARACTER SET utf8 NOT NULL",
		  "phone varchar(40) NOT NULL",
		  "mobile varchar(40) NOT NULL",
		  "emergencyPhone1 varchar(50) NOT NULL",
		  "emergencyPhone2 varchar(50) NOT NULL",
		  "chronicDiseases text CHARACTER SET utf8 NOT NULL",
		  "addiction text CHARACTER SET utf8 NOT NULL",
		  "bloodGroup varchar(10) NOT NULL",
		  "tallness int(11) NOT NULL");	  
		  
		$doctorsFields = array(
	      "password varchar(255) NOT NULL DEFAULT ''",	   
	      "firstName varchar(255) NOT NULL DEFAULT ''",
	      "lastName varchar(255) NOT NULL DEFAULT ''",
	      "emailAddress varchar(255) NOT NULL DEFAULT ''",
	      "mobile varchar(40) NOT NULL"
	    );	
			   
		$this->dbforge->add_column('patients', $patientsFields);
		$this->dbforge->add_column('doctors', $doctorsFields);
	  }
	
	  public function down()
	  {
	    $this->dbforge->drop_column('doctors','password');
		$this->dbforge->drop_column('doctors','firstName');
		$this->dbforge->drop_column('doctors','lastName');
		$this->dbforge->drop_column('doctors','emailAddress');
		$this->dbforge->drop_column('doctors','mobile');
		
		$this->dbforge->drop_column('patients','firstName');
		$this->dbforge->drop_column('patients','lastName');
		$this->dbforge->drop_column('patients','birthdate');
		$this->dbforge->drop_column('patients','country');
		$this->dbforge->drop_column('patients','city');
		$this->dbforge->drop_column('patients','address');
		$this->dbforge->drop_column('patients','phone');
		$this->dbforge->drop_column('patients','mobile');
		$this->dbforge->drop_column('patients','emergencyPhone1');
		$this->dbforge->drop_column('patients','emergencyPhone2');
		$this->dbforge->drop_column('patients','chronicDiseases');
		$this->dbforge->drop_column('patients','addiction');
		$this->dbforge->drop_column('patients','bloodGroup');
		$this->dbforge->drop_column('patients','tallness');
	  }
  }

