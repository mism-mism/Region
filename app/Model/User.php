<?php
class User extends Model {
	public $validate = array(
 	 'username' => array(
 	 	'notempty' => array(
 	 		'rule' => array('notempty'),
 	 		),
 	 		'Unique' => array(
 	 			'rule' => array('isUnique'),
 	 			'message' => 'そのユーザー名は使われています。'
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