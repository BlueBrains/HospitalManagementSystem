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
		});
		
	</script>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">120 New</p>
                    <p class="text-muted">Messages</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">30 Tasks</p>
                    <p class="text-muted">Remaining</p>
                </div>
             </div>
		     </div>
             <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">2 New</p></br>
                    <p class="text-muted">Emergency Order</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">3 New</p></br>
                    <p class="text-muted">Out Orders</p>
                </div>
             </div>
             
		     </div>
			</div>
                 <!-- /. ROW  -->
                <hr />  	
	<script type="text/javascript">
function showTutorial(name){
  document.myform.show.showtext.value = name
}
function set(name){
  document.myform.part.value = name
  	if (name=="Skull")
    $('#menu1').toggle('slow');
else if (name=="Shoulders")
	$('#menu2').toggle('slow');
else if (name=="Chest")
	$('#menu3').toggle('slow');
else if (name=="Abdomen")
	$('#menu4').toggle('slow');	
else if (name=="Pelvis")
	$('#menu5').toggle('slow');	
else if (name=="Mammo")
	$('#menu6').toggle('slow');
else if (name=="Uper Extremities")
	$('#menu7').toggle('slow');
else if (name=="Lower Extremities")
	$('#menu8').toggle('slow');
else if (name=="Spine")
	$('#menu9').toggle('slow');	
}

</script>
</head>
<body>

<div class="col-md-6">	
<form name="myform" action="<?php echo base_url();?>doctor/radiograph_internal_request_sign" method="get">	
	
                      
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Doctor Information</a>
                                        </h4>
                                        
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                        		<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Doctor Name</button>
									    			</span>
													<input type="text" name="doc" id="doc" class="form-control" disabled="True" value="<?php echo $name?>">
												</div>
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Doctor Department</button>
									    			</span>
													<input type="text" name="doc_dep" id="dco_dep" class="form-control" disabled="True" value="<?php echo $dep?>">
												</div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              
     				
	  <div class='row' style="margin-bottom:20px">
		
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Patient Name*</button>
    			</span>
				<input type="text" name="patient_name" id="patientName1" class="form-control" value="<?php if (isset($patient)) echo $patient[0]->Pname; ?>">
				<input type="hidden" name="patient_id" id="patient_id" class="form-control" value="<?php if (isset($patient)) echo $patient[0]->id; ?>">
			</div>
			<span><?php if (isset($error)) echo '<p class = "error alert alert-danger">'.$error;?></span>
		</div>		
	<div class='row' style="margin-bottom:20px">	
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">image Type*</button>
    			</span>	
				<select class="form-control" name="image_id">
				    <option value="1">X-Ray</option>
				    <option value="2">Computed Tomography</option>
				    <option value="3">Magnetic Resonance Imaging</option>
				    <option value="4">Ultrasound</option>
				    <option value="5">Nuclear Medicine</option>
					<option value="6">Invasive and Fluoroscopic Imaging</option>
				    <option value="7">Mammography Screening</option>
				</select>
			</div>	
		</div>

	<div class='row' style="margin-bottom:20px" >	
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Part of Body*</button>
    			</span>
				<input type="text" name="part_of_body" id="part" class="form-control">
			</div>
	</div>		
	<div class='row' style="margin-bottom:20px" >	
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">position*</button>
    			</span>
				<input type="text" name="position" id="position" class="form-control">
			</div>
	</div>	
	
	<div class='row' style="margin-bottom:20px" >
			<button class="btn btn-default" type="button">Comment</button>
    		<textarea name="comment"cols="60" rows="4" class="form-control"></textarea>
    </div>		
    <div class='row' style="margin-bottom:20px" >
		<button type="button" class="btn btn-default btn-lg">
		  <span class="glyphicon glyphicon-pushpin"></span> 
		  
			 <div class="checkbox">
			    <label>
			      <input type="checkbox" name="checked"> Emergency Request
			    </label>
			  </div>				
		</button>
    </div>
    <div class='row' style="margin-bottom:20px" >		
			<button type="submit" class="btn btn-primary">Send Request </button>
	</div>

</div>
<div class="col-md-6">
			<div class="media">
				  <a class="pull-right" >
				   		 <img class="media-object" src="<?php echo base_url();?>/images/bone.jpg" alt="HTML Map"  border="0" usemap="#tutorials"/>
				  </a>
			</div>	
		</div>
</form>


<!--	<form name="show" id="show">
		<input type="text" name="showtext" id="showtext">
	</form>
-->

<map name="tutorials">
   <area shape="rect" 
            coords="91,5,154,75"
            target="_self" 
            onMouseOver="showTutorial('Skull')"
onmousedown="set('Skull')"			
            />

	<area shape="rect" 
            coords="50,97,214,133"
            target="_self" 
            onMouseOver="showTutorial('Shoulders')"
onmousedown="set('Shoulders')"			
            />
<area shape="poly" 
            coords="99,106,158,110,180,168,128,204,74,167"
            target="_self" 
            onMouseOver="showTutorial('Chest')"
onmousedown="set('Chest')"			
            />	
<area shape="poly" 
            coords="76,233,182,234,147,306,104,306"
            target="_self" 
            onMouseOver="showTutorial('Pelvis')"
onmousedown="set('Pelvis')"			
            />	
<area shape="poly" 
            coords="92,213,109,234,146,234,160,221,129,200"
            target="_self" 
            onMouseOver="showTutorial('Abdomen')"
onmousedown="set('Abdomen')"			
            />				
<area shape="rect" 
            coords="54,112,67,219"
            target="_self" 
            onMouseOver="showTutorial('Upper Extremities')"
onmousedown="set('Uper Extremities')"			
            />
<area shape="rect" 
            coords="12,220,49,343"
            target="_self" 
            onMouseOver="showTutorial('Upper Extremities')"
onmousedown="set('Uper Extremities')"			
            />
<area shape="rect" 
            coords="182,111,214,212"
            target="_self" 
            onMouseOver="showTutorial('Upper Extremities')" 
            onmousedown="set('Uper Extremities')"
			/>
<area shape="rect" 
            coords="186,219,250,347"
            target="_self" 
            onMouseOver="showTutorial('Upper Extremities')" 
			onmousedown="set('Uper Extremities')"
            />			
<area shape="rect" 
            coords="70,279,95,553"
            target="_self" 
            onMouseOver="showTutorial('Lower Extremities')" 
            onmousedown="set('Lower Extremities')"
			/>
<area shape="rect" 
            coords="158,290,212,557"
            target="_self" 
            onMouseOver="showTutorial('Lower Extremities')"
onmousedown="set('Lower Extremities')"			
            />			
<area shape="rect" 
            coords="241,76,270,283"
            target="_self" 
            onMouseOver="showTutorial('Spine')" 
			onmousedown="set('Spine')"
            />
<area shape="circle" 
            coords="250,48,14"
	        target="_self" 
            onMouseOver="showTutorial('Mammo')" 
			onmousedown="set('Mammo')"
            />			
</map>
					

</body>
</html>