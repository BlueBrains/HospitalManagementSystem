<script src='<?php echo base_url();?>javascript/patient-view.js'></script>
<script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
<ul class="nav nav-tabs" role="tablist">
<li class="active"><a href="#public"  data-toggle='tab'>Public</a></li>
<li><a href="#private" data-toggle='tab'>Private Information</a></li>
<li><a href="#family"  data-toggle='tab'>Family Information</a></li>
<li><a href="#health"  data-toggle='tab'>Health Recored</a></li>
</ul>
<div class='tab-content'>
	<div class="tab-pane active" id="public">
		<?php $this->load->view('patient/_view_public'); ?>
	</div>

	<div class='tab-pane' id='private'>
		<?php $this->load->view('patient/_view_private'); ?>
	</div>

	<div class='tab-pane' id='family'>
		<?php $this->load->view('patient/_view_family'); ?>
	</div>

	<div class='tab-pane' id='health'>
		<?php $this->load->view('patient/_view_health'); ?>
	</div>
</div>
</div>