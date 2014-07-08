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
			</div >
           <!-- /. ROW  -->
                <hr />  
<?php
if (isset($record))
		 if(is_array($record)){
             foreach($record as $row ) 
            {
echo'
<div style="padding-left: 20px">      	            	
<div class="col-md-6">	
<form name="myform" action="'.base_url().'radiograph_supervisor/finish_request/id/'.$row->id.'" method="get">						
	  <div class="row" style="margin-bottom:20px">
		
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Patient Name</button>
    			</span>
				<input type="text" name="patient_id" id="patient_id" value="'.$row->patient_name.'" class="form-control" disabled="True">
				
			</div>	
		</div>	
		<div class="row" style="margin-bottom:20px">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Date Of Request</button>
    			</span>
				<input type="text" name="patient_id" id="patient_id" value='.$row->date.' class="form-control" disabled="True">
				
			</div>
		</div>		
	<div class="row" style="margin-bottom:20px">	
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">image Type</button>
    			</span>	
				<input type="text" name="image_id" id="image_id" value='.$row->photo_kind.' class="form-control" disabled="True">
			</div>	
		</div>

	<div class="row" style="margin-bottom:20px" >	
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Part of Body</button>
    			</span>
				<input type="text" name="part_of_body" id="part" value='. $row->part_of_body .' class="form-control" disabled="True">
			</div>
	</div>		
	<div class="row" style="margin-bottom:20px" >	
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">position</button>
    			</span>
				<input type="text" name="position" id="position" value= '.$row->position .' class="form-control" disabled="True">
			</div>
	</div>	
	
	<div class="row" style="margin-bottom:20px" >
			<button class="btn btn-default" type="button">Comment</button>
    		<textarea name="comment"cols="60" rows="4" disable="true" class="form-control" value='.$row->comment.' disabled="True"></textarea>
    </div>		

	
	<div class="row" style="margin-bottom:20px" >
			<button class="btn btn-default" type="button">Description</button>
    		<textarea name="comment"cols="60" disable="true" rows="4" class="form-control" value='.$row->description .' disabled="True"></textarea>
    </div>		

    <div class="row" style="margin-bottom:20px" >		
			<button type="submit" class="btn btn-primary">Re-Take Photo </button>
	</div>
</form>
</div>

<div class="col-md-6">
			<div class="media">
				  <a class="pull-right" href="'.base_url().'\\uploads\\radiograph\\'.$row->file_name.'">
				   		 <img  class="media-object" height="300" width="300" src="'.base_url().'\\uploads\\radiograph\\'.$row->file_name.'"/>
				  </a>
			</div>	
		</div> 
		</div>
		';

 	}
		 }
		 
		
    ?>	
    			   	
</body>
</html>