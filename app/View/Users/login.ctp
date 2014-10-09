<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('ログイン'); ?></legend>
        <?php
        echo $this->Form->input('username', array('placeholder' => 'Username', 'label' => 'ユーザー名'));

        echo $this->Form->input('password', array('placeholder' => 'Password','label' => 'パスワード'));
    	?>
    </fieldset>
	<?php echo $this->Form->input('ログイン',array('type'=>'submit','class'=>'btn btn-primary','label'=>''));?> 
</div>
