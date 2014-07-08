
        <!-- /. NAV SIDE  -->
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
                             Patients 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>Patient name</th>
                                            <th>Date enter</th>
                                            <th>ward num</th>
                                            <th>Date - time</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
								   <?php
							      if (isset($record))
									{
									 if(is_array($record)){
							             foreach($record as $row ) 
							            {
							                echo "<tr>";
							                echo "<td>".$row->fname." ".$row->lname."</td>";
											
							                echo "<td>".$row->date_in."</td>";
							                echo "<td>".$row->ward."</td>";
							                echo "<td>".$row->room."</td>";
							                echo "</tr>";
											
							            }
							         }
									  else
									  	{
									  }
									 }
									
							    ?>	
                                    </tbody>
                                </table>
                            </div>
						      <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>Doctor Name</th>
                                            <th>State</th>                                          
                                        </tr>
                                    </thead>
			                   <tbody>
									   <?php
								      if (isset($record))
										{
										 if(is_array($record)){
								             foreach($record as $row ) 
								            {
								                echo "<tr>";
								                echo "<td>".$row->Dfname." ".$row->Dlname."</td>";
												
								                echo "<td>".$row->state."</td>";
												if ($row->date_out == '0000-00-00 00:00:00')
								                echo "<td>  <a href = ".base_url()."recepient/end_visitng/id/".$row->patient_id.">end visitng</a></td>";
								                echo "</tr>";
												
								            }
								         }
										  else
										  	{
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
                  <div class='row' style="margin-bottom:20px" >
					<button class="btn btn-default" type="button">New State</button>
		    		<textarea name="comment"cols="60" rows="4" class="form-control"></textarea>
		   		 </div>		
            
 
</body>
</html>