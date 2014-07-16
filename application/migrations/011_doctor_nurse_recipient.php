<?php

class Migration_Doctor_nurse_recipient extends CI_Migration {
    public function up(){
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("fname varchar(20) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("lname varchar(20) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("avatar text DEFAULT '' ");
		$this->dbforge->add_field("department_id int(11)");
 		$this->dbforge->add_field("created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("last_edit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"); 	  	
 
        $this->dbforge->add_key('id', TRUE);        
       
        $this->dbforge->create_table('doctors', TRUE);
		
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("fname varchar(20) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("lname varchar(20) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("avatar text DEFAULT '' ");		
		$this->dbforge->add_field("department_id int(11)");
		$this->dbforge->add_field("available set('0','1') NOT NULL DEFAULT 1");
 		$this->dbforge->add_field("created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("last_edit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
 		
        $this->dbforge->add_key('id', TRUE);        
       
        $this->dbforge->create_table('nurses', TRUE);
        
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("fname varchar(20) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("lname varchar(20) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("avatar text DEFAULT '' ");		
 		$this->dbforge->add_field("created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("last_edit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
 		
        $this->dbforge->add_key('id', TRUE);        
       
        $this->dbforge->create_table('recipients', TRUE);
        

		// $query1 = "INSERT INTO `doctors` (`id`, `fname`, `lname` ,`department_id`) VALUES
			 // (1,'Eyad','Arnabeh',1),
		     // (2,'Amer','AlHosary',2),
		     // (3,'Luay','AlAssadi',3),
		     // (4,'mario','luigi',4);";
// 
		// $query2 = "INSERT INTO `nurses` (`id`, `fname`, `lname` ,`department_id`) VALUES
			 // (1,'Ahmad','AlHamoy',1),
		     // (2,'Amar','AlHelo',2),
		     // (3,'Amjad','AlKadry',3),
		     // (4,'pinky','brain',4);";
// 
		// $query3 = "INSERT INTO `nurses` (`id`, `fname`, `lname`) VALUES
			 // (1,'Hassan','AlMahros'),
		     // (2,'detective','conan');";		     		     		     		     		     
// 		
// 		     
		// mysql_query($query1);
		// mysql_query($query2);
		// mysql_query($query2);
                
    }
 
    public function down(){
        $this->dbforge->drop_table('doctors');
		$this->dbforge->drop_table('nurses');
		$this->dbforge->drop_table('recipients');
    }
}