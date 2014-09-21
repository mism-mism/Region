<div class="posts form">
<?php echo $this->Form->create('Request'); ?>
  <fieldset>
    <legend><?php echo __('リノベーション要望'); ?> <small>-建築士、デザイナーに対しての要望を入力してください。</small></legend>
  <?php
 	echo $this->Form->hidden('Request.client_id',array('value' => $this->Session->read('Auth.User.id')));
    echo $this->Form->input('theme',array('label' => 'リノベーションのテーマ','style' => 'width:500px'));
    echo $this->Form->input('price',array('label' => 'リノベーションの予算'));?>
<?php
    echo $this->Form->input('capacity',array('label' => '想定される使用人数'));
	echo $this->Form->input('purpose',array('label' => 'リノベーション後の利用目的','style' => 'width:500px'));    
    echo $this->Form->input('Request.body', array('type' => 'textarea', 'label' => '要望の詳細', 'class' => 'input-xxlarge', 'rows' => 10, 'helpBlock' => '', 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline', 'style' => 'ime-mode: disabled;'))));
	echo $this->Form->input('Request.limit_date',array('label'=>'マッチング期限','type'=>'date','dateFormat'=>'YMD'));
  ?>
  </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>