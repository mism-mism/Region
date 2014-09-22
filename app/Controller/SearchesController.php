<?php
App::import('Vendor', 'Client');
App::import('Vendor', 'Request');

class SearchesController extends AppController{
	public $helpers = array('js');
   public function index(){
    	$res=null;
    	$num=1;
    	$con=array('city_id'=>'17206');
   		$res=$this->room($con);


  		$this->set('data',$res);
    }

    public function show($id=NULL) {
    	$res=null;
    	$id=$this->request->named['id'];
    	
    	$con=array('realestate_article_id'=>$id);
   		$res=$this->room($con);
  


  		$this->set('data',$res);
  		$this->set('data1',$con);
	}

    public function facet($con){
		$resource = '/realestate_article/search/facet';
		$cli = new Client();
		$data = $cli->get($resource, $con);
    	return $data;
    }

    public function room($con){
    	$resource = '/realestate_article/search/room';
    	$cli = new Client();
    	$data = $cli->get($resource, $con);
    	return $data;
    }

    public function realestate_article($con){
    	$resource = '/realestate_article';
    	$cli = new Client();
		$data = $cli->get($resource, $con);
    	return $data;
    }
}