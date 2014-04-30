<fieldset>
	<legend>personal information</legend>
	<?php 
	echo form_open('pharmacy/addOrder/2');
	echo "<label> patient name :</label>";
	echo form_input('patientName','');
	echo "<label> medicine name :</label>";
	echo form_input('medicineName',' ');
	echo "<label> details :</label>";
	echo '<div><textarea name="address"cols="30" rows="4"></textarea></div>';
	echo form_submit('submit','Request');
	echo form_close(); 
	echo validation_errors('<p class = "error">');
	?>
</fieldset>