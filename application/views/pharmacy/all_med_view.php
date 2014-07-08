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
                                        	<th>trade name</th>
                                            <th>scientific name</th>
                                            <th>manufacturer name</th>
                                             <th>caliber</th>
                                            <th>quantity</th>
                                            <th>price</th>
                                            <th>unit per packing</th>
                                            <th>packing per unitpacking</th>
                                            <th>med group</th>
                                            <th>enter quantity</th>
                                            <th>update mediciine</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

        <?php
            
            foreach ($records as $row) 
            {
                echo "<tr>";
                echo "<td>".$row->tradeName."</td>";
                echo "<td>".$row->scientificName."</td>";
                echo "<td>".$row->manufacturerName."</td>";
				echo "<td>".$row->caliber."</td>";
                echo "<td>".$row->quantity."</td>";
				echo "<td>".$row->price."</td>";
				echo "<td>".$row->unit_per_packing."</td>";
				echo "<td>".$row->packing_per_unitpacking."</td>";
				echo "<td>".$row->med_group."</td>";
				echo "<td>"."<a href=".base_url()."pharmacy_supervisor/update_medquan/id/".$row->id.">"."insert"."</a><br/>";
				echo "<td>"."<a href=".base_url()."pharmacy_supervisor/update_medicine/id/".$row->id.">"."update"."</a><br/>";
                echo "</tr>";
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