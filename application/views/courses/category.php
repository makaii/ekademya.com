<div class="container mt-5">
	<?php if(!empty($courses)): ?>
		<div class="card-deck">
			<?php foreach($courses as $c): ?>
					<div class="card">
						<img class="card-image-top img-fluid" src="<?php echo base_url('z/thumbnails/'.$c['course_img_url']); ?>" alt="<?php echo $c['course_title']; ?>" title="<?php echo $c['course_title']; ?>"></img>
						<div class="card-body pb-0">
							<p class="card-title"><?php echo $c['course_title']; ?></p>
							<small><?php echo ucwords($c['user_fname'].' '.$c['user_lname']); ?></small>
						</div>
						<div class="card-body pt-0">
							<div class="text-right">
								<span class="oi oi-clock"></span> 5h
							</div>
						</div>
					</div>
			<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="card-columns">
			<div class="card">
				<img class="card-img-top" src="<?php echo base_url('images/z/1.jpeg'); ?>" alt="sad face" title="sad face">
				<div class="card-body">
					<h5 class="card-title">There are no courses yet</h5>
					<p class="card-text">Help by expanding our catalog by joining us and creating your own online course</p>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>