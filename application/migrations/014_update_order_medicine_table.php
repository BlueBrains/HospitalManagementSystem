<?php

class Migration_Update_Order_Medicine_Table extends CI_Migration {
    public function up(){
        $fields = array("confirmed TINYINT(1) UNSIGNED NOT NULL DEFAULT 0");
 
		$this->dbforge->add_column('order_medicine',$fields);
    }
 
    public function down(){
        $this->dbforge->drop_column('order_medicine','confirmed');
    }
}


