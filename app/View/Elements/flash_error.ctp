<?php echo $this->Html->script('flash.js', array('inline' => true)); ?>
<div class="alert alert-error flash-msg">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<?php echo $message; ?>
</div>
