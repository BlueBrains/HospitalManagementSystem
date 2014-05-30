<?php

class Migration_department_table extends CI_Migration {

  public function up()
  {
      $fields = array(
      "department_id int(11) NOT NULL ",
    );
    
    $this->dbforge->drop_column('doctors',"Department");
    $this->dbforge->add_column('doctors',$fields);
    
        $this->dbforge->add_field("department_id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("department_name varchar(255) NOT NULL DEFAULT ''");       
        $this->dbforge->add_key('department_id', TRUE);                           
        $this->dbforge->create_table('department', TRUE);
    
    
  }

  public function down()
  {
    $this->dbforge->add_column('doctors',"Department varchar(255) NOT NULL DEFAULT '' ");
    $this->dbforge->drop_column('doctors','department_id');
    $this->dbforge->drop_table('department');
  }
}

?>

