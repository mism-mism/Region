<?php

class RequestsController extends AppController{

	
	$user_id = $this->Auth->user('id');
	
	public function index(){
		
		$user_role = $this->Auth->user('role');
		
	}
}