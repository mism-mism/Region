<?php
class MessagesController extends AppController {
	//public $components = array('Session', 'Auth');
	var $uses = array(
		'Message',
		'User',
	);

	public function index($id = NULL) {
		//不動産、依頼者、建築者三つに分けて取得
		$role0 = array(
			'conditions' => array(
				'User.role' => '0'
				)
			);
		$role1 = array(
			'conditions' => array(
				'User.role' => '1'
				)
			);	
		$role2 = array(
			'conditions' => array(
				'User.role' => '2'
				)
			);
		$data['role']['0'] = $this->User->find('all', $role0);
		$data['role']['1'] = $this->User->find('all', $role1);
		$data['role']['2'] = $this->User->find('all', $role2);

		//自分あてのメッセージを新着取得
		/*$pop = $this->Message->find('all',
			array(
				'conditions' => array(
					'Message.receive_id' => $this->Session->read('Auth.User.id'),
					),
				'order' => array(
					'Message.created' => 'DESC'
					)
				)
			);*/

		$this->paginate = array(
				'conditions'=>array(
					'Message.receive_id' => $this->Session->read('Auth.User.id'),
					'Message.del_flag'=>'0'
					),

					// 取得件数の定義
					'limit'=>'3',

					//取得順の定義
					'order'=>array('Diary.created'=>'desc')
				);

		$pop = $this->paginate('Message');
	
		$this->set('users', $data);
		$this->set('messages', $pop);
	}

	public function send($id = NULL) {
		//送り先のID取得
		$this->set("id", $id);

		$userinfo = $this->User->findById($id);

		if ($userinfo['User']['role'] == 1) {
			//VenderMessage
			$this->set('role', 0);
		} else if ($userinfo['User']['role'] == 2) {
			//OwnerMessage
			$this->set('role', 1);
		} else {
			//Claiant同士
			$this->set('role', 2);
		}

		//メッセージ送信
		if ($this->request->is('post')) {
            if ($this->Message->save($this->request->data)) 
            {
                $this->Session->setFlash(__('成功!!'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('失敗!!'));
            }
        }
	}

	public function deteil($id = NULL) {
		//洗濯したメッセージの内容取得
		$pop = $this->Message->find('first',
			array(
				'conditions' => array(
					'Message.id' => $id
					)
				)
			);

		$this->set('mes', $pop);
	}

	public function view() {
		//内覧メッセージと建築メッセージを分けて取得
		$data['preview'] = $this->Message->find('all',
			array(
				'conditions' => array(
					'Message.receive_id' =>  $this->Session->read('Auth.User.id'),
					'Message.role' => '0'
					)
				)
			);

		$data['creat'] = $this->Message->find('all',
			array(
				'conditions' => array(
					'Message.receive_id' =>  $this->Session->read('Auth.User.id'),
					'Message.role' => '1'
					)
				)
			);

		$this->set('Mes', $data);
	}
}