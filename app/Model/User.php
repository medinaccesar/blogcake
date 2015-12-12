<?php
// app/Model/User.php
App::uses('AppModel', 'Model');

class User extends AppModel {
	
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Se requiere el nombre de usuario'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Se requiere una clave'
			)
		),
		'role' => array(
			'valid' => array(
				'rule' => array(
					'inList', 
					array('admin', 'author')
				),
				'message' => 'Introduce un rol válido',
				'allowEmpty' => false
			)
		)
	);
}

?>