
<h2>Category</h2>

<table>
	<tr>
		<td>Id</td>
		<td><?php echo h($category['Category']['id']); ?></td>
	</tr>
	<tr>
		<td>Parent Category</td>
		<td><?php echo $this->Html->link($category['ParentCategory']['name'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); ?></td>
	</tr>
	<tr>
		<td>Lft</td>
		<td><?php echo h($category['Category']['lft']); ?></td>
	</tr>
	<tr>
		<td>Rght</td>
		<td><?php echo h($category['Category']['rght']); ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo h($category['Category']['name']); ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo h($category['Category']['slug']); ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo h($category['Category']['description']); ?></td>
	</tr>
	<tr>
		<td>Product Count</td>
		<td><?php echo h($category['Category']['product_count']); ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($category['Category']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($category['Category']['modified']); ?></td>
	</tr>
</table>

<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('Edit Category', array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink('Delete Category', array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link('List Categories', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('New Category', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('List Categories', array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('New Parent Category', array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('List Products', array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('New Product', array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3>Related Categories</h3>
	<?php if (!empty($category['ChildCategory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>Id</th>
		<th>Category Id</th>
		<th>Lft</th>
		<th>Rght</th>
		<th>Name</th>
		<th>Slug</th>
		<th>Description</th>
		<th>Product Count</th>
		<th>Created</th>
		<th>Modified</th>
		<th class="actions">Actions</th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['ChildCategory'] as $childCategory): ?>
		<tr>
			<td><?php echo $childCategory['id']; ?></td>
			<td><?php echo $childCategory['category_id']; ?></td>
			<td><?php echo $childCategory['lft']; ?></td>
			<td><?php echo $childCategory['rght']; ?></td>
			<td><?php echo $childCategory['name']; ?></td>
			<td><?php echo $childCategory['slug']; ?></td>
			<td><?php echo $childCategory['description']; ?></td>
			<td><?php echo $childCategory['product_count']; ?></td>
			<td><?php echo $childCategory['created']; ?></td>
			<td><?php echo $childCategory['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('View', array('controller' => 'categories', 'action' => 'view', $childCategory['id'])); ?>
				<?php echo $this->Html->link('Edit', array('controller' => 'categories', 'action' => 'edit', $childCategory['id'])); ?>
				<?php echo $this->Form->postLink('Delete', array('controller' => 'categories', 'action' => 'delete', $childCategory['id']), null, __('Are you sure you want to delete # %s?', $childCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link('New Child Category', array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3>Related Products</h3>
	<?php if (!empty($category['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th>Id</th>
			<th>Category Id</th>
			<th>Category</th>
			<th>Brand Id</th>
			<th>Brand</th>
			<th>Name</th>
			<th>Slug</th>
			<th>Description</th>
			<th>Image</th>
			<th>Price</th>
			<th>Weight</th>
			<th>Active</th>
			<th>Views</th>
			<th>Created</th>
			<th>Modified</th>
			<th class="actions">Actions</th>
		</tr>
		<?php foreach ($category['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['category_id']; ?></td>
			<td><?php echo $product['category']; ?></td>
			<td><?php echo $product['brand_id']; ?></td>
			<td><?php echo $product['brand']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['slug']; ?></td>
			<td><?php echo $product['description']; ?></td>
			<td><?php echo $product['image']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td><?php echo $product['weight']; ?></td>
			<td><?php echo $product['active']; ?></td>
			<td><?php echo $product['views']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('View', array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link('Edit', array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('New Product', array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

