	    <script>    	
		$(function(){
		  			$("#patientName1").autocomplete({
		    			source: "<?php echo base_url();?>doctor/get_patients" 
		  			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		        		var inner_html = '<a href="<?php echo base_url();?>patient/u/id/' + item.image + '"><div style="width:300px;height:50px;padding:5px 0px 5px;"><div class="img-responsive" style="float:left;margin-right:10px;"><img height="42" width="42" src="<? echo base_url()?>/photos/patients/'+ item.image +'.png"></div><div style="font-size:16px;margin-top:8px">' + item.label + '</div></div></a>';
		        		return $( "<li></li>" )
		            		.data( "item.autocomplete", item )
		            		.append(inner_html)
		            		.appendTo( ul );
		    		};
		  			$("#medicineName1").autocomplete({
		    			source: "<?php echo base_url();?>doctor/get_medicines"
		  			});		  			
		});
		$(function(){
		    $(".chosen-select").chosen();
		});		
		
	</script>
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
    			<?php if(isset($patient)): ?>
    			<?php echo form_input(array('name' => 'patientName','id' => 'patientName1', 'class' =>
     			'form-control','tabIndex'=>'1','value'=>$patient[0]->Pname)); 
    			?>
    			<?php else: ?>
    			<?php echo form_input(array('name' => 'patientName','id' => 'patientName1', 'class' =>
     			'form-control','tabIndex'=>'1')); 
    			?>
    			<?php endif; ?>    				
			</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">medicine name</button>
    			</span>
    			<!-- <?php echo form_input(array('name' => 'medicineName','id' => 'medicineName1', 'class' =>
     			'form-control','tabIndex'=>'2')); 
    			?> -->
        		<?php            
           			foreach ($records as $row){
           				$res[$row->tradeName] = $row->tradeName;		
           			} 
           		?>
            		    			
    			<?php echo form_dropdown('medicineName', $res, '','id ="bla" class ="form-control chosen-select" tabIndex="2"'); ?>
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