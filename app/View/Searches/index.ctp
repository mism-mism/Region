<div class="col-md-6 col-md-offset-3">
	<?php foreach ($data['result']['row_set'] as $da):?>
	<div class="col-md-6 col-md-offset-3">
	 	<div class="span7">
	 		<h3><?php echo $da['realestate_article_name'];?></h3>
	 　	</div>
	 			
		 <div class="row span10">
	 		<div class='span3'>
	 			<p><?php echo $this->Html->image($da['photo_aspect'],array('class'=>'thumbnail'))?></p>
			</div>
			<div class="span3">
			<a href="<?php echo $this->Html->url(array('controller' => 'searches', 'action' => 'show', 'id' => $da['realestate_article_id'])) ?>"  class="btn btn-success btn-small"><i class="icon-eye-open icon-white"></i>&nbsp;<?php echo __('詳細') ?></a>
		</div>
			<div class="span6 table-responsive">
				<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>
							所在地
						</th>
						<th>
							最寄り駅
						</th>
						<th>
							徒歩
						</th>
						<th>
							築年数
						</th>
					</tr>
					</thead>
					<tr>
						<td>
							<?php
								echo $da['full_address'];
							?>
						</td>
						<td>
							<?php
								if(!empty ($da['station_name_1'])){
									echo $da['station_name_1'];
								}else{
									echo "Unknown";
								}
							?>
						</td>
						<td>
							徒歩<?php
								if(!empty ($da['walk_minutes_text_1'])){
									echo $da['walk_minutes_text_1'];
								}else{
									echo "Unknown";
								}
							?>
						</td>
						<td>
							<?php
							if(!empty ($da['house_age'])){
								echo $da['house_age'];
							}else{
								echo "Unknown";
							}
							?>年

						</td>

					</tr>
				</table>
				
			</div>
		</div>
		<div class="row span9">
		<div class="span5">
				<p><?php if(!empty ($da['notes'])){
					echo $da['notes'];
					}?>
					</p>
				
		</div>
		
		</div>
	</div>

 <?php endforeach; ?>
 </div>

