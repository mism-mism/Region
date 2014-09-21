<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Message</title>
</head>
<body>
	<div class="wrap">
		<div class="pops">
		<h1>新着メール一覧</h1>
			<?php foreach ($messages as $mes): ?>
				<?php echo $this->Html->link(h($mes['Message']['title']), array('action' => 'deteil', h($mes['Message']['id']))) ?>
				<hr>
			<?php endforeach ?>	
		</div>

		<div class="view">
			<div class="0">
				<h1>0</h1>
				<?php foreach ($users['role']['0'] as $user): ?>
					<?php if ($user['User']['id'] != $this->Session->read('Auth.User.id')): ?>
						<?php echo $this->Html->link(h($user['User']['username']),array('action'=>'send', h($user['User']['id'])))?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="1">
				<h1>1</h1>
				<?php foreach ($users['role']['1'] as $user): ?>
					<?php if ($user['User']['id'] != $this->Session->read('Auth.User.id')): ?>
						<?php echo $this->Html->link(h($user['User']['username']),array('action'=>'send', h($user['User']['id'])))?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

			<div class="2">
				<h1>2</h1>
				<?php foreach ($users['role']['2'] as $user): ?>
					<?php if ($user['User']['id'] != $this->Session->read('Auth.User.id')): ?>
						<?php echo $this->Html->link(h($user['User']['username']),array('action'=>'send', h($user['User']['id'])))?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			
			</div>
		</div>
	</div>
</body>
</html>