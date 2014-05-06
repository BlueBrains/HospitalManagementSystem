<?php if (!isset($_SESSION['username'])):?>
		<form class="form-signin" role="form" action="login/validate_credentials" method="post">
	      	<div class='row' style="margin-top:80px">
				<div class="col-md-4 col-md-offset-4">			      
	        		<h2 class="form-signin-heading">Sign in, Please </h2>
	        	</div>
	        </div>
	        <div class="clearfix visible-xs"></div>
	       	<div class='row' style="margin-top:18px">	        	
		        <div class="col-md-4 col-md-offset-4">		        	
		      	  	<input type="text" class="form-control" placeholder="User name" name="username" required>
		        </div>
		    </div>
	        <div class="row" style="margin-top:20px">	        	
		        <div class="col-md-4 col-md-offset-4">		        	
		        	<input type="password" class="form-control" placeholder="Password" name="password" required>
		        </div>
		    </div>
		    <div class="row" style="margin-top:30px">		    
		        <div class="col-md-4 col-md-offset-4 ">
		        	<div class="radio-inline"> 	
				        <label>
				          <input type="radio" name="ID" id="optionsRadios1" value="admin" checked> Admin
				        </label>
			        </div>
			        <div class="radio-inline">
				        <label>
				          <input type="radio" name="ID" id="optionsRadios2" value="doctor"> Doctor
				        </label>
			        </div>
			        <div class="radio-inline">
				        <label>
				          <input type="radio" name="ID" id="optionsRadios3" value="patient"> Patient
				        </label>
			        </div>
		        </div>
		    </div>     
		    <div class="row" style="margin-top:13px">
				<div class="col-md-4 col-md-offset-4">
		        	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		        </div>	        
	        </div>
	    </form>

						<form action="login/validate_credentials" method="post">
<?php else: redirect(); ?>
<?php endif ?>	
	



