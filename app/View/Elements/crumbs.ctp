<?php if (isset($breadcrumbs) && !empty($breadcrumbs)): ?>
	<ul class="breadcrumb">
		<?php foreach ($breadcrumbs as $key => $breadcrumb): ?>
			<li<?php echo $key === count($breadcrumbs)-1 ? ' class="active"' : '' ?>>
				<?php if (isset($breadcrumb['link']) && !empty($breadcrumb['link'])): ?>
					<a href="<?php echo $this->Html->url($breadcrumb['link']) ?>">
						<?php if (isset($breadcrumb['name']) && !empty($breadcrumb['name'])): ?>
							<?php echo h($breadcrumb['name']) ?>
						<?php endif; ?>
					</a>
				<?php else: ?>
					<?php if (isset($breadcrumb['name']) && !empty($breadcrumb['name'])): ?>
						<?php echo h($breadcrumb['name']) ?>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($key < count($breadcrumbs)-1): ?>
					&nbsp;<span class="divider">></span>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>