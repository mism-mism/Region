<?php
class MyPagesController extends AppController
{
	
	public $uses = array( 'MyPage' , 'user' );
	public $helpers = array( 'Html' , 'Form' , 'Session' );
	public $components = array( 'Session' );
	
	public function index()
	{
		
	}
	
	public function MyPage()
	{
		$user_id = $this->Auth->user('id');
		$time = date( 's' ) % 6;
	
		if( ($this->MyPage->findByUserId( $user_id )) == NULL )
		{
			return $this->redirect( array( 'action' => 'add' ) );
		}
		
		if( $this->Auth->user('role') != 1 )
		{
			return $this->redirect( array( 'action' => 'index' ) );
		}
		
		$data = $this->MyPage->find( 'all' );
		
		if( !data )
		{
			throw new NotFoundException( __('Invalid data') );
		}
		
		switch( $time )
		{
			case 0: $this->set( 'imgfilename' , 'Boy.bmp' ); break;
			case 1: $this->set( 'imgfilename' , 'Foy.jpg' ); break;
			case 2: $this->set( 'imgfilename' , 'Kawagoe.jpg' ); break;
			case 3: $this->set( 'imgfilename' , 'Oliveoil.jpg' ); break;
			case 4: $this->set( 'imgfilename' , 'Pelsona.jpg' ); break;
			case 5: $this->set( 'imgfilename' , 'Superphenomenon.jpg' ); break;
		}
		
		//debug($this->MyPage->find('all'));
		$this->set( 'mypages' , $this->MyPage->find('all') );
		
	}
	
	public function add()
	{
		if ($this->request->is('post')) {
        $this->request->data['MyPage']['user_id'] = $this->Auth->user('id'); //Added this line
        if ($this->MyPage->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been saved.'));
            $this->redirect(array('action' => 'MyPage'));
        }
    }
		/*$user_id = $this->Session->read( 'user.Auth.id' );
        $this->MyPage->create();
		$this->request->data = array( 'user_id' => $user_id );
		if( $this->MyPage->save($this->request->data) )
		{
			$this->Session->setFlash(__('プロフィールを作成しました。'));
			return $this->redirect(array('action' => 'MyPage'));
		}
		$this->Session->setFlash(__('空欄の個所を入力してください。'));
        */
	}
	
	public function edit( $id = null )
	{
		
		if( !$id )
		{
			throw new NotFoundException( __('Invalid post') );
		}
		
		$mypage = $this->MyPage->findById( $id );
		if( !$mypage )
		{
			throw new NotFoundException( __('Invalid data') );
		}
		
		if( $this->request->is('post' , 'put' ) )
		{
			$this->MyPage->id = $id;
			if( $this->MyPage->save($this->request->data) )
			{
				$this->Session->setFlash( __('プロフィールを変更しました。') );
				return $this->redirect( array( 'action' => 'MyPage' ) );
			}
			$this->Session->setFlash( __('プロフィールの編集が中断されました。') );
		}
		
		
	}
	
}