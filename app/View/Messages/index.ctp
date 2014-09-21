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
			<?php foreach ($users['role']['0'] as $user): ?>
				<?php echo $this->Html->link(h($user['User']['username']),array('action'=>'send', h($user['User']['id'])))?>
			<?php endforeach ?>	
			<?php foreach ($users['role']['1'] as $user): ?>
				<?php echo $this->Html->link(h($user['User']['username']),array('action'=>'send', h($user['User']['id'])))?>
			<?php endforeach ?>	
			<?php foreach ($users['role']['2'] as $user): ?>
				<?php echo $this->Html->link(h($user['User']['username']),array('action'=>'send', h($user['User']['id'])))?>
			<?php endforeach;/*<h1>不動産</h1>
				<?php foreach ($users as $user): ?>
					<?php if ($user['User']['role'] == 0): ?>
						
					<?php echo $this->Html->link(h($user['User']['username']),array('action'=>'send', h($user['User']['id']))) ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>	
			</div>

			<div class="1">
				<h1>依頼者</h1>
				<?php foreach ($users as $user): ?>
					<?php if ($user['User']['role'] == 1): ?>
					<?php echo $this->Html->link(h($user['User']['username']),array('action'=>'send', h($user['User']['id'])))?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

			<div class="2">
				<h1>建築者</h1>
				<?php foreach ($users as $user): ?>
					<?php if ($user['User']['role'] == 2): ?>
					<?php echo $this->Html->link(h($user['User']['username']),array('action'=>'send', h($user['User']['id'])))?>
					<?php endif; ?> ?>
			</div>
		</div>
	</div>
</body>
</html>