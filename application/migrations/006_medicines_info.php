<?php

class Migration_Medicines_Info extends CI_Migration {

  public function up()
  {
    $fields = array(
      "price INT(5) NULL",
      "unit_per_packing INT(2) NULL",
      "packing_per_unitpacking INT(2) NULL ",
      "med_group VARCHAR(20)"
    );
    $this->dbforge->add_column('medicines',$fields);
  }

  public function down()
  {
    $this->dbforge->drop_column('medicines','price');
    $this->dbforge->drop_column('medicines','unit_per_packing');
    $this->dbforge->drop_column('medicines','packing_per_unitpacking');
    $this->dbforge->drop_column('medicines','med_group');
  }
}

?>