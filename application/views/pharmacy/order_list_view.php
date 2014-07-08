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
											<th>#</th>
											<th>Doctor</th>
											<th>Patient</th>
											<th>Medicine</th>
											<th>Caliber</th>
											<th>state</th>
											<th>action</th>
											<th>details</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$disabled;	
										foreach ($results as $data) {
											if($data->quantity == 0) $disabled = "disabled"; else $disabled = "";  			
											echo "<tr>
													<td>$data->id</td>
													<td>$data->fname $data->lname</td>
													<td>$data->pfname $data->plname</td>
													<td>$data->tradeName</td>
													<td>$data->caliber</td>";
										if($data->state == 2)
											echo 	"<td><button type='button' class='btn btn-success disabled'>Finished</button></td>
													 <td></td>
													 <td><a class='btn btn-default' href='".base_url()."pharmacy_supervisor/detail_request/id/$data->id' role='button'>Details</a></td>
												 </tr>";
										else if($data->state == 1)
											echo 	"<td><button type='button' class='btn btn-success disabled'>Confirmed</button></td>
													 <td><a class='btn btn-default' href='".base_url()."pharmacy_supervisor/finish_request/id/$data->id' role='button'>Finish</a></td>
													 <td><a class='btn btn-default' href='".base_url()."pharmacy_supervisor/detail_request/id/$data->id' role='button'>Details</a></td>
												 </tr>";				 
										else				 								
											echo	"<td><button type='button' class='btn btn-success disabled'>waiting</button></td>
													 <td><a class='btn btn-primary ".$disabled."' href='".base_url()."pharmacy_supervisor/confirm_request/id/$data->id' role='button'>Confirm</a></td>
												     <td><a class='btn btn-default' href='".base_url()."pharmacy_supervisor/detail_request/id/$data->id' role='button'>Details</a></td>
												 </tr>";
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
                <!-- /. ROW  -->
                    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->