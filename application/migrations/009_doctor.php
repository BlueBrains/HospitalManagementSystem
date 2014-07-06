<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_doctor extends CI_Migration
{
	public function up()
	{
		 $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("fname varchar(55) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("lname varchar(50) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("department_id int(11) unsigned NOT NULL");
        //$this->dbforge->add_field("password varchar(255) NOT NULL DEFAULT ''");
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('doctors', TRUE);
	}
	public function down()
	{
		 $this->dbforge->drop_table('doctors');
	}
}
?>
