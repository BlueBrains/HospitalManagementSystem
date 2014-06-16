<div class="panel panel-primary" style="margin-top:50px">
  <div class="panel-heading">
    <h3 class="panel-title">Profile</h3>
  </div>
  <div class="panel-body">
  	
<div class="media" style="margin-top:10px">
  <div class="pull-left" style="margin: 15px 40px 10px 30px">


    <img class="media-object img-responsive img-thumbnail" src="<?php echo base_url();?>photos/doctors/<?php echo $this->session->userdata('ID') ; ?>.jpg" alt="profile picture">
  </div>
  <div class="media-body" style="margin-top: 130px">
    <h3 class="media-heading">Personal Informations:</h4>
    <div style="margin-left: 40px">
	    <h5><b>FirstName:</b></h5>
	    <h5><b>lastName:</b></h5>
	    <h5><b>Department:</b></h5>
	</div> 
  </div>
</div>
  </div>
</div>
<div class="panel panel-danger" style="margin-top:50px">
  <div class="panel-heading">
    <h3 class="panel-title">Notifications</h3>
  </div>
  <div class="panel-body">
  </div>
</div>


echo $this->session->userdata('isLoggedIn')."</br>";
echo $this->session->userdata('ID');

