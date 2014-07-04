<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_radiograph extends CI_Migration{
  public function up()
  {

		$this->dbforge->add_field("image_id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("photo_kind varchar(255) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("price Double NOT NULL DEFAULT 0");		
		$this->dbforge->add_key('image_id', TRUE);                           
        $this->dbforge->create_table('radiology', TRUE);

	
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("patient_id int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("patient_name varchar(255) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("image_id int(11) unsigned NOT NULL ");
        $this->dbforge->add_field("date date");
		$this->dbforge->add_field("section_name  varchar(255) NOT NULL DEFAULT '' ");
		$this->dbforge->add_field("comment varchar(255) NOT NULL DEFAULT '' ");	
		$this->dbforge->add_field("description mediumtext NOT NULL DEFAULT '' ");	
		$this->dbforge->add_field("part_of_body varchar(255) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("position varchar(255) NOT NULL DEFAULT ''");
		$this->dbforge->add_field("file_name varchar(255)  null");	
		$this->dbforge->add_field("file_path varchar(255) null");	
		$this->dbforge->add_field("state set('0','1','2') NOT NULL DEFAULT 0");		
		
			$this->dbforge->add_field(array(
			'out'=>array(
				'type'=>'BOOL',
			),
			'emergancy'=>array(
				'type'=>'BOOL',
			)));	
		$this->dbforge->add_key('id', TRUE);                           
        $this->dbforge->create_table('rad_request', TRUE);
        
		$new_member = array(
				'image_id ' => '1',
				'photo_kind' => " X-rays",
				'price' => '0',					
			);
		$insert = $this->db->insert('radiology', $new_member);
		
		$new_member = array(
				'image_id ' => '2',
				'photo_kind' => "Computed Tomography",
				'price' => '0',					
			);
		$insert = $this->db->insert('radiology', $new_member);
		
		$new_member = array(
				'image_id ' => '3',
				'photo_kind' => "Magnetic Resonance Imaging",
				'price' => '0',					
			);
		$insert = $this->db->insert('radiology', $new_member);
		
		$new_member = array(
				'image_id ' => '4',
				'photo_kind' => "Ultrasound",
				'price' => '0',					
			);
		$insert = $this->db->insert('radiology', $new_member);
		
		$new_member = array(
				'image_id ' => '5',
				'photo_kind' => "Nuclear Medicine",
				'price' => '0',					
			);
		$insert = $this->db->insert('radiology', $new_member);

		$new_member = array(
				'image_id ' => '6',
				'photo_kind' => "Invasive and Fluoroscopic Imaging",
				'price' => '0',					
			);
		$insert = $this->db->insert('radiology', $new_member);
		
				$new_member = array(
				'image_id ' => '7',
				'photo_kind' => "Mammography Screening",
				'price' => '0',					
			);
		$insert = $this->db->insert('radiology', $new_member);	
  }

  public function down()
  {
	$this->dbforge->drop_table('radiology');
	$this->dbforge->drop_table('rad_request');	

  }
}
