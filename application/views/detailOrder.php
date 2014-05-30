<h1 class="text-info">Full Details for<small> order number : <?php  echo $result->id; ?></small></h1>
<hr>
<div class="container">
<div class="row" style="margin-top:30px">
	<table class="table table-hover table-bordered">
		<thead>
			<th class="active" colspan="2">
				<h3 class="text-danger text-center">Dr.<?php echo $result->firstName.' '.$result->lastName ;  ?>
				<larg class="text-muted">offered </larg>
				<?php echo $result->tradeName; ?>
				<larg class="text-muted">to</larg>
				<?php echo $result->pfirstName.' '.$result->plastName ;  ?>
				<larg class="text-muted">with this details: </larg></h3>
			</th>
		</thead>
		<tbody>
			<div class="row">
				<tr class="info">				
					<h4>										
						<td style="width:12%">
							<div class="col-sm-2">
								<h4><strong class="text-info">Caliber:</strong></h4>
							</div>
						</td>			
						<td>						
							<div class="col-sm-4"> 
								<p class="lead text-warning"><larg> <?php echo $result->caliber; ?></larg> </p>									
							</div> 													
						</td>				
					</h4>				
				</tr>		
			</div>
			<div class="row">
				<tr>							
					<td style="width:12%">
						<div class="col-sm-2">
							<h4><strong class="text-info">Dose:</strong></h4>
						</div>
					</td>
					<td>					
						<div class="col-sm-4">
								<p class="lead text-warning"><larg> <?php echo $result->dose; ?></larg> </p>								
						</div>									
					</td>				
				</tr>
			</div>
			<div class="row">
				<tr class="info">									
					<td style="width:12%">
							<div class="col-sm-2">
								<h4><strong class="text-info">More Details:</strong></h4>
							</div>
					</td>
					<td>
						<div class="col-sm-4">
							<p class="lead text-warning"><larg><?php echo $result->details; ?></larg></p>
						</div>
					</td>
				</tr>
			</div>			
		</tbody>			
	</div>
</div>



<!-- <h3 class="text-warning text-center"><?php echo $result->firstName.' '.$result->lastName ;  ?>
	<small>offered </small>
	<?php echo $result->tradeName; ?>
	<small>to</small>
	<?php echo $result->pfirstName.' '.$result->plastName ;  ?>
	<small>with this details: </small></h3>
<hr>
	
<!-- <h4><strong class="text-info">Caliber:</strong>
	<div class="row">
	<div class="col-xs-12 col-sm-4 col-sm-offset-1"><p class="lead text-danger"><larg> <?php echo $result->caliber; ?></larg></div>
	</div>		
	</h4>
	
<h4><strong class="text-info">Dose:</strong>
	<div class="row">
	<div class="col-xs-12 col-sm-4 col-sm-offset-1"><p class="lead text-danger"><larg> <?php echo $result->dose; ?></larg></div>
	</div>		
	</h4>


<h4><label><strong class="text-info">More Details:</strong></label></h4>
<div class="row">
<div class="col-xs-12 col-sm-4 col-sm-offset-1"><p class="lead text-danger"><larg><?php echo $result->details; ?></larg></p></div>
</div>

</div>
</div> -->
