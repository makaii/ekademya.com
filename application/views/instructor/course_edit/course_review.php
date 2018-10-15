<style>
	a{
		text-decoration: none;
		color: inherit;
	}
	a:hover{
		text-decoration: none;
		color: inherit;
	}
</style>
<div style="background-color: #17505D;" class="pb-3 pt-3 mb-5 mb-5">
	<div class="container text-white">
		<h4>
			<span class="text-info">
				<a href="<?php echo base_url("course/edit/outline/$course_id"); ?>"><?php echo ucwords($course['course_title']); ?></a>
			</span>
		</h4>
		<div>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview</a>
		</div>
	</div>
</div>
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
						<li class="nav-item"><a href="<?php echo base_url("course/edit/outline/").$course['course_id']; ?>" class="nav-link">Course Outline</a></li>
						<li class="nav-item"><a href="<?php echo base_url("course/edit/media/").$course['course_id']; ?>" class="nav-link">Promotional Media</a></li>
						<?php if($course['course_review']==1): ?>
							<li class="nav-item"><a href="<?php echo base_url("course/edit/review/").$course['course_id']; ?>" class="nav-link active">Course Review</a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header"><?php echo $course['course_title']; ?> Course Info</div>
								<div class="card-body quote ml-4">
									<h5>
										Title : <?php echo ucwords($course['course_title']); ?>
										<a href="<?php echo base_url("course/edit/info/$course_id#course_title"); ?>">#</a>
										</h5>
									<p class="card-text text-muted quote-green"><?php echo $review_i['review_title']; ?></p>
									<hr>
									<h5>
										Category : <?php echo ucwords($course['category_name']); ?>
										<a href="<?php echo base_url("course/edit/info/$course_id#course_category"); ?>">#</a>
										</h5>
									<p class="card-text text-muted quote-green"><?php echo $review_i['review_category']; ?></p>
									<hr>
									<h5>
										Type : <?php echo ucwords($course['course_type']); ?>
										<a href="<?php echo base_url("course/edit/info/$course_id#course_type"); ?>">#</a>
										</h5>
									<p class="card-text text-muted quote-green"><?php echo $review_i['review_category']; ?></p>
									<hr>
									<h5>
										Description
										<a href="<?php echo base_url("course/edit/info/$course_id#course_description"); ?>">#</a>
									</h5>
									<p class="catd-text text-muted quote"><?php echo $course['course_description']; ?></p>
									<p class="card-text text-muted quote-green"><?php echo $review_i['review_description']; ?></p>
									<hr>
									<h5>
										Achievement
										<a href="<?php echo base_url("course/edit/info/$course_id#course_achievement"); ?>">#</a>
									</h5>
									<p class="catd-text text-muted quote"><?php echo nl2br($course['course_achievement']); ?></p>
									<p class="card-text text-muted quote-green"><?php echo $review_i['review_achievement']; ?></p>
									<hr>
									<h5>
										Tools and Knowledge
										<a href="<?php echo base_url("course/edit/info/$course_id#course_tools"); ?>">#</a>
									</h5>
									<p class="catd-text text-muted quote"><?php echo nl2br($course['course_tools']); ?></p>
									<p class="card-text text-muted quote-green"><?php echo $review_i['review_tools']; ?></p>
									<hr>
									<h5>
										Audience
										<a href="<?php echo base_url("course/edit/info/$course_id#course_audience"); ?>">#</a>
									</h5>
									<p class="catd-text text-muted quote"><?php echo nl2br($course['course_audience']); ?></p>
									<p class="card-text text-muted quote-green"><?php echo $review_i['review_audience']; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card mt-3">
								<div class="card-header"><?php echo $course['course_title']; ?> Course Outline</div>
								<div class="card-body quote ml-4">
									<?php foreach($outline as $key => $o): ?>
										<?php if($o['outline_type']=='video'): ?>
											<h5 class="card-title">
												<?php echo $o['video_title']; ?>
												<a href="<?php echo base_url("course/edit/outline/$course_id/video/".$o['outline_id']); ?>">#</a>	
											</h5>
											<p class="card-text text-muted quote"><?php echo nl2br($o['video_description']); ?></p>
											<p class="card-text text-muted quote-green"><?php echo $review_o[$key]; ?></p>
											<hr>
										<?php elseif($o['outline_type']=='lecture'): ?>
											<h5 class="card-title">
												<?php echo $o['lecture_title']; ?>
												<a href="<?php echo base_url("course/edit/outline/$course_id/lecture/".$o['outline_id']); ?>">#</a>	
											</h5>
											<p class="card-text text-muted quote"><?php echo nl2br($o['lecture_body']); ?></p>
											<p class="card-text text-muted quote-green"><?php echo $review_o[$key]; ?></p>
											<hr>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>