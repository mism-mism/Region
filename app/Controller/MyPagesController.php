<?php
class MyPagesController extends AppController
{
   /* 
	* 建築家のマイページに関する処理
	* 各ユーザ(建築家)プロフィールの初期登録・編集・
	* 各種情報の表示などを行う
	*/

	//使用するヘルパー・コンポーネントなどの設定
	public $uses       = array( 'MyPage' , 'user' );
	public $helpers    = array( 'Html' , 'Form' , 'Session' );
	public $components = array( 'Session' );
	
	
	/*---------- エラー回避用ページのメソッド(HelloWorldが表示される) ----------*/
	public function index()
	{
		
	}
	
	
	/*---------------------- マイページのトップ画面 ----------------------*/
	public function MyPage()
	{
		$user_id = $this->Auth->user('id');	//ユーザー(建築家)のIDを格納
		$time    = date( 's' ) % 6;			//乱数値を格納　シード値は時刻(秒数のみ)
	
		//ユーザーのプロフィール情報が存在しなかったら、プロフィール登録ページへジャンプ
		if( ($this->MyPage->findByUserId( $user_id )) == NULL )
			return $this->redirect( array( 'action' => 'add' ) );
		
		//アクセスしたユーザーが建築家でなかったら、「サイトのトップページ」へジャンプ
		//未実装
		if( $this->Auth->user('role') != 1 )
			return $this->redirect( array( 'controller'=>'serches','action'=>'index') );
		
		//データベースからプロフィール情報を取得
		$data = $this->MyPage->find( 'all' );
		
		//データベースから値を取得できなかったらエラーを投げる
		if( !data )
			throw new NotFoundException( __('Invalid data') );
		
		//表示するダミーのプロフィール画像を、乱数値から選択し、viewへセット
		switch( $time )
		{
			case 0: $this->set( 'imgfilename' , 'Boy.bmp' ); break;
			case 1: $this->set( 'imgfilename' , 'Foy.jpg' ); break;
			case 2: $this->set( 'imgfilename' , 'Kawagoe.jpg' ); break;
			case 3: $this->set( 'imgfilename' , 'Oliveoil.jpg' ); break;
			case 4: $this->set( 'imgfilename' , 'Pelsona.jpg' ); break;
			case 5: $this->set( 'imgfilename' , 'Superphenomenon.jpg' ); break;
		}
		
		// debug($this->MyPage->find('all'));	デバッグ用
		//各種情報を表示するため、viewに値をセット
		$this->set( 'mypages' , $this->MyPage->find('all') );
		
	}
	
	
	/*--------------------- プロフィールの初期登録画面 ---------------------*/
	public function add()
	{
		//直前のページからのリクエストが「post」なら登録処理実行
		if( $this->request->is('post') )
		{
			//プロフィールのIDは、ユーザのIDに自動的に設定
			$this->request->data['MyPage']['user_id'] = $this->Auth->user( 'id' );
			
			//登録ボタンが押されたら
			if( $this->MyPage->save($this->request->data) )
			{
				$this->Session->setFlash( __('プロフィールを登録しました。') );
				//マイページのトップへジャンプ
				$this->redirect(array('action' => 'MyPage'));
			}
		}

	}
	
	
	/*---------------------- プロフィールの再編集画面 ----------------------*/
	public function edit( $id = null )
	{
		
		//よくわかんない(エラー処理)
		if( !$id )
			throw new NotFoundException( __('Invalid post') );
		
		$mypage = $this->MyPage->findById( $id );
		
		//よくわかんない(エラー処理)
		if( !$mypage )
			throw new NotFoundException( __('Invalid data') );
		
		//直前のページからのリクエストが「post」または「put」なら実行
		if( $this->request->is('post','put') )
		{
			$this->MyPage->id = $id;
			
			//登録ボタンが押されたら(保存が実行されたら)
			if( $this->MyPage->save($this->request->data) )
			{
				$this->Session->setFlash( __('プロフィールを変更しました。') );
				//マイページのトップ画面へジャンプ
				return $this->redirect( array('action'=>'MyPage') );
			}
			$this->Session->setFlash( __('プロフィールの編集が中断されました。') );
		}
		
	}
	
	
}