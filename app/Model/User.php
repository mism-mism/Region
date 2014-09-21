<?php
class User extends Model {
	public $validate = array(
 	 'username' => array(
 	 	'notempty' => array(
 	 		'rule' => array('notempty'),
 	 		),
 	 		'Unique' => array(
 	 			'rule' => array('isUnique'),
 	 			'message' => 'そのUsernameは使われています。'
 	 		)
 	 	),
 	 	'password' => array(
 	 		'notempty' => array(
 	 			'rule' => array('notempty'),
 	 		),
 	 	),
	);
}
?>