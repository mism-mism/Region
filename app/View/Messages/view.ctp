<?php foreach ($mesView as $mes): ?>
				<?php echo $this->Html->link(h($mes['Message']['title']), array('action' => 'deteil', h($mes['Message']['id']))) ?>
				<hr>
			<?php endforeach ?>	