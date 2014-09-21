<?php
App::import('Vendor', 'Client');
App::import('Vendor', 'Request');

class SearchesController extends AppController{
	public $helpers = array('js');
   public function index(){
    	$res=null;
    	$num=1;
    	$con=array();
   		$res=$this->room($con);


  		$this->set('data',$res);
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