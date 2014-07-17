<div id="page-inner">
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

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>Patient name</th>
                                            <th>Rom Number</th>
                                            <th>Date Entry</th>
                                            <th>Last State</th>
                                        </tr>
                                    </thead>
                                    <tbody>

        <?php
            if(isset($records))
			{
				foreach ($records as $row) 
            	{
	                echo "<tr>";
	                echo "<td>".$row->Pname."</td>";
	                echo "<td>".$row->room."</td>";
	                echo "<td>".$row->date_in."</td>";
					if(isset($row->Lstate))
					 echo "<td>".$row->Lstate."</td>";
					else
						echo "NO State";
	                echo "</tr>";
	            }
				
			}
            
        ?>
     </tbody>
                                </table>
                                <div class="row" style="margin-bottom: 20px" ></div>
                                	
                              <div class="row">
                              	<div class="col-md-4 " >      
                                <form method="get" action="patient/u/id/<?php echo $row->id;?>">
                                <a class='btn btn-primary ".$disabled."' href="<?php echo base_url();?>patient/u/id/<?php echo $records[0]->id;?>" role='button'>Show Patient Info</a>
                                </form>
                              	</div>
                              	<div class="col-md-4 ">
								<div class='row' >		
									<form method="post" action="<?php echo base_url();?>doctor/doc_call_nurse">
								 	<input type="hidden" name="p_id" value="<?php echo $row->id; ?>" id="p_id"/>	
									<button type="submit" class="btn btn-primary">Call Nurse </button>
									<input type="text" name="stuff_name" id="stuff_name" class="form-control" >
									</form>
								</div>
								</div>
								<div class="col-md-4 ">
								<div class='row' >		
									<form method="post" action="<?php echo base_url();?>doctor/caller_sv">
									<button type="button" class="btn btn-primary">Helper Doctor</button>
									<select class='form-control' placeholder='' name='section'>
																  <option value='2'>Accident and emergency (A&E)</option>
																  <option value='3'>Haematology</option>
																  <option value='4'>Pain management clinics</option>
																  <option value='5'>Ear nose and throat (ENT)</option>
																  <option value='6'>Obstetrics and Gynaecology</option>
																  <option value='6'>Intensive care unit (ICU) </option>
															</select>		
									
									</form>
								</div>
                               </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
                    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
 <div class="row">
                <div class="col-md-4">
                	
                	<div class="panel-body" style="padding-left: -7px;padding-right: 0px;">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default" style="margin-top: -15px;padding-right: 17px;">
                                    <div class="panel-heading" style="margin-right: -17px;">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Vital Signs</a>
                                        </h4>
                                        
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                       	<center> <div class="panel-body">
                                        
                                        	<div class="row" style="margin-bottom: 15px">
                                        		<div class="input-group" style="padding-left: 20px;">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Temperature</button>
									    			</span>
													<input type="text" name="temp" id="temp" class="form-control" >
													<span class="input-group-addon">C°</span>
												</div>
											</div>	
											<div class="row" style="margin-bottom: 15px">
												<div class="input-group" style="padding-left: 20px;">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Respiration &nbsp</button>
									    			</span>
													<input type="text" name="res" id="res" class="form-control">
													<span class="input-group-addon">P.M</span>
												</div>
											</div>	  
											<div class="row" style="margin-bottom: 15px">
												<div class="input-group" style="padding-left: 20px;">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Heart pulse &nbsp</button>
									    			</span>
													<input type="text" name="pulse" id="pulse" class="form-control" >
													<span class="input-group-addon">BPM</span>
												</div>
											</div>	  
											<div class="row" style="margin-bottom: 15px">
												<div class="input-group" style="padding-left: 20px;">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">pressure &nbsp &nbsp &nbsp</button>
									    			</span>
													<input type="text" name="blood" id="blood" class="form-control">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>	 
											  
                                        </div></center> 
                                    </div>
                                </div>
                            </div>
                        </div>
                
             </div>   
             
             
			   <div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Patient update State
                        </div>
                        <div class="panel-body" style="padding-left: 34px;padding-right: 39px;">
                            <div class='row' style="margin-bottom:20px" >
									<button class="btn btn-default" type="button">State</button>
						    		<textarea name="state"cols="60" rows="4" class="form-control" ></textarea>
						    </div>	
						    <div class='row' style="margin-bottom:20px" >		
									<button type="button" class="btn btn-primary">Update State </button>
							</div>
                        </div>
                        
                    </div>
                </div>
     
      </div>          	
</div>