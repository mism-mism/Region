<a>
<?php echo $this->Html->link('依頼内容',array('controller' => 'messages', 'action' => 'send', 'realestate_article_id' => $data['result']['row_set']['0']['realestate_article_id'],$user_id=$this->session->read('Auth.User.id')),array('type'=>'button','class'=>'btn btn-primary btn-lg　glyphicon glyphicon-star'));
?>
