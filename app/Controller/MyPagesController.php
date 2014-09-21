<?php
class MyPagesController extends AppController
{
	
	public $uses = array( 'MyPage' , 'user' );
	public $helpers = array( 'Html' , 'Form' , 'Session' );
	public $components = array( 'Session' );
	
	public function index()
	{
		$this->set( 'datas' , $this->MyPage->find('all') );
	}
	
	public function MyPage()
	{
		$user_id = $this->request->named['id'];
	
		if( ($this->MyPage->findById( $user_id )) == NULL )
		{
			return $this->redirect( array( 'action' => 'add' ) );
		}
	
		/*if( !$id )
		{
			$this->MyPage->create();
			
			//throw new NotFoundException( __('Invalid data id') );
		}*/
		
		$data = $this->MyPage->findById( $id );
		
		if( !data )
		{
			throw new NotFoundException( __('Invalid data') );
		}
		$this->set( 'data' , $data );
	
		//$datas = $this->MyPage->find( 'all' );
		//$this->set( 'datas' , $datas );
	}
	
	public function add()
	{
		
		$user_id = $this->Session->read( 'user.Auth.id' );
        $this->MyPage->create();
		$this->request->data = array( 'id' => $user_id );
		if($this->MyPage->save($this->request->data))
		{
			$this->Session->setFlash(__('プロフィールを作成しました。'));
			return $this->redirect(array('action' => 'MyPage'));
		}
		$this->Session->setFlash(__('空欄の個所を入力してください。'));
        
	}
	
	public function edit()
	{
		if( $this->request->is('data') )
		{
			if( $this->MyPage->save($this->request->data) )
			{
				$this->Session->setFlash( __('プロフィールを変更しました。') );
				return $this->redirect( array( 'action' => 'MyPage' ) );
			}
			$this->Session->setFlash( __('プロフィールの編集が中断されました。') );
		}
	}
	
	private function upload( $uploaddir )
	{
	
		//$uploadfile = $uploaddir.basename( $this->data[][][] )
	
	}
	
}