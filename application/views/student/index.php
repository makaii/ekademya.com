<div class="jumbotron pb-1">
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="display-4">My Courses</p>
			</div>
		</div>
	</div>
</div>
<style>
	a:hover{
		text-decoration: none;
	}
</style>
<div class="container">
	<div class="row">
		<?php if($courses==null): ?>
			<div class="col-12 col-sm-6 col-md-3">
				<div class="card mb-3">
					<div class="card-body pb-0">
						<h5 class="card-title">You haven't enrolled into any courses</h5>
					</div>
					<a href="">
						<img class="card-img-top course-thumb-img" src="<?php echo base_url('assets/img/4.jpeg'); ?>" alt="<?php  ?>" title="<?php  ?>"></img>
					</a>
					<div class="card-body pb-2">
						<small class="card-title font-weight-bold"><?php echo substr("Click here to search", null, 45)."..."; ?></small>
						<br>
						<a href="" style="text-decoration: none; color: inherit;"><small class="font-weight-light">Ekademya</small></a>
						<hr>
						<div class="text-right">
							<span class="oi oi-clock"></span> 0h
						</div>
					</div>
				</div>
			</div>
		<?php elseif(!empty($courses)): ?>
			<?php foreach($courses as $c): ?>
				<div class="col-12 col-sm-6 col-md-3">
					<div class="card mb-3">
						<a href="<?php echo base_url(); ?>">
							<img class="card-img-top course-thumb-img" src="<?php echo base_url('z/thumbnail/'.$c['course_img_url']); ?>" alt="<?php echo $c['course_title']; ?>" title="<?php echo $c['course_title']; ?>"></img>
						</a>
						<div class="card-body pb-0">
							<a href="<?php echo base_url('mycourse/'.$c['course_id']); ?>">
								<small class="card-title font-weight-bold"><?php echo ucwords(substr($c['course_title'], null, 45)); ?></small>
							</a>
							<br>
							<a href="<?php echo base_url(); ?>" style="text-decoration: none; color: inherit;"><small class="font-weight-light"><?php echo ucwords($c['user_fname'].' '.$c['user_lname']); ?></small></a>
							<hr>
							<div class="text-right">
								<span class="oi oi-clock"></span> 0h
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>