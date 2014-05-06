<?php

class Migration_Update_Order_Medicine_Table extends CI_Migration {
    public function up(){
        $fields = array("caliber int(11) unsigned NOT NULL",
		"dose varchar(255) NOT NULL DEFAULT ''",
		"details text CHARACTER SET utf8 ");
 
		$this->dbforge->add_column('order_medicine',$fields);
    }
 
    public function down(){
        $this->dbforge->drop_column('order_medicine','caliber');
		$this->dbforge->drop_column('order_medicine','dose');
		$this->dbforge->drop_column('order_medicine','details');
    }
}