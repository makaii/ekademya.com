<form method="POST" accept="<?php echo base_url("admin/review/$course_id"); ?>">
	<!-- INFO -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Course Information</div>
				<div class="card-body">
					<div class="form-group">
						<label class="font-weight-bold">Title : <span class="text-info"><?php echo ucwords($course['course_title']); ?></span></label>
						<input class="form-control form-control-sm" placeholder="comments" name="comment_title" value="<?php echo set_value('comment_title',$review_info['review_title']); ?>"></input>
						<?php echo form_error('comment_title'); ?>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Category : <span class="text-info"><?php echo ucwords($course['category_name']); ?></span></label>
						<input class="form-control form-control-sm" placeholder="comments" name="comment_category" value="<?php echo set_value('comment_category',$review_info['review_category']); ?>"></input>
						<?php echo form_error('comment_category'); ?>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Type : <span class="text-info"><?php echo ucwords($course['course_type']); ?></span></label>
						<input class="form-control form-control-sm" placeholder="comments" name="comment_type" value="<?php echo set_value('comment_type',$review_info['review_type']); ?>"></input>
						<?php echo form_error('comment_type'); ?>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Author : <a href="<?php echo base_url('admin/instructor/').$course['course_author']; ?>" target="_blank" class="text-info"><?php echo $course['user_email']; ?></a></label>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Description :</label>
						<p class="form-control-plaintext pb-0 mb-1 text-muted quote">
							<?php echo nl2br($course['course_description']); ?>
						</p>
						<input class="form-control form-control-sm" placeholder="comments" name="comment_description" value="<?php echo set_value('comment_description',$review_info['review_description']); ?>"></input>
						<?php echo form_error('comment_description'); ?>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Tools :</label>
						<p class="form-control-plaintext pb-0 mb-1 text-muted quote">
							<?php echo nl2br($course['course_tools']); ?>
						</p>
						<input class="form-control form-control-sm" placeholder="comments" name="comment_tools" value="<?php echo set_value('comment_tools',$review_info['review_tools']); ?>"></input>
						<?php echo form_error('comment_tools'); ?>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Audience :</label>
						<p class="form-control-plaintext pb-0 mb-1 text-muted quote">
							<?php echo nl2br($course['course_audience']); ?>
						</p>
						<input class="form-control form-control-sm" placeholder="comments" name="comment_audience" value="<?php echo set_value('comment_audience',$review_info['review_audience']); ?>"></input>
						<?php echo form_error('comment_audience'); ?>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Achievement :</label>
						<p class="form-control-plaintext pb-0 mb-1 text-muted quote">
							<?php echo nl2br($course['course_achievement']); ?>
						</p>
						<input class="form-control form-control-sm" placeholder="comments" name="comment_achievement" value="<?php echo set_value('comment_achievement',$review_info['review_achievement']); ?>"></input>
						<?php echo form_error('comment_achievement'); ?>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Final Project :</label>
						<p class="form-control-plaintext pb-0 mb-1 text-muted quote">
							<?php echo nl2br($course['course_project']); ?>
						</p>
						<input class="form-control form-control-sm" placeholder="comments" name="course_project" value="<?php echo set_value('course_project',$review_info['review_achievement']); ?>"></input>
						<?php echo form_error('course_project'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /INFO -->
	<!-- OUTLINE -->
	<div class="row">
		<div class="col-md-12">
			<div class="card mt-3">
				<div class="card-header">Course Lessons</div>
				<div class="card-body">
					<?php if (!empty($outline)): ?>
					<!-- IF OUTLINE EXIST -->
						<?php foreach($outline as $key => $outln): ?>
						<!-- LOOP OUTLINE -->
							<?php if ($outln['outline_type']=='video'): ?>
							<!-- VIDEO -->
								<div class="form-group">
									<label class="font-weight-bold">Video Title : <span class="text-info"><?php echo $outln['video_title']; ?></span></label>
									<p class="form-control-plaintext pb-0 mb-1 text-muted quote">
										<?php echo nl2br($outln['video_description']); ?>
									</p>
									<?php if($outln['video_thumbnail']==null){$thumbnail_url = "default_thumbnail.png";}else $thumbnail_url=$outln['video_thumbnail']; ?>
									<video controls controlsList="nodownload" preload="none" poster="<?php echo base_url("z/thumbnails/$thumbnail_url"); ?>" width="480" height="270">
										<?php $ext=pathinfo($outln['video_url'],PATHINFO_EXTENSION); ?>
										<?php if($ext=='mp4'): ?>
											<source src="<?php echo base_url("z/course/".$outln['video_url']); ?>" type="video/mp4">
										<?php elseif($ext=='webm'): ?>
											<source src="<?php echo base_url("z/course/".$outln['video_url']); ?>" type="video/webm">
										<?php endif; ?>
									</video>
									<input class="form-control form-control-sm" placeholder="comments" name="<?php echo "review_outline_$key"; ?>" value="<?php echo set_value("review_outline_$key",$review_outline[$key]); ?>"></input>
									<?php echo form_error("review_outline_$key"); ?>
									<hr>
								</div>
							<?php elseif($outln['outline_type']=='lecture'): ?>
							<!-- LECTURE -->
								<div class="form-group">
									<label class="font-weight-bold">Lecture Title : <span class="text-info"><?php echo $outln['lecture_title']; ?></span></label>
									<p class="form-control-plaintext pb-0 mb-1 text-muted quote">
										<?php echo nl2br($outln['lecture_body']); ?>
									</p>
									<input class="form-control form-control-sm" placeholder="comments" name="<?php echo "review_outline_$key"; ?>" value="<?php echo set_value("review_outline_$key",$review_outline[$key]); ?>"></input>
									<?php echo form_error("review_outline_$key"); ?>
									<hr>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else: ?>
					<!-- IF OUTLINE DOES NOT EXIST -->
						No Outline available
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- /OUTLINE -->
	<!-- BUTTONS -->
	<div class="row">
		<div class="col-md-12">
			<div class="card mt-3">
				<div class="card-body">
					<div class="form-group">
						<div id="pre-confirmation">
							<div>
								<button type="submit" class="btn btn-sm btn-primary btn-block">Send Comments</button>
								<a role="button" class="btn btn-sm btn-dark btn-block" href="#">Hold</a>
							</div>
							<br>
							<div>
								<a role="button" class="btn btn-sm btn-success btn-block text-white" onclick="show_confirmation()">Approve</a>
							</div>
						</div>
						<div id="confirmation" style="display: none;">
							<a href="<?php echo base_url("admin/review/$course_id/approve"); ?>" role="button" class="btn btn-sm btn-success btn-block">Yes</a>
							<a role="button" onclick="close_confirmation()" class="btn btn-sm btn-danger btn-block text-white">No</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /BUTTONS -->
</form>
<script>
	function show_confirmation()
	{
		document.getElementById('pre-confirmation').style.display = "none";
		document.getElementById('confirmation').style.display = "block";
	}
	function close_confirmation()
	{
		document.getElementById('pre-confirmation').style.display = "block";
		document.getElementById('confirmation').style.display = "none";
	}
</script>