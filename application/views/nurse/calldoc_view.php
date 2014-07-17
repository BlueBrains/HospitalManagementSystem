<script>$(document).ready(function(){$('#MedicineName').focus();});</script>
<script>    	
		$(function(){
		  			$("#DoctorName1").autocomplete({
		    			source: "<?php echo base_url();?>nurse/get_doctors" 
		  			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		        		var inner_html = '<a href="<?php echo base_url();?>patient/u/id/' + item.image + '"><div style="width:300px;height:50px;padding:5px 0px 5px;"><div class="img-responsive" style="float:left;margin-right:10px;"><img height="42" width="42" src="<? echo base_url()?>/photos/patients/'+ item.image +'.png"></div><div style="font-size:16px;margin-top:8px">' + item.label + '</div></div></a>';
		        		return $( "<li></li>" )
		            		.data( "item.autocomplete", item )
		            		.append(inner_html)
		            		.appendTo( ul );
		    		};		  			
		});		
</script>
<div class="page-header">
  		<h1>Call Information<small> add this info please</small></h1>
</div>

<?php echo form_open('nurse/call_doctor');?>

<div class='row' style="margin-bottom:35px">
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Doctor Name</button>
    		</span>
    		<?php echo form_input(array('name' => 'DoctorName','id' => 'DoctorName1', 'class' =>
   			'form-control','tabIndex'=>'1')); 
   			?>
		</div>
	</div>
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">place</button>
    		</span>
    		<?php echo form_input(array('name' => 'w_r_b','id' => 'wrb', 'class' =>
    			'form-control','tabIndex'=>'2')); 
    		?>
    	</div>
	</div>	

</div>

<div class="row" style="margin-bottom:35px">
	<div class="col-md-12">
		<button class="btn btn-lg btn-primary " style="width:100%" type="submit" >Call</button>
	</div>
</div>
<?php 
   	echo form_close(); 
	echo validation_errors('<p class = "error alert alert-danger">');
?>
	