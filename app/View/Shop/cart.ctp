<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php $this->Html->addCrumb('Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>

<h1>Shopping Cart</h1>

<?php if(empty($shop['OrderItem'])) : ?>

Shopping Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'cartupdate'))); ?>

<hr>

<div class="row">
	<div class="col col-lg-1">#</div>
	<div class="col col-lg-7">ITEM</div>
	<div class="col col-lg-1">PRICE</div>
	<div class="col col-lg-1">QUANTITY</div>
	<div class="col col-lg-1">SUBTOTAL</div>
	<div class="col col-lg-1">REMOVE</div>
</div>

<?php $tabindex = 1; ?>
<?php foreach ($shop['OrderItem'] as $item): ?>
	<div class="row" id="row-<?php echo $item['Product']['id']; ?>">
		<div class="col col-lg-1"><?php echo $this->Html->image('/images/small/' . $item['Product']['image'], array('class' => 'px60')); ?></div>
		<div class="col col-lg-7"><strong><?php echo $this->Html->link($item['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $item['Product']['slug'])); ?></strong></div>
		<div class="col col-lg-1" id="price-<?php echo $item['Product']['id']; ?>"><?php echo $item['Product']['price']; ?></div>
		<div class="col col-lg-1"><?php echo $this->Form->input('quantity-' . $item['Product']['id'], array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlength' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['Product']['id'], 'value' => $item['quantity'])); ?></div>
		<div class="col col-lg-1" id="subtotal-<?php echo $item['Product']['id']; ?>"><?php echo $item['subtotal']; ?></div>
		<div class="col col-lg-1"><span class="remove" id="<?php echo $item['Product']['id']; ?>"></span></div>
	</div>
<?php endforeach; ?>

<hr>

<div class="row">
	<div class="col col-lg-12">
		<div class="pull-right">
		<?php echo $this->Html->link('<i class="icon-remove icon"></i> Clear Cart', array('controller' => 'shop', 'action' => 'clear'), array('class' => 'btn btn-danger', 'escape' => false)); ?>
		&nbsp; &nbsp;
		<?php echo $this->Form->button('<i class="icon-refresh icon"></i> Recalculate', array('class' => 'btn btn-default', 'escape' => false));?>
		<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

<hr>

<div class="row">
	<div class="col col-lg-12 pull-right tr">
		Subtotal: <span class="normal" id="subtotal">Php <?php echo $shop['Order']['subtotal']; ?></span>
		<br />
		<br />
		Sales Tax: <span class="normal">N/A</span>
		<br />
		<br />
		Shipping: <span class="normal">N/A</span>
		<br />
		<br />
		Order Total: <span class="red" id="total">Php <?php echo $shop['Order']['total']; ?></span>
		<br />
		<br />

		<?php echo $this->Html->link('<i class="icon-arrow-right icon-white"></i> Checkout', array('controller' => 'shop', 'action' => 'address'), array('class' => 'btn btn-primary', 'escape' => false)); ?>

		<br />
		<br />

		<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'step1'))); ?>
		<input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal' class="sbumit" />
		<?php echo $this->Form->end(); ?>
		<!--
		<?php echo $this->Html->image('https://checkout.google.com/buttons/checkout.gif?w=180&h=46&style=white&variant=text&loc=en_US', array('url' => array('controller' => 'shop', 'action' => 'googlecheckout'))); ?>
		-->
	</div>
</div>

<br />
<br />

<?php endif; ?>
