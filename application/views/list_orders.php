<div class="list-group">
	<?php
		foreach ($results as $data) {
			echo "<a href='#' class='list-group-item'>
					$data->medicineID
				 </a>";
		}

	echo $links
	?>

</div>