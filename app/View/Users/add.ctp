<!-- app/View/Users/add.ctp -->
<div class="user form">
	<?php echo $this->Form->create('User'); ?>
	<fildset>
		<legend><?php echo __('ユーザー登録'); ?></legend>
		<?php
			echo $this->Form->input('username', array('placeholder' => 'Username', 'label' => 'ユーザー名'));

			echo $this->Form->input('password', array('placeholder' => 'Password','label' => 'パスワード'));

			echo $this->Form->input('role', array('label' => 'ユーザー種別',
            'options' => array('0' => '依頼者', '1' => '建築家', '2' => 'オーナー')
        ));
		?>
	</fildset>
	<?php echo $this->Form->input('送信',array('type'=>'submit','class'=>'btn btn-primary','label'=>''));?> 
</div>


