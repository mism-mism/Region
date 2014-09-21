<div class="page-header">
	<h3><?php echo __('お仕事要望一覧') ?>&nbsp;<small>-&nbsp;<?php echo __('未マッチングのお仕事一覧') ?></small></h3>
</div>

<?php if (!empty($rows)): ?>
	<?php echo $this->Element('pagination'); ?>
	<table class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('Request.id', __('ID')) ?></th>
				<th><?php echo $this->Paginator->sort('Request.theme', __('要望テーマ')) ?></th>
				<th><?php echo $this->Paginator->sort('Request.price',__('希望予算')) ?></th>
				<th><?php echo $this->Paginator->sort('Request.created', __('登録日時')) ?></th>
				<th width="20%"><?php echo __('操作') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($rows as $key => $row): ?>
				<tr>
					<td><?php echo h($row['Request']['id']) ?></td>
					<td><?php echo h($row['Request']['theme']) ?></td>
					<td><?php echo h($row['Request']['price']) ?></td>
					<td><?php echo h($row['Request']['created']) ?></td>
					<td><a href="<?php echo $this->Html->url(array('controller' => 'requests', 'action' => 'detail', 'id' => $row['Request']['id'])) ?>"  class="btn btn-success btn-small"><i class="icon-eye-open icon-white"></i>&nbsp;<?php echo __('詳細') ?></a><br >
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->Element('pagination'); ?>
<?php endif; ?>