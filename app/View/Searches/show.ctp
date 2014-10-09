
<div class="col-md-6 col-md-offset-3">

<div class="row">
	<div class="span4">
		
		<h4><?php echo $data["hide_realestate_article_name"];?></h4>
		<blockquote class="blockquote-reverse">
			<h10><?php echo $data["realestate_article_name_ruby"]?></h10>
		</blockquote>
	</div>
	<div class="span9">
		<div class="span3">
		<?php  
			echo $this->Html->image($data["photo_aspect_mobile"],array('class'=>'thumbnail'));
		?>
		</div>
		<div class="span4">
			<div class="span5">
			<table class="table table-bordered table-striped">
					<tr>
						<td>
							所在地
						</td>
						<td>
							<?php
								echo $data['full_address'];
							?>
						</td>

					</tr>
					<tr>
						<td>
							交通
						</td>
						<td>
							<?php
								echo $data['full_traffic'];
							?>
						</td>
					<tr>
						<td>
							様式
						</td>
						<td>
							<?php
								if(!empty ($data['building_structure_name'])){
									echo $data['building_structure_name'];
								}else{
									echo "Unknown";
								}
							?>
						</td>
					</tr>
						
						<td>
							築年数/階数
						</td>
						<td>
							<?php
							if(!empty ($data['house_age'])){
								echo $data['house_age'];
							}else{
								echo "Unknown";
							}
							?>年/
							<?php 
								if(!empty ($data['number_of_stories_text'])){
									echo $data["number_of_stories_text"];
								}else{
									echo "Unknown";
								}
							?>

						</td>

					</tr>
					<tr>
						<td>
							広さ
						</td>
						<td>
							<?php
								if(!empty ($data['house_tsubo_text'])){
									echo $data['house_tsubo_text'];
								}else{
									echo "Unknown";
								}
							?>
						</td>
					</tr>
				</table>
			</div>
			<div class="span5">
			
			<a>
			<?php echo $this->Html->link('内覧予約',array('controller' => 'messages', 'action' => 'send', 'realestate_article_id' => $data['realestate_article_id'],$user_id=$this->session->read('Auth.User.id')),array('type'=>'button','class'=>'btn btn-		primary btn-lg　glyphicon glyphicon-star'));
			?></a>
			</div>
		</div>
	</div>
	</div>
	<div class="container">
		<?php $num=0;?>
		<table>
			<tr>
    			<?php foreach ($data['photos']as $da):?>
    				<?php $num++;
    				if($num>=5):
    					$num=0;
    				?>
    					</tr>
    					<tr>
    				<?php
    				endif;
    				?>
    				<td>
					<div class="span2">
						<?php echo $this->Html->image($da["mobile_url"],array('class'=>'thumbnail'));?>
					</div>
					</td>
		 		<?php endforeach; ?>
		 		</tr>
		 </table>
	</div>
</div>

