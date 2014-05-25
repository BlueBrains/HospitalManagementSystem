<html>
<body>

<form action="<?php echo base_url();?>radiology/send_photo/<?php echo $id ?>" method="post"
enctype="multipart/form-data">
<label for="fic">Filename:</label>
<input type="file" name="fic" id="fic"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>