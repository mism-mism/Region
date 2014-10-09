<h1>プロフィール編集</h1>
<?php
	echo $this->Form->create('MyPage');
	echo $this->Form->input('comments');
	echo $this->Form->input('Qualification');
	echo $this->Form->file('image');
	echo $this->Form->end('保存する');
?>