<div class="col-md-6 col-md-offset-3">
<div class="row">
	<div class="span4">
		<h4><?php echo $data["hide_realestate_article_name"];?></h4>
	</div>
	<div class="span9">
		<div class="span3">
		<?php  
			echo $this->Html->image($data["photo_aspect_mobile"],array('class'=>'thumbnail'));
		?>
		</div>
		<div class="span5">
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
								echo $data['full_address'];
							?>
						</td>
						<td>
							<?php
								if(!empty ($data['station_name_1'])){
									echo $data['station_name_1'];
								}else{
									echo "Unknown";
								}
							?>
						</td>
						<td>
							徒歩<?php
								if(!empty ($data['walk_minutes_text_1'])){
									echo $data['walk_minutes_text_1'];
								}else{
									echo "Unknown";
								}
							?>
						</td>
						<td>
							<?php
							if(!empty ($data['house_age'])){
								echo $data['house_age'];
							}else{
								echo "Unknown";
							}
							?>年

						</td>

					</tr>
				</table>
		</div>
	</div>
		<div class="span4">
			<div class="span5">
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
								echo $data['full_address'];
							?>
						</td>
						<td>
							<?php
								if(!empty ($data['station_name_1'])){
									echo $data['station_name_1'];
								}else{
									echo "Unknown";
								}
							?>
						</td>
						<td>
							徒歩<?php
								if(!empty ($data['walk_minutes_text_1'])){
									echo $data['walk_minutes_text_1'];
								}else{
									echo "Unknown";
								}
							?>
						</td>
						<td>
							<?php
							if(!empty ($data['house_age'])){
								echo $data['house_age'];
							}else{
								echo "Unknown";
							}
							?>年

						</td>

					</tr>
				</table>
			</div>
	<div class="span5">
		
		<a>
		<?php echo $this->Html->link('ないらんよやく',array('controller' => 'messages', 'action' => 'send', 'realestate_article_id' => $data['realestate_article_id'],$user_id=$this->session->read('Auth.User.id')),array('type'=>'button','class'=>'btn btn-primary btn-lg　glyphicon glyphicon-star'));
		?></a>
	</div>
	</div>
	</div>
</div>

</div>