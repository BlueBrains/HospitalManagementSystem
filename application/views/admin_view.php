<html>
<script src="<?php echo base_url();?>/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
   $(document).ready(function() {
   	 changeClass(<?php if (isset($idd)) echo $idd;?>);
}
);

$(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');

        if (!$('#dataConfirmModal').length) {
            $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-primary" id="dataConfirmOK">OK</a></div></div>');
        } 
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({show:true});
        return false;
    });
});


function myFunction() {
    alert("I am an alert box!");
}
function show_confirm(id){
    // build the confirm box
    var c=confirm("Are you sure you wish to delete?");
    // if true
    if (c){
	     location.herf = "<?php echo base_url()."radiology/delete/";?>"+id;	     
		}
  }

<?php $x =0; ?>
    function changeClass(id)
    {
    	if (id==1)
    	{
	        document.getElementById("1").className = "list-group-item active";
	        document.getElementById("2").className = "list-group-item ";
	        document.getElementById("3").className = "list-group-item ";
	        document.getElementById("subtitle").innerHTML="Pharmacy";
	         <?php $x =1; ?>
       }
       else if (id==2)
    	{
	        document.getElementById("2").className = "list-group-item active";
	        document.getElementById("1").className = "list-group-item ";
	        document.getElementById("3").className = "list-group-item ";
	        document.getElementById("subtitle").innerHTML="Radiology";
<?php	         $x =2;?>	        
       }
       else if (id==3)
    	{
	        document.getElementById("3").className = "list-group-item active";
	        document.getElementById("2").className = "list-group-item ";
	        document.getElementById("1").className = "list-group-item ";
	        document.getElementById("subtitle").innerHTML="Analyses";
<?php	        $x=3;?>	        
       }
       else 
       {
	        document.getElementById("3").className = "list-group-item ";
	        document.getElementById("2").className = "list-group-item ";
	        document.getElementById("1").className = "list-group-item ";
       		document.getElementById("subtitle").innerHTML="Request";
       }
    }
    
</script>
<body>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Please Enter password</h4>
      </div>
      <div class="modal-body">
        <input type="password" class="form-control" name="pass">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Validate</button>
      </div>
    </div>
  </div>
</div>

 <div class="list-group">
 <?php
 $roll = $this->session->userdata('rollname');
 $value = $this->session->userdata('pharmacy_admin');
 if (isset($value) && $value==TRUE )
  echo"<a href='".base_url()."'   class='list-group-item' id='1'  >Pharmacy</a>";
 $value = $this->session->userdata('radiology_admin');
 if (isset($value) && $value==TRUE )
  echo"<a href='".base_url()."radiology/patient_req/0'  class='list-group-item' id='2'  > Radiology</a>";
 $value = $this->session->userdata('analysis_admin');
 if (isset($value) && $value==TRUE )
  echo "<a href='".base_url()."' class='list-group-item'  id='3'  >Analyses</a>";
  ?>
</div>

<div class="panel panel-success">
  <div class="panel-heading" id="subtitle">Requests Of</div>
  <div class="panel-body">
  	
  		<table class="table table-striped" ">
	   <?php
	  if ($idd=2 || $x=2)
	  { 
      if (isset($record))
		{
		 if(is_array($record)){
             foreach($record as $row ) 
            {
            	
				if ($row->checked)
					$active='class="success"';
				else
					$active ='class="active"';    	
                echo "<tr".$active.">";
                echo "<td>"."Section Name:"."&nbsp".$row->section_name."</td>";
                echo "<td>"."Request Date:"."&nbsp".$row->date."</td>";
                echo "<td>"."Type:"."&nbsp".$row->photo_kind."</td>";
                echo "<td>"."Part of Body:"."&nbsp".$row->part_of_body."</td>";
                echo "<td> "."Descreption:"."&nbsp".$row->description."</td>";
              	echo "<td>"."<a href = ".base_url()."radiology/upload/".$row->id." >Request Accepted</a><br/>";
				echo "<td>"."<a href ".base_url()."radiology/delete/".$row->id."  >Reject Request </a><br/>";
                echo "</tr>";
            }
         }
	         
		  else
		  	{
		  		echo "<tr class='danger'>";
		  	    echo "<td> No Request Now</td>";
				echo "</tr>";
			}
		 }
		}
		else
			{
				echo "<tr class='danger'>";
	  	    	echo "<td> No Request Now</td>";
				echo "</tr>";
			}
			
    ?>	
		</table>
<form role="form" action="<?php echo base_url();?>radiology/search" Method="POST"> 
 <div class="row">
  <div class="col-xs-4">
    <input type="text" class="form-control" placeholder="" name="search">
  </div>
  <div class="col-xs-3">
	<select class="form-control" placeholder="" name="op">
		  <option value="date">date</option>
		  <option value="section">section</option>
		  <option value="photo_kind">photo_kind</option>
		  <option value="patient_id">patient_id</option>
	</select>	
  </div> 
  <button type="submit" class="btn btn-primary">Search</button>
</div>
 </form> 
</div>
</div>
<?php 
$roll = $this->session->userdata('rollname');
$value = $this->session->userdata('assert_patient');
 if (isset($value) && $value==TRUE )
 echo '
	<div class="panel panel-info">
				<div class="panel-heading">
			    	<h3 class="panel-title"> Enter Patient To A Specific Section </h3>
			  </div>
			  <div class="panel-body">
			    <form role="form" action="<?php echo base_url();?>hospital/assert_patient" Method="POST"> 
					 <div class="row">
					  <div class="col-xs-2">
					    <h4><span class="label label-primary">Patient ID Number</span></h4>
					  </div>
					  <div class="col-xs-3">
					  		<input type="text" class="form-control" placeholder="" name="assert">
					  </div>
					  <div class="col-xs-3">
						<select class="form-control" placeholder="" name="section">
							  <option value="1">Accident and emergency (A&E)</option>
							  <option value="2">Haematology</option>
							  <option value="3">Pain management clinics</option>
							  <option value="4">Ear nose and throat (ENT)</option>
						</select>	
					  </div> 
					  <button type="submit" class="btn btn-primary">Assert</button>
					</div>
 				</form> 
			  </div> 
		';	  			if(isset($done) && $done==FALSE){
			  				echo "<div class='alert alert-danger'>";
							echo "<a>wrong Pateint Id  </a>";
							echo "</div>";
						}
						else if (isset($done) && $done==True){
							echo "<div class='alert alert-success'>";
							echo "<a>Patient Add Successfully</a>";
							echo "</div>";
						} 
			  ?>
	</div>

</body>
</html>