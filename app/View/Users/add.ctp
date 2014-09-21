<!-- app/View/Users/add.ctp -->
<div class="user form">
	<?php echo $this->Form->create('User'); ?>
	<fildset>
		<legend><?php echo __('ユーザー登録'); ?></legend>
		<?php
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->input('role', array(
            'options' => array('0' => 'Client', '1' => 'Vender', '2' => 'Owner')
        ));
		?>
	</fildset>
	<?php echo $this->Form->input('送信',array('type'=>'submit','class'=>'btn btn-primary','label'=>''));?> 
</div>


