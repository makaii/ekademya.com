<style>
	a{
		color: inherit;
	}
	a:hover{
		text-decoration: none;
		color: inherit;
	}
</style>
<div class="container mt-5">
	<?php if(!empty($courses)): ?>
		<div class="card-columns">
			<!-- <?php $counter=1; ?> -->
			<?php foreach($courses as $c): ?>
					<!-- <?php if($counter==1){echo '<div class="card-columns">';} ?> -->
					<div class="card">
						<a href="<?php echo base_url('course/'.$c['course_id']); ?>">
							<img class="card-image-top img-fluid" src="<?php echo base_url('z/thumbnails/'.$c['course_img_url']); ?>" alt="<?php echo $c['course_title']; ?>" title="<?php echo $c['course_title']; ?>"></img>
						</a>
						<div class="card-body pb-3">
							<a href="<?php echo base_url('course/'.$c['course_id']); ?>">
								<p class="card-title text-info"><?php echo ucwords($c['course_title']); ?></p>
							</a>
							<a href="<?php echo base_url('u/'.$c['user_id']); ?>">
								<small class="font-weight-light"><?php echo ucwords($c['user_fname'].' '.$c['user_lname']); ?></small>
							</a>
						</div>
						<!-- <div class="card-body pt-0">
							<div class="text-right">
								<span class="oi oi-clock"></span> 5h
							</div>
						</div> -->
					</div>
					<!-- <?php if($counter==3){echo '</div>';$counter=0;} ?> -->
					<!-- <?php $counter++; ?> -->
			<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="card-columns">
			<div class="card">
				<img class="card-img-top" src="<?php echo base_url('assets/img/3.jpeg'); ?>" alt="sad face" title="sad face">
				<div class="card-body">
					<h5 class="card-title">There are no <?php echo $page_title; ?> yet</h5>
					<p class="card-text">Help us expand by becoming an Instructor creating your own online course</p>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>