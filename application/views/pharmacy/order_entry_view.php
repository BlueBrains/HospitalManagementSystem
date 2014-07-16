<?php            
	foreach ($records as $row){
		$res[$row->tradeName] = $row->tradeName;		
	} 
?>
<script>
 $(document).ready(function(){
$("#anc_add").click(function(){
	$('#dataTables > tbody:last').append('<tr><td><?php echo form_dropdown('medicineName[]', $res, '','id ="bla" class ="form-control"'); ?></td><td><?php echo form_input(array('name' => 'caliber[]','id' => 'quantity', 'class' =>'form-control'));?></td><td><?php echo form_input(array('name' => 'quantity[]','id' => 'quantity', 'class' =>'form-control'));?> </td></tr>');
});
 
$("#anc_rem").click(function(){
if($('#dataTables tr').size()>2){
$('#dataTables > tbody > tr:last-child').remove();
}else{
alert('One row should be present in table');
}
});
 
});
	
</script>
<div class="page-header">
  		<h1>order Information<small> add this info please</small></h1>
</div>
<?php echo form_open('pharmacy_supervisor/order_entry');?>	
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             order entry
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr>
                                        	<th>trade name</th>
                                            <th>caliber</th>
                                            <th>quantity</th>                                                                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>
                                        		<?php echo form_dropdown('medicineName[]', $res, '','id ="bla" class ="form-control"'); ?>
                                        	</td>
                                            <td>
                                            	<?php echo form_input(array('name' => 'caliber[]','id' => 'quantity', 'class' =>
   													'form-control')); 
   												?>
                                            </td>
                                            <td>
                                            	<?php echo form_input(array('name' => 'quantity[]','id' => 'quantity', 'class' =>
   													'form-control')); 
   												?>                                            	
                                            </td>                                                                                      
                                        </tr>
     								</tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
</div>

<div class='row' style="margin-bottom:35px;margin-left: 30px">
	<div class="col-md-6">
		<a href="javascript:void(0);" id='anc_add'>Add Row</a></br>
		<a href="javascript:void(0);" id='anc_rem'>Remove Row</a>
	</div>
</div>
<div class='row' style="margin-bottom:35px;margin-left: 30px">
	<div class="col-md-6 col-md-offset-2">
		<button class="btn btn-lg btn-primary " style="width:100%" type="submit" >insert</button>
	</div>
</div>
<?php 
   	echo form_close(); 
	echo validation_errors('<p class = "error alert alert-danger">');
?>	    
</div>        		            