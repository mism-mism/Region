<div class="page-header">
	<h3><?php echo __('要望詳細') ?>&nbsp;&nbsp;<small>-&nbsp;<?php echo __('依頼がある要望の詳細を表示します') ?></small></h3>
</div>

	<h3><?php echo $row['Request']['theme']; ?></h3>

	<!--Request status
	<p>タスクの状態：<?php if($row['Request']['status'] == 0){
			echo "未実行";
		}elseif($row['Request']['status'] == 1){
			echo "実行中";
		}elseif($row['Request']['status'] == 2){
			echo "完了";
		}?>
	</p>
	-->
<div class="form-horizontal">
	<fieldset>
	
		<div class="control-group">
			<label class="control-label" for="input01"><?php echo __('利用目的') ?></label>
			<div class="controls">
				<p class="help-block"><?php echo h($row['Request']['purpose']) ?></p>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="input01"><?php echo __('想定利用人数') ?></label>
			<div class="controls">
				<p class="help-block"><?php echo h($row['Request']['capacity']) ?></p>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="input01"><?php echo __('依頼詳細') ?></label>
			<div class="controls">
				<p class="help-block"><?php echo nl2br($row['Request']['body']) ?></p>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="input01"><?php echo __('依頼返答期限') ?></label>
			<div class="controls">
				<p class="help-block"><?php echo h($row['Request']['limit_date']) ?></p>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="input01"><?php echo __('登録日') ?></label>
			<div class="controls">
				<p class="help-block"><?php echo h($row['Request']['created']) ?></p>
			</div>
		</div>

		<div class="form-actions">
			<a href="<?php echo $this->Html->url(array('controller' => 'Requests', 'action' => 'index')) ?>" class="btn btn-warning btn-small"><i class="icon-arrow-left icon-white"></i>&nbsp;<?php echo __('戻る') ?></a>
			<a href="<?php echo $this->Html->url(array('controller' => 'requests', 'action' => 'matching', 'id' => $row['Request']['id'])) ?>"  class="btn btn-success btn-small"><i class="icon-eye-open icon-white"></i>&nbsp;<?php echo __('依頼を受ける') ?></a><br >		
		</div>
	</div>
	</fieldset>