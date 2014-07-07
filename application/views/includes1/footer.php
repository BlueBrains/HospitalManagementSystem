    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php  echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.ui.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
   	<!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.js"></script> 
	<!-- MORRIS CHART SCRIPTS -->
   	<script src="<?php echo base_url();?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <!-- <script src="<? echo base_url();?>assets/js/morris/morris.js"></script>     -->
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
    <script>    	
		$(function(){
		  			$("#patientName1").autocomplete({
		    			source: "<?php echo base_url();?>doctor/get_patients" 
		  			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		        		var inner_html = '<a href="<?echo base_url();?>doctor/patient_details/id/' + item.image + '"><div style="width:300px;height:50px;padding:5px 0px 5px;"><div class="img-responsive" style="float:left;margin-right:10px;"><img height="42" width="42" src="<? echo base_url()?>/photos/patients/'+ item.image +'.png"></div><div style="font-size:16px;margin-top:8px">' + item.label + '</div></div></a>';
		        		return $( "<li></li>" )
		            		.data( "item.autocomplete", item )
		            		.append(inner_html)
		            		.appendTo( ul );
		    		};
		  			$("#medicineName1").autocomplete({
		    			source: "<?php echo base_url();?>doctor/get_medicines"
		  			});
		});
    </script>
</body>
</html>