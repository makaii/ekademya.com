<div class="container">
	<div class="row mt-5">
		<div class="col-md-7">
			<h3><?php echo $course['course_title']; ?></h3>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview</a>
			<br>
			<a class="text-secondary" href="<?php echo base_url("course/edit/outline/$course_id"); ?>">go back to Lessons</a>
		</div>
		<div class="col-md-5">
			<?php echo $page_alert; ?>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-12">
			
		</div>
	</div>
</div>
<form action="<?php echo base_url("course/edit/outline/$course_id/video/$outline_id"); ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="card border-info">
					<div class="card-body">
						<div class="form-group">
							<label class="font-weight-bold">Edit Video</label>
							<input class="form-control form-control-sm" id="INPUTsection" name="video_title" placeholder="Enter Video Title" maxlength="50" value="<?php echo set_value('video_title',$video['video_title']); ?>"></input>
							<?php echo form_error('video_title'); ?>
						</div>
						<div class="form-group">
							<textarea class="form-control form-control-sm" name="video_description" placeholder="Video Description" rows="6" maxlength="1000"><?php echo set_value('video_description',$video['video_description']); ?></textarea>
							<?php echo form_error('video_description'); ?>
						</div>
						<div class="form-group">
							<!-- <input type="file" name="video_file"> -->
							<label class="font-weight-bold">Video File</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="video_file">
								<label class="custom-file-label" for="customFile">Choose video</label>
							</div>
							<small class="form-text text-muted">We recommend using a video with a 16:9 aspect ratio, with a maxfileze of 0</small>
							<small class="form-text text-muted">Max resolution is 1920x1080</small>
							<small class="form-text text-muted">Mininum resolution is 640x360</small>
							<small class="form-text text-danger"><?php echo $upload_error; ?></small>
						</div>
						<div class="form-group">
							<video width="100%" height="auto" controls preload>
								<?php $ext=pathinfo($video['video_url'],PATHINFO_EXTENSION); ?>
								<?php if($ext=='mp4'): ?>
									<source src="<?php echo base_url("z/course/".$video['video_url']); ?>" type="video/mp4">
								<?php elseif($ext=='webm'): ?>
									<source src="<?php echo base_url("z/course/".$video['video_url']); ?>" type="video/webm">
								<?php endif; ?>
								Your browser does not support the video tag.
							</video>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-sm" type="submit">Update Video</button>
							<button type="reset" class="btn btn-secondary btn-sm">Clear</button>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-5">
				<div class="card">
					<div class="card-body bg-light">
						<div class="form-group">
							<label class="font-weight-bold">Or Embed From YouTube</label>
							<textarea class="form-control form-control-sm" placeholder="<iframe> ... </iframe>" rows="5" maxlength="200" name="video_embed" disabled><?php echo set_value('video_embed',null); ?></textarea>
							<?php echo form_error('video_embed'); ?>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</form>	
<script>
	// sticky video file
	$('.custom-file-input').on('change', function() { 
		let fileName = $(this).val().split('\\').pop(); 
		$(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});
</script>