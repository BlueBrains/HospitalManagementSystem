<?php

class Migration_Add_Password_To_Patients extends CI_Migration {

  public function up()
  {
    $fields = array(
      "password varchar(255) NOT NULL DEFAULT ''"
    );

    $this->dbforge->add_column('patients', $fields);
  }

  public function down()
  {
    $this->dbforge->drop_column('patients', 'password');
  }

}