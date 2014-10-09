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
/*
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
		$smtp　= $this->find('all',
			'conditions' => array(
				'Message.source_id' => $this->Session->read('Auth.User.id'),
				'Message.del_flag'=>'0'
				),
			'order' => array('Diary.created' => 'desc');
			);
		$pop = $this->paginate('Message');*/
	
		$this->set('users', $data);
		//$this->set('pop', $pop);
		//$this->set('smtp', $smtp);
	}

	public function send($id = NULL ,$name=null) {
		//物件詳細から飛んだ場合に物件id取得
		if (!empty($this->request->named['realestate_article_id'])) {
			$realestate_article_id = $this->request->named['realestate_article_id'];
			$this->set('test', $realestate_article_id);
		}
		//物件IDが送られれば物件情報取得
		/*if (!empty($this->request->named['realestate_article_id'])) {
			$realestate_article_id = $this->request->named['realestate_article_id'];
			$co=array('realestate_article_id'=>$realestate_article_id);
			$bultukenInfo = $this->requestAction(
			array('controller' => 'Searches', 'action' => 'room'),
				$co
			 	);
				$this->set('test2',$bultukenInfo);
			$data = $realestate_article_id;
			foreach($bultukenInfo['result']['row_set'] as $d) {
				if ($d['realestate_article_id'] == $data){
					$aaa = $d;	
				} $aaa = $d;
				
			}
		} else {
			$article_id = NULL;
		}*/

		//宛先のユーザ情報取得
		$users['receive'] = $this->User->findById($id);
		
		//送り主のユーザ情報取得
		$users['source'] = $this->User->findById($this->Session->read('Auth.User.id'));

		//送受信者のユーザ情報セット
		$this->set('users', $users);

		//内覧以来か建築依頼の判定
		if ($users['receive']['User']['role'] == 1 /*&& $users['source']['User']['role'] == 1*/) {
			//VenderMessage
			$this->set('role', 0);
		} else if ($users['receive']['User']['role'] == 2 /*&& $users['source']['User']['role'] == 2*/) {
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
                $this->redirect(array('controller' => 'Searches', 'action' => 'index'));
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