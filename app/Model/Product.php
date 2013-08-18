<?php
App::uses('AppModel', 'Model');
class Product extends AppModel {

////////////////////////////////////////////////////////////

	public $validate = array(
		'name' => array(
			'rule1' => array(
				'rule' => array('notempty'),
				'message' => 'Name is invalid',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'rule2' => array(
				'rule' => array('isUnique'),
				'message' => 'Name is not uniqie',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'rule1' => array(
				'rule' => array('notempty'),
				'message' => 'Slug is invalid',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'rule2' => array(
				'rule' => array('isUnique'),
				'message' => 'Slug is not uniqie',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			'notempty' => array(
				'rule' => array('decimal'),
				'message' => 'Price is invalid',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'weight' => array(
			'notempty' => array(
				'rule' => array('decimal'),
				'message' => 'Weight is invalid',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

////////////////////////////////////////////////////////////

	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'Brand' => array(
			'className' => 'Brand',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
	);

////////////////////////////////////////////////////////////

	public function updateViews($products) {

		if(!isset($products[0])) {
			$a = $products;
			unset($products);
			$products[0] = $a;
		}

		$this->unbindModel(
			array('belongsTo' => array('Category', 'Brand'))
		);

		foreach($products as $product) {
			$this->updateAll(
				array(
					'Product.views' => 'Product.views + 1',
				),
				array('Product.id' => $product['Product']['id'])
			);
		}

	}

////////////////////////////////////////////////////////////

}