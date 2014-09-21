<?php
class MessagesController extends AppController {

	var $uses = array(
		'Message',
		'User',
	);

	public function index($id = NULL) {
		$role0 = array(
			'conditions' => array(
				'User.role' => '0',
				'User.id' => $this->Session->read('Auth.User.id')
				)
			);
		$role1 = array(
			'conditions' => array(
				'User.role' => '1',
				'User.id' => $this->Session->read('Auth.User.id')
				)
			);	
		$role2 = array(
			'conditions' => array(
				'User.role' => '2',
				'User.id' => $this->Session->read('Auth.User.id')
				)
			);
		$data['role']['0'] = $this->User->find('all', $role0);
		$data['role']['1'] = $this->User->find('all', $role1);
		$data['role']['2'] = $this->User->find('all', $role2);
		$this->set('users', $data);

		$pop = $this->Message->find('all',
			array(
				'conditions' => array(
					'Message.source_id' => $id,
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

	public function view() {
		$ids = $this->Message->find('all',
			array(
				'conditions' => array(
					'Message.receive_id' =>  $this->Session->read('Auth.User.id')
					)
				)
			);
		$this->set('mesView', $ids);
	}
}