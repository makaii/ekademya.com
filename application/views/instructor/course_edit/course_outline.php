<div class="container">
	<div class="row mt-5">
		<div class="col-md-7">
			<h3><?php echo $course['course_title']; ?></h3>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview</a>
		</div>
		<div class="col-md-5">
			<?php if(!empty($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<ul class="nav nav-tabs card-header-tabs">
						<li class="nav-item"><a href="<?php echo base_url("course/edit/info/").$course['course_id']; ?>" class="nav-link">Course Info.</a></li>
						<li class="nav-item"><a href="<?php echo base_url("course/edit/outline/").$course['course_id']; ?>" class="nav-link active">Course Outline</a></li>
						<li class="nav-item"><a href="<?php echo base_url("course/edit/media/").$course['course_id']; ?>" class="nav-link">Promotional Media</a></li>
						<?php if($course['course_review']==1): ?>
							<li class="nav-item"><a href="<?php echo base_url("course/edit/review/").$course['course_id']; ?>" class="nav-link">Course Review</a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="card-body ml-5 mr-5">
					<div class="row">
						<div class="col-md-8">
							<div class="card border-info">
								<div class="card-header border-info text-center">Outline</div>
									<?php if(!empty($outline)): ?>
										<ul class="list-group list-group-flush">
											<?php foreach($outline as $outln): ?>
												<?php if($outln['outline_type']=='video'): ?>
													<li class="list-group-item"><a class="outline-list" href="<?php echo base_url("course/edit/outline/$course_id/video/").$outln['outline_id']; ?>"><?php echo $outln['video_title']; ?>&#9;<i class="fas fa-video"></i></a></li>
												<?php elseif($outln['outline_type']=='lecture'): ?>
													<li class="list-group-item"><a class="outline-list" href="<?php echo base_url("course/edit/outline/$course_id/lecture/").$outln['outline_id']; ?>"><?php echo $outln['lecture_title']; ?>&#9;<i class="far fa-newspaper"></i></a></li>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									<?php else: ?>
										<div class="card-body">
											<h5 class="text-center">Opps. Looks like your course doesn't have any content at the moment, try uploading some.</h5>
										</div>
									<?php endif; ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-body text-center">
									<small class="card-text text-muted">Ekademya courses consists of videos and lectures. To have your course published, you need to upload at least a handful of it.</small>
									<hr>
									<a rolse="button" class="btn btn-sm btn-info" href="<?php echo base_url("course/edit/outline/$course_id/video"); ?>">Add Video</a>
									<a rolse="button" class="btn btn-sm btn-info" href="<?php echo base_url("course/edit/outline/$course_id/lecture"); ?>">Add Lecture</a>
									<a rolse="button" class="btn btn-sm btn-info" href="<?php echo base_url("course/edit/outline/$course_id/quiz"); ?>">Add Quiz</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>