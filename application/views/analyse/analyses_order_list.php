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
                                            <th>doctor name</th>
                                            <th>analyse</th>
                                             <th>date</th>
                                            <th>state</th>
                                            <th>action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

        <?php
            
            foreach ($records as $row) 
            {
                echo "<tr>";
                echo "<td>".$row->Pname."</td>";
                echo "<td>".$row->Dname."</td>";
                echo "<td>".$row->Nname."</td>";
                echo "<td>".$row->rdate."</td>";
				if($row->state==0)
				{
					echo "<td> not confirm </td>";
					echo "";
					echo "<td>"."<a href=".base_url()."analyse/confirm_request/id/".$row->id.">"."confirm request"."</a><br/>";
				}
				elseif ($row->state==1)
				 {
					echo "<td> not uploaded </td>";
					
					echo "<td>"."<a href=".base_url()."analyse/upload/id/".$row->id.">"."upload result"."</a><br/>";
				}
				else
					{
						echo "<td> uploaded </td>";
					echo "<td>"."<a href=".base_url()."analyse/edit_analyse/id/".$row->id.">"."edit" ."</td>";
					}
                echo "</tr>";
            }
			echo "<a href=".base_url()."analyse/confirm_request_all>"."confirm all request"."</a><br/>";
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