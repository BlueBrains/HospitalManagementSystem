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
  document.myform.show.showtext.value = name
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
<form name="myform" action="send_req" method="post">
	<div class="panel panel-info">
		<div class="panel-heading">
    		<h3 class="panel-title">Doctor Information</h3>
  		</div>
			<div class="panel-body">
    			<div class="col-md-4">	
    			<div class="input-group">
    			<span class="input-group-btn">
					<button class="btn btn-default" type="button">Doctor Name       : </button>
    			</span>
				<input type="text" class="form-control" readonly="TRUE" value="<?php echo $nam; ?>">
			</div>
			</div>
			<div class="col-md-6">
    		<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Doctor Department :</button>
    			</span>
				<input type="text" readonly="TRUE" value="<?php echo $dep; ?>" class="form-control">
			</div>
			</div>
		</div>		
	</div>	
	
							
	  <div class='row' style="margin-bottom:20px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Patient ID*</button>
    			</span>
				<input type="text" name="patient_id" id="patient_id" class="form-control">
				
			</div>
			<span><?php if (isset($error)) echo '<p class = "error alert alert-danger">'.$error;?></span>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<label > <span>image Type*</span>	</br>																		
									<input type="radio" name="image_id" value="1" checked="true">
									<label for="1">X-Ray</label>	
									
									<input type="radio" name="image_id" value="2" >
									<label for="2">Ranen</label>
									
									<input type="radio" name="image_id" value="3" >
									<label for="3">Echo</label>
									</label> </br>
			</div>
		</div>
	 </div>	

	<div class='row' style="margin-bottom:40px" >
		<div style="margin-right:120px">	
		<div class="col-md-4">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Part of Body*</button>
    			</span>
				<input type="text" name="part_of_body" id="part" class="form-control">
			</div>
		</div>
	</div>
	<div style="margin-right:120px">	
		<div class="col-md-4">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">position*</button>
    			</span>
				<input type="text" name="position" id="position" class="form-control">
			</div>
		</div>	
	</div>	
	

	</div>
	<div class="row">
					
		<div class="col-md-6" style="margin-right:120px">
			<button class="btn btn-default" type="button">Comment</button>
    		<textarea name="comment"cols="60" rows="4" class="form-control"></textarea>
		</div>
		
			<div class="col-md-4">
			<div class="media">
				  <a class="pull-right" href="#">
				   		 <img class="media-object" src="<?php echo base_url();?>/images/bone.jpg" alt="HTML Map"  border="0" usemap="#tutorials"/>
				  </a>
			</div>	
		</div>
		<div class="col-md-6" style="margin-right:20px">
			<button type="submit" class="btn btn-primary">Send Request </button>
		</div>	
		
		
	</div>


</div>

</form>
<!--	<form name="show" id="show">
		<input type="text" name="showtext" id="showtext">
	</form>
-->

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