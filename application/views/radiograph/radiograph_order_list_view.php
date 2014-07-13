
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
                             Radiograph Requests Table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>Patient name</th>
                                            <th>section name</th>
                                            <th>Date</th>
                                            <th>photo kind</th>
                                            <th>part of body</th>
                                            <th>comment</th>
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
				if ($row->emergancy && $row->state != 2)
					$active='class="danger"';
				else if ($row->emergancy == 0 && $row->state != 2)
					$active ='class="active"';
				else 
					$active ='class="success"';    	
                echo "<tr".$active.">";
				if(count($row->patient_name)<2)
                echo "<td>".$row->patient_name."</td>";
				else {
					echo "<td>".$row->fname." ".$row->lname."</td>";
				}
                echo "<td>".$row->section_name."</td>";
                echo "<td>".$row->date."</td>";
                echo "<td>".$row->photo_kind."</td>";
                echo "<td>".$row->part_of_body."</td>";
                echo "<td>".$row->comment."</td>";
				if (isset($section) && ($section !='doctor')) {
				if ($row->state ==0)
              		echo "<td>"."<a href = ".base_url()."radiograph_supervisor/confirm_request/id/".$row->id." class='glyphicon glyphicon-eye-open'></a>";
				else if ($row->state ==1)
					echo "<td>"."<a href = ".base_url()."radiograph_supervisor/finish_request/id/".$row->id." class='glyphicon glyphicon-refresh'></a>";
				else {
					echo "<td>"."<a href = ".base_url()."radiograph_supervisor/show_result/id/".$row->id." class='glyphicon glyphicon-ok-sign'></a>";
				}
				echo "<a href ".base_url()."radiology/delete/id/".$row->id." class='glyphicon glyphicon-eye-close' > </a><br/></td>";
				}
				else 
					{
						if ($row->state ==0)
              				echo "<td>"."<a  class='glyphicon glyphicon-eye-open'></a>";
						else if ($row->state ==1)
							echo "<td>"."<a class='glyphicon glyphicon-refresh'></a>";
						else {
							echo "<td>"."<a href = ".base_url()."doctor/show_result/id/".$row->id." class='glyphicon glyphicon-ok-sign'></a>";
							}
               
            }
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
 
</body>
</html>