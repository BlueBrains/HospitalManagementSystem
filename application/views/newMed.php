<div class="page-header">
  		<h1>Medicine Information<small> add this info please</small></h1>
</div>

<?php echo form_open('pharmacy/addMed');?>

<div class='row' style="margin-bottom:25px">
	<div class="col-md-4">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Medicine Name</button>
    		</span>
    		<?php echo form_input(array('name' => 'MedicineName','id' => 'MedicineName', 'class' =>
   			'form-control')); 
   			?>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Group</button>
    		</span>
    		<?php echo form_input(array('name' => 'group','id' => 'group', 'class' =>
    			'form-control')); 
    		?>
    	</div>
	</div>

	<div class="col-md-4">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Quantity</button>
    		</span>
    		<?php echo form_input(array('name' => 'quantity','id' => 'quantity', 'class' =>
    			'form-control')); 
    		?>
    	</div>
	</div>
</div>

<div class="row" style="margin-bottom:25px">
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Price</button>
    		</span>
    		<?php echo form_input(array('name' => 'price','id' => 'price', 'class' =>
    			'form-control')); 
    		?>
    		<span class="input-group-btn">
				<button class="btn btn-default" type="button">L.S</button>
    		</span>
    	</div>
	</div>
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Unit Per Packing</button>
    		</span>
    		<?php echo form_input(array('name' => 'upp','id' => 'upp', 'class' =>
    			'form-control')); 
    		?>
    	</div>
	</div>
</div>

<div class="row" style="margin-bottom:25px">
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Packing Per Packing-Unit</button>
    		</span>
    		<?php echo form_input(array('name' => 'pppu','id' => 'pppu', 'class' =>
    			'form-control')); 
    		?>
    	</div>
	</div>
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Manufacturer</button>
    		</span>
    		<?php echo form_input(array('name' => 'provider','id' => 'provider', 'class' =>
    			'form-control')); 
    		?>
    	</div>
	</div>
</div>

<div class="row" style="margin-bottom:25px">
	<div class="col-md-12">
		<button class="btn btn-primary " style="width:100%" type="submit">Add</button>
	</div>
</div>
<?php 
   	echo form_close(); 
	echo validation_errors('<p class = "error alert alert-danger">');
?>
	