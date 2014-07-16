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
		    </div>
		   
						<div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Emergency Caller</a>
                                        </h4>
                                        
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                        	<form method="post" action="<?php echo base_url();?>supervisor/caller">
                                        		<div class='row' style="margin-bottom:20px">	
													<div class="input-group">
														<span class="input-group-btn">
															<button class="btn btn-default" type="button">Call a</button>
										    			</span>	
														<select class="form-control" name="caller">
														    <option value="1">Doctor</option>
														    <option value="2">Nurse</option>
														</select>
													</div>	
												</div>
												<div class='row' style="margin-bottom:20px">	
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Stuff Name</button>
									    			</span>
													<input type="text" name="stuff_name" id="stuff" class="form-control" >
												</div>
												</div>
												
												<div class='row' style="margin-bottom:20px">
												   		
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">W - R - B</button>
									    			</span>
									    			<div class="col-md-2 col-sm-2 col-xs-2">
														<input type="text" name="w" id="stuff" class="form-control" >
													</div>
													
													<div class="col-md-2 col-sm-2 col-xs-2">
														<input type="text" name="r" id="stuff" class="form-control" >
													</div>
													
													<div class="col-md-2 col-sm-2 col-xs-2">
														<input type="text" name="b" id="stuff" class="form-control" >
													</div>
												</div>
												</div>
												<div class='row' style="margin-bottom:20px" >		
														<button type="submit" class="btn btn-primary">Call Now !! </button>
												</div> 
											</form>	   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>		   
                        <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Radiograph Requests Table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>Patient name</th>
                                            <th>W-R-B</th>
                                            <th>Date in </th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
	   <?php
      if (isset($record))
		{
		 if(is_array($record)){
             foreach($record as $row ) 
            { 	
                echo "<tr class='success'>";
				echo "<td>".$row->fname." ".$row->lname."</td>";
                echo "<td>".$row->ward." - ".$row->room." - ".$row->bed."</td>";
                echo "<td>".$row->date_in."</td>";
				echo "<td><a class='btn btn-primary' href='".base_url()."pharmacy_supervisor/confirm_request/id/$row->id_patient' role='button'>Call</a></td>";
				echo "</tr>";
			}		 
         }
         }
		
    ?>	
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
		     
 