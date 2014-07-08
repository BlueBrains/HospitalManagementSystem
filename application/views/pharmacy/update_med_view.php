<script>$(document).ready(function(){$('#MedicineName').focus();});</script>
<div class="page-header">
  		<h1>Medicine Information<small> add this info please</small></h1>
</div>
<?php $hidden = array('id' => $result->id);?>
<?php echo form_open('pharmacy_supervisor/update_medicine',"",$hidden);?>

<div class='row' style="margin-bottom:35px">
	<div class="col-md-4">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Medicine Name</button>
    		</span>
    		<?php echo form_input(array('name' => 'MedicineName','id' => 'MedicineName', 'class' =>
   			'form-control','tabIndex'=>'1','value'=>$result->tradeName)); 
   			?>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Group</button>
    		</span>
    		<?php echo form_input(array('name' => 'group','id' => 'group', 'class' =>
    			'form-control','tabIndex'=>'2','value'=>$result->med_group)); 
    		?>
    	</div>
	</div>

	<div class="col-md-4">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Quantity</button>
    		</span>
    		<?php echo form_input(array('name' => 'quantity','id' => 'quantity', 'class' =>
    			'form-control','tabIndex'=>'3','value'=>$result->quantity)); 
    		?>
    	</div>
	</div>
</div>

<div class="row" style="margin-bottom:35px">
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Scientific Name</button>
    		</span>
    		<?php echo form_input(array('name' => 'scientificName','id' => 'upp', 'class' =>
    			'form-control','tabIndex'=>'4','value'=>$result->scientificName)); 
    		?>
    	</div>
	</div>
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Caliber</button>
    		</span>
    		<?php echo form_input(array('name' => 'caliber','id' => 'pppu', 'class' =>
    			'form-control','tabIndex'=>'5','value'=>$result->caliber)); 
    		?>
    	</div>
	</div>
</div>

<div class="row" style="margin-bottom:35px">
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Unit Per Packing</button>
    		</span>
    		<?php echo form_input(array('name' => 'upp','id' => 'upp', 'class' =>
    			'form-control','tabIndex'=>'6','value'=>$result->unit_per_packing)); 
    		?>
    	</div>
	</div>
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Packing Per Packing-Unit</button>
    		</span>
    		<?php echo form_input(array('name' => 'pppu','id' => 'pppu', 'class' =>
    			'form-control','tabIndex'=>'7','value'=>$result->packing_per_unitpacking)); 
    		?>
    	</div>
	</div>
</div>

<div class="row" style="margin-bottom:35px">
	<div class="col-md-6">
    	<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Price</button>
    		</span>
    		<?php echo form_input(array('name' => 'price','id' => 'price', 'class' =>
    			'form-control','tabIndex'=>'8','value'=>$result->price)); 
    		?>
    		<span class="input-group-btn">
				<button class="btn btn-default" type="button">L.S</button>
    		</span>
    	</div>
	</div>
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Manufacturer</button>
    		</span>
    		<?php echo form_input(array('name' => 'provider','id' => 'provider', 'class' =>
    			'form-control','tabIndex'=>'9','value'=>$result->manufacturerName)); 
    		?>
    	</div>
	</div>
</div>

<div class="row" style="margin-bottom:35px">
	<div class="col-md-12">
		<button class="btn btn-lg btn-primary " style="width:100%" type="submit" >Update</button>
	</div>
</div>
<?php 
   	echo form_close(); 
	echo validation_errors('<p class = "error alert alert-danger">');
?>
	