<h2>Admin Edit Category</h2>

<?php echo $this->Form->create('Category'); ?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('category_id', array('empty' => true)); ?>
<?php //echo $this->Form->input('lft'); ?>
<?php //echo $this->Form->input('rght'); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('slug'); ?>
<?php echo $this->Form->input('description'); ?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Category.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Category.id'))); ?>

<br />
<br />
