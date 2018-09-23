<div class="pt-5 pb-3 mb-4" style="background-color: #227093;">
	<div class="container">
		<div class="row">
			<div class="col-md-8 text-white">
				<h2><?php echo $course['course_title']; ?></h2>
				<h6>About this Course</h6>
				<?php if (!empty($course['course_description'])): ?>
					<p class="lead" style="font-size:1rem"><?php echo nl2br($course['course_description']); ?></p>
				<?php else: ?>
					<?php echo "N/A"; ?>
				<?php endif; ?>
			</div>
			<div class="col-md-4">
				<div class="card" style="background-color: #f7f1e3;">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<img class="img-round img-round-thumb" src="<?php echo base_url("z/instructor/").$author['user_img_url']; ?>">
							</div>
							<div class="col-md-8">
								<h5 class="text-muted font-weight-bold"><?php echo ucwords($author['user_fname'].' '.$author['user_lname']); ?></h5>
								<h6 class="card-subtitle text-muted"><?php echo ucwords($author['user_headline']); ?></h6>
							</div>
						</div>
						
						<small class="card-text text-muted"><?php echo ucwords($author['user_bio']); ?></small>
						<hr>
						<div class="text-center">
							<?php if (!empty($author['user_website'])){echo '<a href="https://'.$author['user_website'].'" target="_blank"><i class="fas fa-2x fa-envelope-square"></i></a>';} ?>
							<?php if (!empty($author['user_facebook'])){echo '<a href="https://'.$author['user_facebook'].'" target="_blank"><i class="fab fa-2x  fa-facebook-square"></i></a>';} ?>
							<?php if (!empty($author['user_googleplus'])){echo '<a href="https://'.$author['user_googleplus'].'" target="_blank"><i class="fab fa-2x  fa-google-plus-square"></i></a>';} ?>
							<?php if (!empty($author['user_linkedin'])){echo '<a href="https://'.$author['user_linkedin'].'" target="_blank"><i class="fab fa-2x  fa-linkedin-in"></i></a>';} ?>
							<?php if (!empty($author['user_twitter'])){echo '<a href="https://'.$author['user_twitter'].'" target="_blank"><i class="fab fa-2x  fa-twitter-square"></i></a>';} ?>
							<?php if (!empty($author['user_youtube'])){echo '<a href="https://'.$author['user_youtube'].'" target="_blank"><i class="fab fa-2x  fa-youtube-square"></i></a>';} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Course Outline</h5>
					<ul class="list-group list-group-flush">
						<?php if(!empty($outline)): ?>
							<?php foreach($outline as $o): ?>
								<li class="list-group-item">
									<?php if(!empty($o['video_title'])): ?>
										<?php echo $o['video_title']; ?>
									<?php elseif(!empty($o['lecture_title'])): ?>
										<?php echo $o['lecture_title']; ?>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						<?php else: ?>
							<?php echo "No Outline Yet"; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card bg-light">
				<div class="card-body">
					<h5 class="card-title">What will I learn?</h5>
					<p class="card-subtitle text-muted"><?php if(!empty($course['course_achievement'])){echo nl2br($course['course_achievement']);}else echo "N/A"; ?></p>
				</div>
				<div class="card-body">
					<h5 class="card-title">Who can take this?</h5>
					<p class="card-subtitle text-muted"><?php if(!empty($course['course_audience'])){echo nl2br($course['course_audience']);}else echo "N/A"; ?></p>
				</div>
				<div class="card-body">
					<h5 class="card-title">What are the requirements?</h5>
					<p class="card-subtitle text-muted"><?php if(!empty($course['course_tools'])){echo nl2br($course['course_tools']);}else echo "N/A"; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>