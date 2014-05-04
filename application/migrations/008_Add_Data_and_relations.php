<?php

class Migration_Add_Data_and_relations extends CI_Migration {

  public function up()
  {
    $fields = array(
      "Data_id INT(11) NULL",
    );
	$docfields = array(
      "Data_id INT(11) NULL",
      "Certificate_id INT(11) NULL",
      "Department varchar(255) NOT NULL DEFAULT '' "
    );
	
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("University varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("Section  varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("Date_honored varchar(255) NOT NULL DEFAULT '' ");		
		$this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('certificates', TRUE);
	
    $this->dbforge->add_column('doctors',$docfields);
	$this->dbforge->add_column('patients',$fields);
  }

  public function down()
  {
	$this->dbforge->drop_table('certificates');
    $this->dbforge->drop_column('doctors','Data_id');
	$this->dbforge->drop_column('doctors','Certificate_id');
	$this->dbforge->drop_column('doctors','Department');	
    $this->dbforge->drop_column('patients','Data_id');

  }
}

?>