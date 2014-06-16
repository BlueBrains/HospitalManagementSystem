<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url();?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/css/bootstrap/js/bootstrap.min.js"></script>
</head>
<ul class="nav nav-tabs">
    <li class="active"><a href="add_patient">Patient</a></li>	
  	<li ><a href="<?php echo base_url();?>login/add_doctor">Doctor</a></li>
</ul>
	<div class="page-header">
  		<h1>personal information<small> add this info please</small></h1>
	</div>
	
	<?php echo form_open('login/create_member/1');?>
	<div class="panel panel-success">
  		<div class="panel-heading" id="subtitle">Civil INFO</div>
  			<div class="panel-body">
  
	<div class='row' style="margin-bottom:50px">
		<div class="col-md-4">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">first name*</button>
    			</span>
					<input type="text" name="first_name" id="first_name" class="form-control">
			</div>
		</div>
		<div class="col-md-4">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">last name*</button>
    			</span>
					<input type="text" name="last_name" id="last_name" class="form-control">
    		</div>
		</div>
		<div class="col-md-4">
			<div class="input-group">
				<span class="input-group-btn">
						<button class="btn btn-default" type="button">Gender*</button>
    			</span>
    		</div>	
    			<div class="col-md-2">
					<div class="radio-inline"> 	
				        <label>
				          <input type="radio" name="ID" id="optionsRadios1" value="male" checked> Male
				        </label>
			        </div>
			        <div class="radio-inline">
				        <label>
				          <input type="radio" name="ID" id="optionsRadios2" value="female"> Female
				        </label>
			        </div>
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
					<button class="btn btn-default" type="button">Birth date*</button>
    			</span>
					<input type="date" name="birthdate" id="birthdate" class="form-control">
    		</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Country*</button>
    			</span>
					<input type="text" name="country" id="country" class="form-control">
    			</div>
			</div>
		</div>
 	<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">city*</button>
    			</span>
					<input type="text" name="city" id="city" class="form-control">
    		</div>
		</div>
				<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">address</button>
    			</span>
					<input type="text" name="address" id="address" class="form-control">
    			</div>
			</div>
		</div>
	 	<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">phone</button>
    			</span>
					<input type="text" name="phone" id="phone" class="form-control">
    		</div>
		</div>
				<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">mobile*</button>
    			</span>
					<input type="text" name="mobile" id="mobile" class="form-control">
    			</div>
			</div>
		</div>
		 	<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Emergencey Phone 1</button>
    			</span>
					<input type="text" name="emergenceyPhone1" id="emergenceyPhone1" class="form-control">
    		</div>
		</div>
				<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Emergencey Phone 2</button>
    			</span>
					<input type="text" name="emergenceyPhone2" id="emergenceyPhone2" class="form-control">
    			</div>
			</div>
		</div>
	</div>
	</div>
	<div class="panel panel-info">
 	 <div class="panel-heading" id="subtitle">Medical INFO</div>
 		 <div class="panel-body">
  	
		 	<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Chronic Diseases</button>
    			</span>
					<input type="text" name="chronicDiseases" id="chronicDiseases" class="form-control">
    		</div>
		</div>
				<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Blood Group</button>
    			</span>
					<input type="text" name="bloodGroup" id="bloodGroup" class="form-control">
    			</div>
			</div>
		</div>		
 
		 	<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Tallness</button>
    			</span>
					<input type="text" name="tallness" id="tallness" class="form-control">
    		</div>
		</div>
				<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Addication</button>
    			</span>
					<input type="text" name="addication" id="addication" class="form-control">
    			</div>
			</div>
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