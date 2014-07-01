<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_patient_health_recored extends CI_Migration{
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

			'recored_name'=>array(
				'type'=>'TEXT'
			),

			'status'=>array(
				'type'=>'TEXT'
			),

			'category'=>array(
				'type'=>'VARCHAR',
				'constraint'=>20
			)
		));

		$this->dbforge->add_field("created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");

		$this->dbforge->add_field("last_edit timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");

		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->add_key('patient_id');

		$this->dbforge->create_table('patient_health_recored');
	}

	public function down(){
		$this->dbforge->drop_table('patient_health_recored');
	}
}