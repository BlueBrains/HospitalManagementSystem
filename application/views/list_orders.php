<div class="row">
	<table class="table">
		<thead>
			<th>#</th>
			<th>Doctor</th>
			<th>Meicine</th>
			<th>Accept</th>
			<th>Reject</th>
		</thead>
		<tbody>
	<?php
		foreach ($results as $data) {
			echo "<tr>
					<td>$data->id</td>
					<td>$data->doctorID</td>
					<td>$data->medicineID</td>
					<td><button class='btn btn-success'>Accept</button></td>
					<td><button class='btn btn-danger'>Reject</button></td>
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