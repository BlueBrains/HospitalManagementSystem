<?php
class Migration_analyse_DB extends CI_Migration {

  public function up()
  {
      $this->dbforge->add_field("catagoury_id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("catagoury_name varchar(255) NOT NULL DEFAULT ''");       
        $this->dbforge->add_key('catagoury_id', TRUE);                           
        $this->dbforge->create_table('catagoury', TRUE);

        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("analyse_name varchar(255) NOT NULL DEFAULT ''");  
        $this->dbforge->add_field("catagoury_id int(11) NOT NULL ");     
        $this->dbforge->add_field("Sample_required VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ");
        $this->dbforge->add_field("required_time VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ");
        $this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('analyse', TRUE);
        
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("patient_id int(11) unsigned NOT NULL ");
        $this->dbforge->add_field("analyse_id int(11) unsigned NOT NULL ");
        $this->dbforge->add_field("date varchar(255) NOT NULL DEFAULT ''");
        $this->dbforge->add_field("doctor_id  int(11) unsigned NOT NULL ");
        $this->dbforge->add_field("comment varchar(255) NOT NULL DEFAULT '' "); 
        $this->dbforge->add_field(" state BOOLEAN NOT NULL");
        $this->dbforge->add_field("description mediumtext NULL DEFAULT '' ");   
       $this->dbforge->add_field("result_date DATE NULL");
        $this->dbforge->add_field("file_size int  null");   
        $this->dbforge->add_field("file_data LONGBLOB NULL");   
        $this->dbforge->add_field("mime_type varchar(255) null");
        $this->dbforge->add_field("name varchar(255) null");            
        $this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('analyse_request', TRUE);
    
  }

  public function down()
  {
<<<<<<< HEAD
    $this->dbforge->drop_table('analyse');
    $this->dbforge->drop_table('catagoury');
    $this->dbforge->drop_table('analyse_request');  
=======
      $this->dbforge->drop_table('analyse_request');
       $this->dbforge->drop_table('analyse');  
       $this->dbforge->drop_table('catagoury');
       
       
   
    
>>>>>>> 81088816246b6c2bc577c9fb888e8509d0872440

  }
}

?>