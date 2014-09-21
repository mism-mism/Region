<?php
class MessagesController extends AppController {

	var $uses = array(
		'Message',
		'User',
	);

	public function index() {
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
					'Message.source_id' => '10',
					),
				'order' => array(
					'Message.created' => 'DESC'
					)
				)
			);
		$this->set('messages', $pop);
	}

	public function send($id = NULL) {
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

	public function deteil() {

	}
}