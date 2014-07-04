<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_private_patient extends CI_Migration { 

	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array(
				'type'=>'INT',
				'constraint'=>10,
				'unsigned'=>TRUE,
				'auto_increment'=>TRUE
			),

			'patient_id'=>array(
				'type'=>'INT',
				'constraint'=>10
			),

			'address'=>array(
				'type'=>'TEXT',
				'null'=>TRUE
			),

			'province'=>array(
				'type'=>'VARCHAR',
				'constraint'=>10
			),

			'c_country'=>array(
				'type'=>'VARCHAR',
				'constraint'=>3
			),

			'email'=>array(
				'type'=>'VARCHAR',
				'constraint'=>25,
				'null'=>TRUE
			),

			'phone'=>array(
				'type'=>'INT',
				'constraint'=>13,
				'null'=>TRUE
			),

			'cell'=>array(
				'type'=>'INT',
				'constraint'=>13,
				'null'=>TRUE
			),

			'position'=>array(
				'type'=>'TEXT',
				'null'=>TRUE
			),

			'company'=>array(
				'type'=>'TEXT',
				'null'=>TRUE
			),

			'comments'=>array(
				'type'=>'TEXT',
				'null'=>TRUE
			)
		));

<<<<<<< HEAD
		$this->dbforge->add_field("created datetime NOT NULL DEFAULT 0");
=======
		$this->dbforge->add_field("created datetime NOT NULL DEFAULT NOW()");
>>>>>>> 69d61dbf83a01abd80922f767519984e638ddf40

		$this->dbforge->add_field("last_edit timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");

		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->add_key('patient_id');

		$this->dbforge->create_table('patient_private_info');
		$query = "CREATE TRIGGER `info_INSERT` BEFORE INSERT ON `patient_private_info` FOR EACH ROW SET new.created = now();";
		mysql_query($query);		
	}

	public function down(){
		$this->dbforge->drop_table('patient_private_info');
	}
}