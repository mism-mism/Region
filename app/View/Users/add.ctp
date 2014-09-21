<!-- app/View/Users/add.ctp -->
<div class="user form">
	<?php echo $this->Form->create('User'); ?>
	<fildset>
		<legend><?php echo __('Add User'); ?></legend>
		<?php
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->input('role', array(
            'options' => array('client' => 'Client', 'vender' => 'Vender', 'owner' => 'Owner')
        ));
		?>
	</fildset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
