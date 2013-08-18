<?php
/**
* Application level Controller
*
* This file is application-wide controller file. You can put all
* application-wide controller-related methods here.
*
* PHP 5
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
*/

App::uses('Controller', 'Controller');

/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @package       app.Controller
* @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller {

////////////////////////////////////////////////////////////

	public $components = array(
		'Session',
		'Auth',
		'DebugKit.Toolbar',
		//'Security',
	);

////////////////////////////////////////////////////////////

	public function beforeFilter() {

		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);
		$this->Auth->loginRedirect = array('controller' => 'orders', 'action' => 'index', 'admin' => true);
		$this->Auth->logoutRedirect = array('controller' => 'products', 'action' => 'index', 'admin' => false);

		$this->Auth->authenticate = array(
			AuthComponent::ALL => array(
				'userModel' => 'User',
				'fields' => array(
					'username' => 'username',
					'password' => 'password'
				),
				'scope' => array(
					'User.active' => 1
				)
			), 'Form'
		);

		if(isset($this->request->params['admin']) && ($this->request->params['prefix'] == 'admin')) {
			if($this->Session->check('Auth.User')) {
				$this->layout = 'admin';
			}
		} else {
			$this->Auth->allow();
		}

	}

////////////////////////////////////////////////////////////

	public function admin_switch($field = null, $id = null) {
		$this->autoRender = false;
		$model = $this->modelClass;
		if ($this->$model && $field && $id) {
			$field = $this->$model->escapeField($field);
			return $this->$model->updateAll(array($field => '1 -' . $field), array($this->$model->escapeField() => $id));
		}
		if(!$this->RequestHandler->isAjax()) {
			$this->redirect($this->referer());
		}
	}

////////////////////////////////////////////////////////////

	public function admin_editable() {

		$model = $this->modelClass;

		$id = trim($this->request->data['pk']);
		$field = trim($this->request->data['name']);
		$value = trim($this->request->data['value']);

		$data[$model]['id'] = $id;
		$data[$model][$field] = $value;
		$this->$model->save($data, false);

		$this->autoRender = false;

	}

////////////////////////////////////////////////////////////

}
