<div class="preview">
	<h1>建築依頼メッセージ</h1>
	<?php foreach ($Mes['preview'] as $mes): ?>
		<?php
			echo $this->Html->link(h($mes['Message']['title']), array('action' => 'deteil', h($mes['Message']['id'])));
			echo $this->Html->link(h($mes['User']['username']), array('action' => 'view', h($mes['User']['id'])));
		 ?>	
					<hr>
	<?php endforeach; ?>	
</div>

<div class="creat">
	<h1>建築依頼メッセージ</h1>
	<?php foreach ($Mes['creat'] as $mes): ?>
	<?php echo $this->Html->link(h($mes['Message']['title']), array('action' => 'deteil', h($mes['Message']['id']))) ?>	
				<hr>
<?php endforeach; ?>	
</div>