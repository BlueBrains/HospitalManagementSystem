<script>$(document).ready(function(){$('#MedicineName').focus();});</script>
<div class="page-header">
  		<h1>Medicine Information<small> add this info please</small></h1>
</div>
<?php $hidden = array('id' => $id);?>
<?php echo form_open('pharmacy_supervisor/update_medquan',"",$hidden);?>

<div class='row' style="margin-bottom:35px;margin-left: 30px">
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">New Quantity</button>
    		</span>
    		<?php echo form_input(array('name' => 'quantity','id' => 'quantity', 'class' =>
   			'form-control','tabIndex'=>'1')); 
   			?>
		</div>
	</div>
</div>
<div class='row' style="margin-bottom:35px;margin-left: 30px">
	<div class="col-md-6">
		<button class="btn btn-lg btn-primary " style="width:100%" type="submit" >insert</button>
	</div>
</div>
<?php 
   	echo form_close(); 
	echo validation_errors('<p class = "error alert alert-danger">');
?>
	