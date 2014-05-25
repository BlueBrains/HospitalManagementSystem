<?php
class Migration_radiology_DB extends CI_Migration {

  public function up()
  {

		$this->dbforge->add_field("image_id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("photo_kind varchar(255) NOT NULL DEFAULT ''");		
		$this->dbforge->add_key('image_id', TRUE);                           
        $this->dbforge->create_table('radiology', TRUE);



		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("patient_id int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("image_id int(11) unsigned NOT NULL ");
        $this->dbforge->add_field("date varchar(255) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("section_name  varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("comment varchar(255) NOT NULL DEFAULT '' ");	
		$this->dbforge->add_field("description mediumtext NOT NULL DEFAULT '' ");	
		$this->dbforge->add_field("part_of_body varchar(255) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("position varchar(255) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("file_size int  null");	
		$this->dbforge->add_field("file_data longblob null");	
		$this->dbforge->add_field("mime_type varchar(255) null");
		$this->dbforge->add_field("name varchar(255) null");	
		$this->dbforge->add_field("checked boolean NOT NULL DEFAULT false");		
		$this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('request', TRUE);
	
  }

  public function down()
  {
	$this->dbforge->drop_table('radiology');
	$this->dbforge->drop_table('request');	

  }
}



