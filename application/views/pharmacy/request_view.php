	<div class="page-header">
  		<h1>personal information<small> add this info please</small></h1>
	</div>
	
	<?php echo form_open('doctor/new_med_request/');?>
	
	<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">patient name</button>
    			</span>
    			<?php echo form_input(array('name' => 'patientName','id' => 'patientName1', 'class' =>
     			'form-control','tabIndex'=>'1')); 
    			?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">medicine name</button>
    			</span>
    			<?php echo form_input(array('name' => 'medicineName','id' => 'medicineName1', 'class' =>
     			'form-control','tabIndex'=>'2')); 
    			?>
    		</div>
		</div>
	</div>
		<div class='row' style="margin-bottom:50px">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Dose</button>
    			</span>
    			<?php echo form_input(array('name' => 'dose','id' => 'Dose', 'class' =>
     			'form-control','tabIndex'=>'3')); 
    			?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Caliber</button>
    			</span>
    			<?php echo form_input(array('name' => 'caliber','id' => 'Caliber', 'class' =>
     			'form-control','tabIndex'=>'4')); 
    			?>
    		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label>details</label>
		</div>
	</div>

	<div class="row" style="margin-bottom:50px">
		<div class="col-md-6">
    		<textarea name="details" cols="60" rows="4" class="form-control" tabindex="5"></textarea>
		</div>
	</div>

	<div class="row" style="margin-bottom:50px">
		<div class='col-sm-2'>
			<button class="btn btn-lg btn-primary" type="submit" tabindex="6">Request</button>
		</div>
	</div>
	<?php 
    	echo form_close(); 
		echo validation_errors('<p class = "error alert alert-danger">');
    ?>