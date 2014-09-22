<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Message</title>
</head>
<body>
	<div class="wrap">
		<!--依頼によって表示を変える-->	
		<?php if ($role == 1){ ?>
		 	<h1>建築依頼</h1>
		 	<p>
				この物件をデザインしませんか？
				<?php echo $this->Html->link('物件情報', array('controller' => 'searches', 'action' => 'show', 'id' => $test)) ?>
			</p>
		<?php }elseif ($role == 2){ ?>
			<h1>内覧依頼</h1>
			<p>
				この物件を内覧させて下さい
				<?php echo $this->Html->link('物件情報', array('controller' => 'searches', 'action' => 'show', 'id' => $test)) ?>
			</p>
		<?php }else{ ?> 
			<h1>クライアント交流</h1>
		<?php }; ?>
		


		<div class="form">
			<?php
				echo $this->Form->create('Message');
				echo $this->Form->input('title',array('label'=>'タイトル','id'=>'summernote','rows'=>'1','class'=>'input-block-level','required' => false));
				echo $this->Form->input('body',array('label'=>'本文','id'=>'summernote','rows'=>'18','class'=>'input-block-level','required' => false));
			?>
		<?php echo $this->Form->hidden('source_id',array('value' => $this->Session->read('Auth.User.id'))); ?>
		<?php echo $this->Form->hidden('receive_id',array('value' => $id)); ?>
		<?php echo $this->Form->hidden('role',
		array('value' => $role)); ?>
		<?php echo $this->Form->input('送信',array('type'=>'submit','class'=>'btn btn-primary','label'=>''));?>
		<?php echo $this->Form->end();?>
		</div>
	</div>
</body>
</html>