<?php

class Request extends AppModel{
	
	public $validate = array(
		// タスク追加
		'theme' => array(
			'required' => array('rule' => 'notEmpty', 'message' => '※リノベーションのテーマは必須項目です.', 'last' => true), 
		),
		'purpose' => array(
			'required' => array('rule' => 'notEmpty', 'message' => '※利用目的は必須項目です.', 'last' => true), 
		),
		'body' => array(
			'required' => array('rule' => 'notEmpty', 'message' => '※依頼詳細は必須項目です.', 'last' => true), 
		),
		'price' => array(
			'required' => array('rule' => 'notEmpty', 'message' => '※依頼予算は必須項目です.', 'last' => true), 
		),
		'limit_date' => array(
			'required' => array('rule' => 'notEmpty', 'message' => '※依頼返答期限は必須項目です.'), 
		),
		
	);

}