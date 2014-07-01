<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_basic_patient extends CI_Migration{
	public function up(){
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>10,
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


		$this->dbforge->add_field("created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");

		$this->dbforge->add_field("last_edit timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");

		$this->dbforge->add_key('id',TRUE);

		$this->dbforge->create_table('patients',TRUE);
	}	

	public function down(){
		$this->dbforge->drop_table('patients');
	}
}