<?php
class Migration_admin_db extends CI_Migration {

  public function up()
  {

		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("name varchar(255) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("password varchar(255) NOT NULL DEFAULT ''");	
		$this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('admin', TRUE);

  }

  public function down()
  {
	$this->dbforge->drop_table('admin');
  }
}



