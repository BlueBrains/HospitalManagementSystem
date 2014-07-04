<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url();?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">radiograph</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 12px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?php echo base_url();?>assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/homepage"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="<?php echo base_url(); ?>radiograph_supervisor/total_order_list"><i class="fa fa-desktop fa-3x"></i> ALL Requests</a>
                    </li>
                    <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/un_seen"><i class="fa fa-qrcode fa-3x"></i> Un Seen Requests</a>
                    </li>	
                    <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/order_list"><i class="fa fa-qrcode fa-3x"></i> Un Finished Requests</a>
                    </li>
                    <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/radiograph_external_request_done"><i class="fa fa-qrcode fa-3x"></i> Out Order Request</a>
                    </li>							 	
                      <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/order_list_implemented"><i class="fa fa-table fa-3x"></i> Implemented Request</a>
                    </li>
                    <li  >
                        <a class="active-menu"  href="<?php echo base_url(); ?>radiograph_supervisor/radiograph_external_request"><i class="fa fa-edit fa-3x"></i> Out Order Management </a>
                    </li>				
     				  <li>
                        <a   href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Section Activation</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">120 New</p>
                    <p class="text-muted">Messages</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">30 Tasks</p>
                    <p class="text-muted">Remaining</p>
                </div>
             </div>
		     </div>
             <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">2 New</p></br>
                    <p class="text-muted">Emergency Order</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">3 New</p></br>
                    <p class="text-muted">Out Orders</p>
                </div>
             </div>
             
		     </div>
			</div>
                 <!-- /. ROW  -->
                <hr />  	
	<script type="text/javascript">
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

<div class="col-md-6">	
<form name="myform" action="radiograph_external_request_sign" method="post">						
	  <div class='row' style="margin-bottom:20px">
		
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Patient Name*</button>
    			</span>
				<input type="text" name="patient_id" id="patient_id" class="form-control">
				
			</div>
			<span><?php if (isset($error)) echo '<p class = "error alert alert-danger">'.$error;?></span>
		</div>		
	<div class='row' style="margin-bottom:20px">	
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">image Type*</button>
    			</span>	
				<select class="form-control">
				    <option value="1">X-Ray</option>
				    <option value="2">Computed Tomography</option>
				    <option value="3">Magnetic Resonance Imaging</option>
				    <option value="4">Ultrasound</option>
				    <option value="5">Nuclear Medicine</option>
					<option value="6">Invasive and Fluoroscopic Imaging</option>
				    <option value="7">Mammography Screening</option>
				</select>
			</div>	
		</div>

	<div class='row' style="margin-bottom:20px" >	
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Part of Body*</button>
    			</span>
				<input type="text" name="part_of_body" id="part" class="form-control">
			</div>
	</div>		
	<div class='row' style="margin-bottom:20px" >	
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">position*</button>
    			</span>
				<input type="text" name="position" id="position" class="form-control">
			</div>
	</div>	
	
	<div class='row' style="margin-bottom:20px" >
			<button class="btn btn-default" type="button">Comment</button>
    		<textarea name="comment"cols="60" rows="4" class="form-control"></textarea>
    </div>		
    <div class='row' style="margin-bottom:20px" >
		<button type="button" class="btn btn-default btn-lg">
		  <span class="glyphicon glyphicon-pushpin"></span> 
		  
			 <div class="checkbox">
			    <label>
			      <input type="checkbox" name="checked"> Emergency Request
			    </label>
			  </div>				
		</button>
    </div>
    <div class='row' style="margin-bottom:20px" >		
			<button type="submit" class="btn btn-primary">Send Request </button>
	</div>

</div>
<div class="col-md-6">
			<div class="media">
				  <a class="pull-right" href="#">
				   		 <img class="media-object" src="<?php echo base_url();?>/images/bone.jpg" alt="HTML Map"  border="0" usemap="#tutorials"/>
				  </a>
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