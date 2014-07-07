<div class="row">
	<table class="table">
		<thead>
			<th>#</th>
			<th>Doctor</th>
			<th>Patient</th>
			<th>Medicine</th>
			<th>Caliber</th>
			<th>state</th>
			<th>action</th>
			<th>details</th>
		</thead>
		<tbody>
	<?php
	$disabled;	
		foreach ($results as $data) {
			if($data->quantity == 0) $disabled = "disabled"; else $disabled = "";  			
			echo "<tr>
					<td>$data->id</td>
					<td>$data->fname $data->lname</td>
					<td>$data->pfname $data->plname</td>
					<td>$data->tradeName</td>
					<td>$data->caliber</td>";
		if($data->state == 2)
			echo 	"<td><button type='button' class='btn btn-success disabled'>Finished</button></td>
					 <td></td>
					 <td><a class='btn btn-default' href='".base_url()."pharmacy_supervisor/detail_request/id/$data->id' role='button'>Details</a></td>
				 </tr>";
		else if($data->state == 1)
			echo 	"<td><button type='button' class='btn btn-success disabled'>Confirmed</button></td>
					 <td><a class='btn btn-default' href='".base_url()."pharmacy_supervisor/finish_request/id/$data->id' role='button'>Finish</a></td>
					 <td><a class='btn btn-default' href='".base_url()."pharmacy_supervisor/detail_request/id/$data->id' role='button'>Details</a></td>
				 </tr>";				 
		else				 								
			echo	"<td><button type='button' class='btn btn-success disabled'>waiting</button></td>
					 <td><a class='btn btn-primary ".$disabled."' href='".base_url()."pharmacy_supervisor/confirm_request/id/$data->id' role='button'>Accept</a></td>
				     <td><a class='btn btn-default' href='".base_url()."pharmacy_supervisor/detail_request/id/$data->id' role='button'>Details</a></td>
				 </tr>";
		}
	?>
	</tbody>
	</table>
</div>
	
<div class="row">
	<div class="col-xs-12">
		<?php echo $links; ?>
	</div>
</div>