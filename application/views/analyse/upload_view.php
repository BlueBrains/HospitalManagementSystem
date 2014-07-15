
        <!-- /. NAV SIDE  -->
            
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
                        	 <form enctype="multipart/form-data" action="<?php echo base_url();?>analyse/upload_result/id/<?php echo $records[0]->id?>" method="post">
                        	 	<p>
                        	 		<label for="patient_id">Request Number</label>
                  					<input type="text" name="request_id" id="request_id" value="<?php echo $records[0]->id;?>"/>
                        	 	</p>
                        	 	<p>
                        	 		<label for="patient_id">Patient Name</label>
                  					<input type="text" name="patient_id" id="patient_id" value="<?php echo $records[0]->Pname;?>"/>
                        	 	</p>
                   <p>
                   	<?php if(isset($records[0]->Dname)):?>
                   	<label for="doctor_id">Doctor Name</label>
                   	<input type="text" name="doctor_id" id="doctor_id" value="<?php echo $records[0]->Dname;?>" />
                   	<?php endif ?>
                   </p>
                  <p>
                  	<label for="analyse_id">Analyse Name</label>
                  	 <input type="text" name="analyse_id" id="analyse_id" value="<?php echo $records[0]->Nname;?>">
                  </p>
                    <p>
                  <label for="descreption">descreption</label>
               <textarea name="description" id="description"></textarea>
               
               </p>
               <p>
                <input type="hidden" name="MAX_FILE_SIZE" value="25000000" />
        		<input type="file" name="fic" id="fic" size="25000000" />
        		<input type="submit" value="send"/>
               </p>
				         </form>
                      </div>
                    </div>
                    </div>
                    </div>
                   
                    <!--End Advanced Tables -->