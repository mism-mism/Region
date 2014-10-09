<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Message</title>
</head>
<body>
	<div class="wrap">
		<div class="deteil">
			<div class="title">
				<h1>title</h1>
				<?php echo h($mes['Message']['title']); ?>
			</div>
			<div class="mes">
				<h2>body</h2>
				<?php echo h($mes['Message']['body']); ?>
			</div>
			<div class="return">
				<?php echo $this->Html->link('返信',array('action' => 'send', h($mes['Message']['receive_id']))) ?>
			</div>
		</div>
	</div>
</body>
</html>