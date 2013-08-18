<h2>User</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td><?php echo __('Id'); ?></td>
		<td><?php echo h($user['User']['id']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Username'); ?></td>
		<td><?php echo h($user['User']['username']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Password'); ?></td>
		<td><?php echo h($user['User']['password']); ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($user['User']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($user['User']['modified']); ?></td>
	</tr>
</table>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('Edit User', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-default')); ?> </li>

<br />
<br />

<?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>

<br />
<br />