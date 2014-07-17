<script>$(document).ready(function(){$('#MedicineName').focus();});</script>
<script>    	
		$(function(){
		  			$("#NurseName").autocomplete({
		    			source: "<?php echo base_url();?>pharmacy_supervisor/get_nurses" 
		  			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		        		var inner_html = '<a href="<?php echo base_url();?>nurse/nurse_details/id/' + item.image + '"><div style="width:300px;height:50px;padding:5px 0px 5px;"><div class="img-responsive" style="float:left;margin-right:10px;"><img height="42" width="42" src="<? echo base_url()?>/photos/nurses/'+ item.image +'.png"></div><div style="font-size:16px;margin-top:8px">' + item.label + '</div></div></a>';
		        		return $( "<li></li>" )
		            		.data( "item.autocomplete", item )
		            		.append(inner_html)
		            		.appendTo( ul );
		    		};
		});
</script>
<div class="page-header">
  		<h1>Task Information<small> add this info please</small></h1>
</div>
<?php $hidden = array('id' => $id);?>
<?php echo form_open('pharmacy_supervisor/confirm_request',"",$hidden);?>

<div class='row' style="margin-bottom:35px;margin-left: 30px">
	<div class="col-md-6">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Nurse Name</button>
    		</span>
    		<?php echo form_input(array('name' => 'name','id' => 'NurseName', 'class' =>
   			'form-control','tabIndex'=>'1')); 
   			?>
		</div>
	</div>
</div>
<div class='row' style="margin-bottom:35px;margin-left: 30px">
	<div class="col-md-6">
		<button class="btn btn-lg btn-primary " style="width:100%" type="submit" >assign task</button>
	</div>
</div>
<?php 
   	echo form_close(); 
	echo validation_errors('<p class = "error alert alert-danger">');
?>
	