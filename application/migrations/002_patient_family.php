<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_patient_family extends CI_Migration{

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

			's_patient_id'=>array(
				'type'=>'INT',
				'constraint'=>10
			),

			'relationship'=>array(
				'type'=>'VARCHAR',
				'constraint'=>10
			)
		));

		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->add_key('patient_id');

		$this->dbforge->create_table('patient_family');
	}

	public function down(){
		$this->dbforge->drop_table('patient_family');
	}
}