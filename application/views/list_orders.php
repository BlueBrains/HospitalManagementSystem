<div class="row">
	<table class="table">
		<thead>
			<th>#</th>
			<th>Doctor</th>
			<th>Patient</th>
			<th>Medicine</th>
			<th>Caliber</th>
			<th>Accept</th>
			<th>Reject</th>
		</thead>
		<tbody>
	<?php
	$disabled;	
		foreach ($results as $data) {
			if($data->quantity == 0) $disabled = "disabled"; else $disabled = "";  			
			echo "<tr>
					<td>$data->id</td>
					<td>$data->firstName $data->lastName</td>
					<td>$data->pfirstName $data->plastName</td>
					<td>$data->tradeName</td>
					<td>$data->caliber</td>";
		if($data->confirmed)
			echo 	"<td><button type='button' class='btn btn-success active'>Confirmed</button></td>
					 <td><a class='btn btn-default' href='../detailOrder/$data->id' role='button'>Details</a></td>
				 </tr>";
		else				 								
			echo	"<td><a class='btn btn-primary ".$disabled."' href='../confirmOrder/$data->id' role='button'>Accept</a></td>
					<td><a class='btn btn-danger' href='../rejectOrder/$data->id' role='button'>Reject</a></td>
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