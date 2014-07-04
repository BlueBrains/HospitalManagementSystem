<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_basic_patient extends CI_Migration{
	public function up(){
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),

			'lname'=>array(
				'type'=>'varchar',
				'constraint'=>20
			),

			'fname'=>array(
				'type'=>'varchar',
				'constraint'=>20
			),

			'avatar'=>array(
				'type'=>'text',
				'null'=>TRUE
			),

			'date_of_birth'=>array(
				'type'=>'datetime'
			),

			'n_town'=>array(
				'type'=>'varchar',
				'constraint'=>20
			),

			'n_country'=>array(
				'type'=>'varchar',
				'constraint'=>3
			),

			'person_id'=>array(
				'type'=>'int',
				'constraint'=>12
			),

			'recored_number'=>array(
				'type'=>'int',
				'constraint'=>10
			),

			'language'=>array(
				'type'=>'varchar',
				'constraint'=>4
			),

			'marital_status'=>array(
				'type'=>'tinyint',
				'constraint'=>1
			),

			'comments'=>array(
				'type'=>"text",
				'null'=>TRUE
			)
		));


<<<<<<< HEAD
		$this->dbforge->add_field("created datetime NOT NULL DEFAULT 0");
=======
		$this->dbforge->add_field("created datetime NOT NULL DEFAULT NOW()");
>>>>>>> 69d61dbf83a01abd80922f767519984e638ddf40

		$this->dbforge->add_field("last_edit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");

		$this->dbforge->add_key('id',TRUE);

		$this->dbforge->create_table('patients',TRUE);
		$query = "CREATE TRIGGER `MyTable_INSERT` BEFORE INSERT ON `patients` FOR EACH ROW SET new.created = now();";
		mysql_query($query);		
	}	


	public function down(){
		$this->dbforge->drop_table('patients');
	}

}