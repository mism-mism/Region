<?php
class MessagesController extends AppController {
	//public $components = array('Session', 'Auth');
	var $uses = array(
		'Message',
		'User',
	);

	public function index($id = NULL) {
		/*$role1 = array(
			'conditions' => array(
				'User.role' => '1'
				)
			);
		$role2 = array(
			'conditions' => array(
				'User.role' => '2'
				)
			);	
		$role3 = array(
			'conditions' => array(
				'User.role' => '3'
				)
			);*/
		$data = $this->User->find('all');
		$this->set('users', $data);

		$pop = $this->Message->find('all',
			array(
				'conditions' => array(
					'Message.receive_id' => $this->Session->read('Auth.User.id'),
					),
				'order' => array(
					'Message.created' => 'DESC'
					)
				)
			);
		$this->set('messages', $pop);
	}

	public function send($id = NULL) {
		$this->set("id", $id);
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
		$pop = $this->Message->find('first',
			array(
				'conditions' => array(
					'Message.id' => $id
					)
				)
			);
		$this->set('mes', $pop);
	}
}