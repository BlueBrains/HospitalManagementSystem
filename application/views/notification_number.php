<?php if(isset($$num_not) && count($$num_not)>0) : ?>
	 <span class="badge pull-right"><?php echo $num_not[0]->not_number; ?></span>
<?php else :?>
		<span class="badge pull-right">0</span>
<?php endif ?>

