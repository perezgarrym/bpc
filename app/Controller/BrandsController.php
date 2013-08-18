<?php
App::uses('AppController', 'Controller');
class BrandsController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
		$brands = $this->Brand->find('all', array(
			'recursive' => -1,
			'conditions' => array(
				'Brand.active' => 1
			),
			'order' => array(
				'Brand.name' => 'ASC'
			)
		));
		$this->set(compact('brands'));
	}

////////////////////////////////////////////////////////////

	public function view($slug = null) {
		$brand =  $this->Brand->find('first', array(
			'conditions' => array(
				'Brand.active' => 1,
				'Brand.slug' => $slug
			)
		));
		if(empty($brand)) {
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('brand'));

		$this->paginate = array(
			'recursive' => -1,
			'contain' => array(
				'Brand'
			),
			'limit' => 20,
			'conditions' => array(
				'Product.active' => 1,
				'Product.brand_id' => $brand['Brand']['id'],
				'Brand.active' => 1,

			),
			'order' => array(
				'Product.name' => 'ASC'
			),
			'paramType' => 'querystring',
		);
		$products = $this->paginate($this->Brand->Product);

		$this->set(compact('products'));

	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Brand->recursive = -1;
		$this->set('brands', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException('Invalid brand');
		}
		$brand = $this->Brand->find('first', array(
			'conditions' => array(
				'Brand.id'
			)
		));
		$this->set(compact('brand'));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Brand->create();
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash('The brand has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The brand could not be saved. Please, try again.');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException('Invalid brand');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash('The brand has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The brand could not be saved. Please, try again.');
			}
		} else {
			$brands = $this->Brand->find('first', array(
				'conditions' => array(
					'Brand.id'
				)
			));
			$this->request->data = $brands;
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException('Invalid brand');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Brand->delete()) {
			$this->Session->setFlash('Brand deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Brand was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}