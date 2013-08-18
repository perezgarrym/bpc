<h2>Admin Add Product</h2>

<br />

<?php echo $this->Form->create('Product'); ?>
<?php echo $this->Form->input('brand_id'); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('slug'); ?>
<?php echo $this->Form->input('description'); ?>
<?php echo $this->Form->input('image'); ?>
<?php echo $this->Form->input('price'); ?>
<?php echo $this->Form->input('weight'); ?>
<?php echo $this->Form->input('quantity'); ?>
<?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>

<br />
<br />

