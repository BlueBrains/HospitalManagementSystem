
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
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>Patient name</th>
                                            <th>Date enter</th>
                                            <th>ward num</th>
                                            <th>room num</th>
                                            <th>Action</th>
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
                echo "<td>  <a href = ".base_url()."recepient/patient_state/id/".$row->id.">".$row->fname." ".$row->lname."</a></td>";
				if (isset($row->date))
				{
                echo "<td>".$row->date."</td>";
                echo "<td>".$row->ward."</td>";
                echo "<td>".$row->room."</td>";
                echo "<td> <a href = ".base_url()."recepient/end_visitng/id/".$row->id." '>end visitng period</a></td>";
                echo "</tr>";
				}
				else {
				echo "<td> -- </td>";
                echo "<td> -- </td>";
                echo "<td> -- </td>";
				echo "<td> <a href = ".base_url()."recepient/enter/id/".$row->id." '>Enter Patient</a> </td>";
                echo "</tr>";	
					}
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
 
</body>
</html>