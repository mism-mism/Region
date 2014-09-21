<?php

class RequestsController extends AppController{

	
	//$user_id = $this->Auth->user('id');
	
	public function post(){
		
		//ユーザー種類判定
		$user_role = $this->Auth->user('role');
		if($user_role != 0){
			$this->Session->setFlash(__('アクセスできません.'),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
			);
			$this->redirect('/MyPages/index');
		}
		
		if($this->request->isPost() || $this->request->isPut()) {
			if($this->Request->save($this->request->data)) {
				$this->Session->setFlash(__('要望を登録しました.'),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect('/MyPages/index');
			} 
		}	
	}
	
	public function index(){
		
		//ユーザー種類判定
		$user_role = $this->Auth->user('role');
		if($user_role != 1){
			$this->Session->setFlash(__('アクセスできません.'),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
			);
			$this->redirect('/MyPages/index');
		}
		
		$this->paginate = array(
			'conditions' => array(
				'del_flg' => 0,
				'status_flg' => 0,
				), 
			'limit' => 10,
			);
		
/*		$options = array(
			'conditions' => array(
				'del_flg' => 0,
				'status_flg' => 0
			),
		);*/
			
//		$request = $this->Request->find('all',$options);
		$this->set('rows',$this->paginate('Request'));
		
	}
}