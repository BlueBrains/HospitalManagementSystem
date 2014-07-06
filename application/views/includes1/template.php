<?php $this->load->view('includes/header.php');  ?>
<?php $this->load->view('includes/side_bar.php');  ?>
<div id="page-wrapper" >
	<div id="page-inner">
<?php $this->load->view($main_content);  ?>
		<hr />               
	</div>
<!-- /. PAGE INNER  -->
</div>
<?php $this->load->view('includes/footer.php');  ?>