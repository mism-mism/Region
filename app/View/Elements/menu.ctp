<div class="nav-collapse">
	<ul class="nav">
		<li<?php echo $this->name === 'Homes' ? ' class="active"' : '' ?>><a href="<?php echo $this->Html->url(array('controller' => 'homes', 'action' => 'index')) ?>"><i class="icon-home icon-white"></i>&nbsp;<?php echo __('Home') ?></a></li>
		<li<?php echo $this->name === 'Messages' ? ' class="active"' : '' ?>><a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'index')) ?>"><i class="icon-envelope icon-white"></i>&nbsp;<?php echo __('メッセージ') ?></a></li>
		<li<?php echo $this->name === 'Tasks' ? ' class="active"' : '' ?>><a href="<?php echo $this->Html->url(array('controller' => 'tasks', 'action' => 'index')) ?>"><i class="icon-tasks icon-white"></i>&nbsp;<?php echo __('タスク管理') ?></a></li>
		<li<?php echo $this->name === 'BusinessReports' ? ' class="active"' : '' ?>><a href="<?php echo $this->Html->url(array('controller' => 'business_reports', 'action' => 'index')) ?>"><i class="icon-pencil icon-white"></i>&nbsp;<?php echo __('営業報告') ?></a></li>
		<li<?php echo $this->name === 'MeetingReports' ? ' class="active"' : '' ?>><a href="<?php echo $this->Html->url(array('controller' => 'MeetingReports', 'action' => 'index')) ?>"><i class="icon-file icon-white"></i>&nbsp;<?php echo __('議事録') ?></a></li>
		<li class="dropdown<?php echo in_array($this->name, array('ZipCodes', 'BusinessPhases', 'Clients', 'Users')) ? ' active' : '' ?>">
			<a href="#master" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i>&nbsp;<?php echo __('マスタ管理') ?><span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'index')) ?>"><?php echo __('プロジェクトマスタ') ?></a></li>
				<!--<li><a href="<?php echo $this->Html->url(array('controller' => 'zip_codes', 'action' => 'index')) ?>"><?php echo __('郵便番号マスタ') ?></a></li>-->
				<li><a href="<?php echo $this->Html->url(array('controller' => 'business_phases', 'action' => 'index')) ?>"><?php echo __('営業フェーズマスタ') ?></a></li>
				<li><a href="<?php echo $this->Html->url(array('controller' => 'clients', 'action' => 'index')) ?>"><?php echo __('営業先マスタ') ?></a></li>
				<li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')) ?>"><?php echo __('ユーザマスタ') ?></a></li>
			</ul>
		</li>
	</ul>

	<ul class="nav pull-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i>&nbsp;<?php echo h($this->Session->read('Auth.User.name')) ?><span class="caret"></span></a>
			<ul class="dropdown-menu">
				<!--<li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', 'id' => $row['User']['id'])) ?>"><?php echo __('プロフィール変更') ?></a></li>-->
				<li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')) ?>"><?php echo __('ログアウト') ?></a></li>
			</ul>
		</li>
	</ul>
</div><!--/.nav-collapse -->