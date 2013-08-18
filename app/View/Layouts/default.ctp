<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		<?php __('Barbra Pearls Cosmetics'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800' rel='stylesheet' type='text/css'>

	<?php echo $this->Html->css(array('css.css','bootstrap.css','shop/boot-business.css')); ?>
	<lin1k rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<?php echo $this->Html->script(array('jquery.min.js','jquery-ui.min.js','bootstrap.min.js', 'respond.min.js', 'js.js')); ?>
	<?php echo $this->App->js(); ?>
	<?php echo $this->fetch('meta'); ?>
	<?php echo $this->fetch('css'); ?>
	<?php echo $this->fetch('script'); ?>

  


	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '<?php echo Configure::read('Settings.ANALYTICS'); ?>']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

<?php if($this->Session->check('Shop')) : ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cartbutton').show();
	});
</script>
<?php endif; ?>

</head>
<body>
	<div class="navbar-inverse navbar-static-top">
		<div class="container">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo $this->Html->url('/'); ?>">Barbra Pearls Cosmetics</a>
			<div class="nav-collapse collapse">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Html->link('Home', array('controller' => 'products', 'action' => 'view')); ?></li>
					<li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'products')); ?></li>
					<li><?php echo $this->Html->link('Brands', array('controller' => 'brands', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link('Search', array('controller' => 'products', 'action' => 'search')); ?></li>
				</ul>
				<ul class="navbar-form form-inline pull-right">
					<?php echo $this->Form->create('Product', array('type' => 'GET', 'url' => array('controller' => 'products', 'action' => 'search'))); ?>

					<?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'input-sm', 'autocomplete' => 'off')); ?>
					<?php echo $this->Form->button('Search', array('div' => false, 'class' => 'btn btn-sm btn-primary')); ?>
					&nbsp;
					<span id="cartbutton" style="display:none;">
					<?php echo $this->Html->link('Shopping Cart', array('controller' => 'shop', 'action' => 'cart'), array('class' => 'btn btn-sm btn-success')); ?>
					</span>
					<?php echo $this->Form->end(); ?>
				</ul>
			</div>
		</div>
	</div>

	
	<div class="content"  style="min-height: 600px;" >

		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<br />
		<!--	<ul class="breadcrumb">
				<?php echo $this->Html->link('Home', array('controller' => 'products', 'action' => 'index')); ?> / <?php echo $this->Html->getCrumbs(' / '); ?>
			</ul>-->
			<?php echo $this->fetch('content'); ?>
			<br />
			<div id="msg"></div>
			<br />
		</div>
	</div>



	<footer>
		<div class="container">
			<p>&copy; 2013 Barbra Pearls Cosmetics. All Rights Reserved.</p>
		</div>
    </footer>



</body>
</html>
