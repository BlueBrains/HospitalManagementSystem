<script>$(document).ready(function(){$('#MedicineName').focus();});</script>
<div class="page-header">
  		<h1>Medicine Information<small> add this info please</small></h1>
</div>

<?php echo form_open('pharmacy_supervisor/sale_medicine');?>

<div class='row' style="margin-bottom:35px">
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Medicine Name</button>
    		</span>
    		<?php echo form_input(array('name' => 'MedicineName','id' => 'MedicineName1', 'class' =>
   			'form-control','tabIndex'=>'1')); 
   			?>
		</div>
	</div>
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Caliber</button>
    		</span>
    		<?php echo form_input(array('name' => 'caliber','id' => 'pppu', 'class' =>
    			'form-control','tabIndex'=>'2')); 
    		?>
    	</div>
	</div>	

</div>

<div class="row" style="margin-bottom:35px">
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Customer Name</button>
    		</span>
    		<?php echo form_input(array('name' => 'CustomerName','id' => 'customerName', 'class' =>
    			'form-control','tabIndex'=>'3')); 
    		?>
    	</div>
	</div>	
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Quantity</button>
    		</span>
    		<?php echo form_input(array('name' => 'quantity','id' => 'quantity', 'class' =>
    			'form-control','tabIndex'=>'4')); 
    		?>
    	</div>
	</div>	
</div>

<div class="row" style="margin-bottom:35px">
	<div class="col-md-12">
		<button class="btn btn-lg btn-primary " style="width:100%" type="submit" >Sale</button>
	</div>
</div>
<?php 
   	echo form_close(); 
	echo validation_errors('<p class = "error alert alert-danger">');
?>
	