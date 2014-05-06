<?php

class Migration_Add_Data_and_relations extends CI_Migration {

  public function up()
  {
	$docfields = array(
      "Certificate_id INT(11) NULL",
      "Department varchar(255) NOT NULL DEFAULT '' "
    );
	
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("university varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("section  varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("dateHonored varchar(255) NOT NULL DEFAULT '' ");		
		
		$this->dbforge->add_key('id', TRUE);                           
        
        $this->dbforge->create_table('certificates', TRUE);
	
    $this->dbforge->add_column('doctors',$docfields);
  }

  public function down()
  {
	$this->dbforge->drop_table('certificates');
	$this->dbforge->drop_column('doctors','certificate_id');
	$this->dbforge->drop_column('doctors','department');	

  }
}

?>