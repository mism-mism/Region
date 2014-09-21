<div class="row">
<?php foreach ($data['result']['row_set'] as $da):?>
	<div class="col-md-9 container">
	 	<div class="col-md-7">
		<table class="table">
			<tr>
				
				<td><p><?php echo $da['point1'];?></p></td>
			<p><td><?php echo $this->Html->image($da['photo_aspect'],array('width'=>'100','height'=>'100'))?></td></p>
			</tr>
		</table>
		</div>
	</div>

 <?php endforeach; ?>
 <div class="container">
  <div class="panel-heading">パネルタイトル</div>
  <div class="panel-body">
    本文や枠内のコンテンツ
  </div>
</div>
</div>

