<?php
App::uses('AppModel', 'Model');
class User extends AppModel {

//////////////////////////////////////////////////

	public function beforeSave($options = array()) {
		if(isset($this->data[$this->name]['password'])) {
			$this->data[$this->name]['password'] = AuthComponent::password($this->data[$this->name]['password']);
		}
		return true;
	}

//////////////////////////////////////////////////

}
