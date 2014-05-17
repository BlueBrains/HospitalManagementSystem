<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Blog - Laboratory Website Template</title>
	<script src="<?php echo base_url();?>/js/jquery.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css">
	  <link type="text/css" href="<?php echo base_url();?>/css/menu.css" rel="stylesheet" />
	<script type="text/javascript">
$(document).ready(function() {
$('#menu1').hide();
$('#menu2').hide();
$('#menu3').hide();
$('#menu4').hide();
$('#menu5').hide();
$('#menu6').hide();
$('#menu7').hide();
$('#menu8').hide();
$('#menu9').hide();
}
);
function showTutorial(name){
  document.show.show.value = name
}
function set(name){
  document.myform.part.value = name
  	if (name=="Skull")
    $('#menu1').toggle('slow');
else if (name=="Shoulders")
	$('#menu2').toggle('slow');
else if (name=="Chest")
	$('#menu3').toggle('slow');
else if (name=="Abdomen")
	$('#menu4').toggle('slow');	
else if (name=="Pelvis")
	$('#menu5').toggle('slow');	
else if (name=="Mammo")
	$('#menu6').toggle('slow');
else if (name=="Uper Extremities")
	$('#menu7').toggle('slow');
else if (name=="Lower Extremities")
	$('#menu8').toggle('slow');
else if (name=="Spine")
	$('#menu9').toggle('slow');	
}

</script>
</head>
<body>
						<p>
							<form name="myform" action="send_req" method="post">
									<label for="Patient ID"> <span>Patient ID*</span>
									<input type="text" name="patient_id" id="ID"></br>
									<label > <span>image Type*</span>	</br>																		
									<input type="radio" name="image_id" value="1" checked="true">
									<label for="1">X-Ray</label>	
									
									<input type="radio" name="image_id" value="2" >
									<label for="2">Ranen</label>
									
									<input type="radio" name="image_id" value="3" >
									<label for="3">Echo</label>
									</label> </br>
									<label for="Photo Kind"> <span>Section name</span>
									<input type="text" name="section_name" id="Section_name">
									</label></br>
									<label for="Part"> <span>Part of Body*</span>
									<input type="text" name="part_of_body" id="part" readonly="readonly">
									</label></br>
									<label for="position"> <span>position*</span>
									<input type="text" name="position" id="position" readonly="readonly">
									</label></br>
									<label for="Section Name"> <span>Section Name*</span>
									<input type="text" name="sec" id="sec">
									</label></br>
									<label for="Comment"> <span>Comment</span>
									<textarea name="comment" id="comment" cols="30" rows="10"></textarea>
									</label>
								<input type="submit" name="send" id="submit">
							</form>
						</p>
	<div id="menu">
	 <menu id="menu1" name="S1" >
			<ul class="menu">
				<li><a  class="parent"><span>SKULL</span></a>
					<div><ul>
                        <li><a ><span>SKull AP</span></a></li>
                        <li><a><span>Skull PA</span></a></li>
                        <li><a><span>SKull LAT</span></a></li>
                        <li><a><span>SKull 3/4</span></a></li>
						<li><a><span>Orbita AP</span></a></li>
                        <li><a><span>Orbita PA</span></a></li>
                        <li><a><span>Orbita 3/4</span></a></li>
                        <li><a><span>OPG</span></a></li>
						<li><a><span>Nasal Bone</span></a></li>
                        <li><a><span>Sinus AP</span></a></li>
                        <li><a><span>Sinus PA</span></a></li>
                        <li><a><span>Sinus LAT</span></a></li>
						<li><a><span>Mastoid</span></a></li>
                        <li><a><span>Mandibula</span></a></li>
                        <li><a><span>Cephalogram PA</span></a></li>
                        <li><a><span>Cephalogram LAT</span></a></li>
                        <li><a><span>TMJ open mouth</span></a></li>
                        <li><a><span>TMJ closed mouth </span></a></li>
						</ul></div>
				</li>	
			</ul>
 </menu>
 </div>
		<div id="menu">
			 <menu id="menu2" name="S1" >
					<ul class="menu">
						<li><a  class="parent"><span>Shoulder</span></a>
							<div><ul>
								<li><a ><span>Clavical AP</span></a></li>
								<li><a><span>Clavical AX</span></a></li>
								<li><a><span>Scapular AP</span></a></li>
								<li><a><span>Scapular Y</span></a></li>
								<li><a><span>Scapular Lat</span></a></li>
								<li><a><span>Shoulder AP</span></a></li>
								<li><a><span>Shoulder AP ER</span></a></li>
								<li><a><span>Shoulder AP IR</span></a></li>
								<li><a><span>Shoulder PR</span></a></li>
								<li><a><span>Shoulder Axiaal</span></a></li>
								<li><a><span>Shoulder Transthoracic</span></a></li>
								<li><a><span>Shoulder Abduction</span></a></li>
								<li><a><span>ACJ AP</span></a></li>
								<li><a><span>ACJ AP with weight</span></a></li>
								</ul></div>
						</li>	
					</ul>
		 </menu>
		 </div>
		 <div id="menu">
			 <menu id="menu3" name="S1" >
					<ul class="menu">
						<li><a  class="parent"><span>Chest</span></a>
							<div><ul>
								<li><a ><span>Chest AP</span></a></li>
								<li><a><span>Chest PA</span></a></li>
								<li><a><span>Chest LAT</span></a></li>
								<li><a><span>Chest on bed AP </span></a></li>
								<li><a><span>Ribs upper</span></a></li>
								<li><a><span>Ribs Lower</span></a></li>
								<li><a><span>Trachea AP</span></a></li>
								<li><a><span>Trachea Lat</span></a></li>
								<li><a><span>Sterrum AP</span></a></li>
								<li><a><span>Sterrum Lat</span></a></li>
								<li><a><span>Stemo Clav. Gewr.</span></a></li>
								</ul></div>
						</li>	
					</ul>
		 </menu>
		 </div>
		 <div id="menu">
			 <menu id="menu4" name="S1" >
					<ul class="menu">
						<li><a  class="parent"><span>Abdomen</span></a>
							<div><ul>
								<li><a ><span>Abdomen AP</span></a></li>
								<li><a><span>Abdomen LAT</span></a></li>
								<li><a><span>Abdomen procubitus</span></a></li>
								<li><a><span>Abdomen LAT Dec</span></a></li>
								</ul></div>
						</li>	
					</ul>
		 </menu>
		 </div>
		<div id="menu">
			 <menu id="menu5" name="S1" >
					<ul class="menu">
						<li><a  class="parent"><span>Pelvis</span></a>
							<div><ul>
								<li><a ><span>Pelvis AP</span></a></li>
								<li><a><span>Pelvis Inlet</span></a></li>
								<li><a><span>Pelvis Outlet</span></a></li>
								<li><a><span>Pelvitremie</span></a></li>
								<li><a><span>Hib AP</span></a></li>
								<li><a><span>Hib AX</span></a></li>
								<li><a><span>Hib LAT</span></a></li>
								<li><a><span>Pubis</span></a></li>
								<li><a><span>SU</span></a></li>
								<li><a><span>Pelvis Loweristan </span></a></li>
								</ul></div>
						</li>	
					</ul>
		 </menu>
		 </div>
		<div id="menu">
			 <menu id="menu6" name="S1" >
					<ul class="menu">
						<li><a  class="parent"><span>Mammo</span></a>
							<div><ul>
								<li><a  class="parent"><span>Right</span></a>
									<div><ul>
										<li><a ><span>R-CC</span></a></li>
										<li><a><span>R-MLO</span></a></li>
										<li><a><span>R-ML</span></a></li>
										<li><a><span>R-Xcc</span></a></li>
										<li><a><span>Mag R</span></a></li>
										<li><a><span>Spot R</span></a></li>
										<li><a><span>Implant R-CC</span></a></li>
										<li><a><span>Implant Displ R-CC</span></a></li>
										<li><a><span>Implant R-MLO</span></a></li>
									</ul></div>
								</li>
								<li><a  class="parent"><span>Left</span></a>
									<div><ul>
										<li><a><span>L-CC</span></a></li>
										<li><a><span>L-MLO</span></a></li>
										<li><a><span>L-ML</span></a></li>
										<li><a><span>L-Xcc</span></a></li>
										<li><a><span>Mag L</span></a></li>
										<li><a><span>Spot L</span></a></li>
										<li><a><span>Implant L-CC</span></a></li>
										<li><a><span>Implant Displ L-CC</span></a></li>
										<li><a><span>Implant L-MLO</span></a></li>						
								</ul></div>
								</li>
								<li><a><span>Stereotaxy</span></a></li>
								<li><a><span>Needle Specimen</span></a></li>
								<li><a><span>Sugical Specimen </span></a></li>
								</ul></div>
						</li>	
					</ul>
		 </menu>
		 </div>
		<div id="menu">
			 <menu id="menu7" name="S1" >
					<ul class="menu">
						<li><a  class="parent"><span>Upper Extremities</span></a>
							<div><ul>
								</ul></div>
						</li>	
					</ul>
		 </menu>
		 </div>
		<div id="menu">
			 <menu id="menu8" name="S1" >
					<ul class="menu">
						<li><a  class="parent"><span> Lower Extremities</span></a>
							<div><ul>
								</ul></div>
						</li>	
					</ul>
		 </menu>
		 </div>
				<div id="menu">
			 <menu id="menu9" name="S1" >
					<ul class="menu">
						<li><a  class="parent"><span>Spine</span></a>
							<div><ul>
								</ul></div>
						</li>	
					</ul>
		 </menu>
		 </div> 
        <div class="content">
			<div class="archive">
<!-- Create  Mappings -->
<img src="<?php echo base_url();?>/images/bone.jpg" alt="HTML Map" 
        border="0" usemap="#tutorials"/>
<form name="show" action="send" method="post">
	<input type="text" name="show" id="show">
</form>
<map name="tutorials">
   <area shape="rect" 
            coords="91,5,154,75"
            target="_self" 
            onMouseOver="showTutorial('Skull')"
onmousedown="set('Skull')"			
            />

	<area shape="rect" 
            coords="50,97,214,133"
            target="_self" 
            onMouseOver="showTutorial('Shoulders')"
onmousedown="set('Shoulders')"			
            />
<area shape="poly" 
            coords="99,106,158,110,180,168,128,204,74,167"
            target="_self" 
            onMouseOver="showTutorial('Chest')"
onmousedown="set('Chest')"			
            />	
<area shape="poly" 
            coords="76,233,182,234,147,306,104,306"
            target="_self" 
            onMouseOver="showTutorial('Pelvis')"
onmousedown="set('Pelvis')"			
            />	
<area shape="poly" 
            coords="92,213,109,234,146,234,160,221,129,200"
            target="_self" 
            onMouseOver="showTutorial('Abdomen')"
onmousedown="set('Abdomen')"			
            />				
<area shape="rect" 
            coords="54,112,67,219"
            target="_self" 
            onMouseOver="showTutorial('Upper Extremities')"
onmousedown="set('Uper Extremities')"			
            />
<area shape="rect" 
            coords="12,220,49,343"
            target="_self" 
            onMouseOver="showTutorial('Upper Extremities')"
onmousedown="set('Uper Extremities')"			
            />
<area shape="rect" 
            coords="182,111,214,212"
            target="_self" 
            onMouseOver="showTutorial('Upper Extremities')" 
            onmousedown="set('Uper Extremities')"
			/>
<area shape="rect" 
            coords="186,219,250,347"
            target="_self" 
            onMouseOver="showTutorial('Upper Extremities')" 
			onmousedown="set('Uper Extremities')"
            />			
<area shape="rect" 
            coords="70,279,95,553"
            target="_self" 
            onMouseOver="showTutorial('Lower Extremities')" 
            onmousedown="set('Lower Extremities')"
			/>
<area shape="rect" 
            coords="158,290,212,557"
            target="_self" 
            onMouseOver="showTutorial('Lower Extremities')"
onmousedown="set('Lower Extremities')"			
            />			
<area shape="rect" 
            coords="241,76,270,283"
            target="_self" 
            onMouseOver="showTutorial('Spine')" 
			onmousedown="set('Spine')"
            />
<area shape="circle" 
            coords="250,48,14"
	        target="_self" 
            onMouseOver="showTutorial('Mammo')" 
			onmousedown="set('Mammo')"
            />			
</map>
			</div>
		<div>
</div>		
</div>		

</body>
</html>