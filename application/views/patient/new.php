<html>

	<?php if(isset($error)) 
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  		<button type='button' class='close' data-dismiss='alert'>
  			<span aria-hidden='true'>&times;</span>
  			<span class='sr-only'>Close</span>
  		</button>
  		{$error}
  	</div>"; ?>
  	
	<?php echo form_open_multipart('patient/new',array('role'=>'form')); ?>
	<div class="input-group">
  		<span class="input-group-addon">First Name:</span>
  		<input type="text" class="form-control" placeholder="First Name" name='fname'>
	</div>
	<br>
	<div class="input-group">
		<span class="input-group-addon">Last Name:</span>
  		<input type="text" class="form-control" placeholder='Last Name' name='lname'>
	</div>
	<br>
	<div class="input-group">
  		<span class="input-group-addon">Birth Date:</span>
  		<input type="date" class="form-control" placeholder='01-01-90' name='date_of_birth'>
	</div>
	<br>
	<div class="input-group">
  		<span class="input-group-addon">Naitve Town:</span>
  		<input type="text" class="form-control" placeholder='Damascus' name='n_town'>
	</div>
	<br>
	<div class="input-group">
  		<span class="input-group-addon">Naitve Country:</span>
  		<input type="text" class="form-control" placeholder='SY' name='n_country'>
	</div>
	<br>
	<div class="input-group">
  		<span class="input-group-addon">Personal ID:</span>
  		<input type="text" class="form-control" placeholder='00111556844' name='person_id'>
	</div>
	<br>
	<div class="input-group">
  		<span class="input-group-addon">Recored Number:</span>
  		<input type="text" class="form-control" placeholder='530' name='recored_number'>
	</div>
	<br>
	<div class="input-group">
  		<span class="input-group-addon">Language:</span>
  		<input type="text" class="form-control" placeholder='AR_sy' name='language'>
	</div>
	<br>
	<div class="input-group">
  		<span class="input-group-addon">Marital Status:</span>
  		<input type="text" class="form-control" placeholder='Single' name='marital_status'>
	</div>
	<br>
	<div class="input-group">
  		<span class="input-group-addon">Comments:</span>
  		<input type="text" class="form-control" placeholder='write your comment here' name='comments'>
	</div>
	<br>
	<div class="input-group">
    	<span class="input-group-addon">Photo:</span>
    	<input type="file" name="photo">
  </div>
  <br>
	<?php echo form_submit(array('class'=>'btn btn-primary'), 'Add Patient');?>
	<?php form_close();?>

</html>