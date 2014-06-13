<?php

class Migration_Add_Date_Ordermed extends CI_Migration {
    public function up(){        
        $fields = array(
     	 "date TIMESTAMP DEFAULT NOW()"
    	);

    $this->dbforge->add_column('order_medicine', $fields);


    }
 
    public function down(){
        $this->dbforge->drop_column('order_medicine', 'date');
    }
}