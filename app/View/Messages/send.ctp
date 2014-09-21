<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Message</title>
</head>
<body>
	<div class="wrap">
		<div class="form">
			<?php
				echo $this->Form->create('Message');
				echo $this->Form->input('body',array('label'=>'本文','id'=>'summernote','rows'=>'18','class'=>'input-block-level','required' => false));
			?>
		<?php echo $this->Form->hidden('source_id',array('value' => '10'
		/*$this->Auth->user('id')*/)); ?>
		<?php echo $this->Form->input('送信',array('type'=>'submit','class'=>'btn btn-primary','label'=>''));?>
		<?php echo $this->Form->end();?>
		</div>
	</div>
</body>
</html>