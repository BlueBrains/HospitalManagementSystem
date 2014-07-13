<?php
class Migration_ward_room_bed extends CI_Migration {
    public function up(){
        $this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("name varchar(25)");
		$this->dbforge->add_field("Features text CHARACTER SET utf8 ");
		$this->dbforge->add_field("price Double NOT NULL");
		
        $this->dbforge->add_key('id', TRUE);        
        $this->dbforge->create_table('ward', TRUE);
		
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("ward_id int(11) unsigned NOT NULL ");
		
		$this->dbforge->add_key('id', TRUE);        
        $this->dbforge->create_table('room', TRUE);
		
		$this->dbforge->add_field("id int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("room_id int(11) unsigned NOT NULL ");
		
		$this->dbforge->add_key('id', TRUE);        
        $this->dbforge->create_table('bed', TRUE);
		
		
		/*INSERT WARDS DATA*/
		
		$new_member = array(

				'name' => "Class C",
				'Features' => "9-bedded room , naturally ventilated",
				'price' => '35'					
			);
		$insert = $this->db->insert('ward', $new_member);
		
				$new_member = array(
		
				'name' => "Class B2",
				'Features' => "6-bedded room,
naturally ventilated,
individual ceiling fans,
semi-automated electric bed",
				'price' => '70'					
			);
		$insert = $this->db->insert('ward', $new_member);
		
				$new_member = array(
	
				'name' => "Class B2+",
				'Features' => "
    Air-conditioned 5-bedded room,
    attached bath room and toilet,
    semi-automated electric bed
",
				'price' => '140'					
			);
		$insert = $this->db->insert('ward', $new_member);
		
				$new_member = array(
	
				'name' => "Class B1",
				'Features' => "
    Air-conditioned 4-bedded room,
    attached bath room and toilet,
    television,
    telephone,
    semi-automated electric bed,
    choice of meals
",
				'price' => '226.84'					
			);
		$insert = $this->db->insert('ward', $new_member);
		
				$new_member = array(

				'name' => "Class A1",
				'Features' => "
    Air-conditioned single room,
    attached bath room and toilet,
    toiletries,
    television,
    telephone,
    fully automated electric bed,
    choice of meals,
    optional sleeper unit
",
				'price' => '396.97'					
			);
		$insert = $this->db->insert('ward', $new_member);
		
				$new_member = array(
		
				'name' => "Class A1+",
				'Features' => "A1 Featurs , Fully-carpeted ,Fully furnished with sofa bed ,mini fridge ",
				'price' => '422.65'					
			);
		$insert = $this->db->insert('ward', $new_member);
		
		
	/*INSERT Rooms DATA*/	
	for($i=1;$i<6;$i++){
		$new_member = array(

				'ward_id' => "1",				
			);
		$insert = $this->db->insert('room', $new_member);
		}
		
	for($i=6;$i<11;$i++){
		$new_member = array(
		
				'ward_id' => "2",				
			);
		$insert = $this->db->insert('room', $new_member);
		}
	for($i=11;$i<16;$i++){
		$new_member = array(
		
				'ward_id' => "3",				
			);
		$insert = $this->db->insert('room', $new_member);
		}
	for($i=16;$i<21;$i++){
		$new_member = array(
		
				'ward_id' => "4",				
			);
		$insert = $this->db->insert('room', $new_member);
		}
	for($i=21;$i<26;$i++){
		$new_member = array(
	
				'ward_id' => "5",				
			);
		$insert = $this->db->insert('room', $new_member);
		}
	for($i=26;$i<31;$i++){
		$new_member = array(
		
				'ward_id' => "6",				
			);
		$insert = $this->db->insert('room', $new_member);
		}
		/*INSERT Beds DATA*/
			
		for($i=1;$i<6;$i++){
		$new_member = array(
				'room_id' => 25+$i,				
			);
		$insert = $this->db->insert('bed', $new_member);
		}
		
	for($i=1;$i<6;$i++){
		$new_member = array(
				'room_id' => 20+$i,				
			);
		$insert = $this->db->insert('bed', $new_member);
		}
	for($i=0;$i<20;$i++){
		$new_member = array(
				'room_id' => 15+($i%5)				
			);
		$insert = $this->db->insert('bed', $new_member);
		}
	for($i=0;$i<25;$i++){
		$new_member = array(
				'room_id' => 10+($i%5)				
			);
		$insert = $this->db->insert('bed', $new_member);
		}
	for($i=0;$i<30;$i++){
		$new_member = array(
				'room_id' => 5+($i%5)				
			);
		$insert = $this->db->insert('bed', $new_member);
		}
	for($i=0;$i<45;$i++){
		$new_member = array(
				'room_id' => ($i%5)				
			);
		$insert = $this->db->insert('bed', $new_member);
		}
	
	/* INSERT NEW COLUMN FOR BED IN ENTRY TABLE*/
	
	$Fields = array( "bed int(11) unsigned NOT NULL");
	$this->dbforge->add_column('entries', $Fields);
	
	$Fields = array( "aider varchar(255) NOT NULL Default ''");
	$this->dbforge->add_column('entries', $Fields);
	$Fields = array( "doctor_name varchar(255) NOT NULL Default ''");
	$this->dbforge->add_column('entries', $Fields);
	$Fields = array( "doctor_phone int(11) unsigned");
	$this->dbforge->add_column('entries', $Fields);
	$Fields = array( "diagnosis text CHARACTER SET utf8 ");
	$this->dbforge->add_column('entries', $Fields);

	$Fields = array( "checkout Boolean NOT NULL Default 0 ");
	$this->dbforge->add_column('entries', $Fields);
	
	
	
	
	$Fields = array( "visit_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
	$this->dbforge->add_column('visit', $Fields);
	
																  
																
	$new_member = array(
				'name' => "pharmacy"				
			);
	$insert = $this->db->insert('department', $new_member);

	$new_member = array(
				'name' => "Accident and emergency"				
			);
	$insert = $this->db->insert('department', $new_member);

	$new_member = array(
				'name' => "Haematology"				
			);
		$insert = $this->db->insert('department', $new_member);
	$new_member = array(
				'name' => "Pain management clinics"				
			);
		$insert = $this->db->insert('department', $new_member);
	$new_member = array(
				'name' => "Ear nose and throat"				
			);
	$insert = $this->db->insert('department', $new_member);
					
	$new_member = array(
				'name' => "Obstetrics and Gynaecology"				
			);
	$insert = $this->db->insert('department', $new_member);	

	$new_member = array(
				'name' => "Intensive care unit (ICU)"				
			);
	$insert = $this->db->insert('department', $new_member);	

	$new_member = array(
				'name' => "RadioGraph"				
			);
	$insert = $this->db->insert('department', $new_member);	
		
	$new_member = array(
				'name' => "Analayser"				
			);
	$insert = $this->db->insert('department', $new_member);	

		
		
			
    }
	
 
    public function down(){
    	$this->db->empty_table('bed');
		$this->db->empty_table('ward');
		$this->db->empty_table('room');
		$this->db->empty_table('department');
		
		$this->dbforge->drop_column('entries','bed');
		$this->dbforge->drop_column('entries','diagnosis');
		$this->dbforge->drop_column('entries','aider');
		$this->dbforge->drop_column('entries','doctor_name');
		$this->dbforge->drop_column('entries','doctor_phone');
		$this->dbforge->drop_column('entries','checkout');
		
		$this->dbforge->drop_column('visit','visit_time');
		
        $this->dbforge->drop_table('bed');
		$this->dbforge->drop_table('ward');
		$this->dbforge->drop_table('room');
    }
}