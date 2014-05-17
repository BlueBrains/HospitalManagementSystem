<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url();?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/css/bootstrap/js/bootstrap.min.js"></script>
</head>
<ul class="nav nav-tabs">
  <li class="active"><a href="add_doctor">Doctor</a></li>
  <li><a href="<?php echo base_url();?>login/add_paitent">Patient</a></li>
</ul>
	<div class="page-header">
  		<h1>personal information<small> add this info please</small></h1>
	</div>
	
	<?php echo form_open('login/create_member/2');?>
	
	<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">first name*</button>
    			</span>
					<input type="text" name="first_name" id="first_name" class="form-control">
			</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">last name*</button>
    			</span>
					<input type="text" name="last_name" id="last_name" class="form-control">
    		</div>
		</div>
	</div>
		<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">username*</button>
    			</span>
				<input type="text" name="name" id="name" class="form-control">
			</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">password*</button>
    			</span>
				<input type="password" name="password" id="password" class="form-control">
			</div>
		</div>
	 </div>	
	 <div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Email Address</button>
    			</span>
					<input type="email" name="email" id="email" class="form-control">
    		</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Department</button>
    			</span>
					<input type="text" name="department" id="department" class="form-control">
    			</div>
			</div>
		</div>
 	<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Certificate</button>
    			</span>
					<input type="text" name="certificate" id="certificate" class="form-control">
    		</div>
		</div>
	</div>	
 
	
	<div class="row" style="margin-bottom:50px">
		<div class='col-sm-2'>
			<button class="btn btn-lg btn-primary" type="submit">Submit</button>
		</div>
	</div>
	<?php 
    	echo form_close(); 
		echo validation_errors('<p class = "error alert alert-danger">');
    ?>