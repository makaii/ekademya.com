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
						<li class="nav-item"><a href="<?php echo base_url("course/edit/media/").$course['course_id']; ?>" class="nav-link active">Promotional Media</a></li>
						<?php if($course['course_review']==1): ?>
							<li class="nav-item"><a href="<?php echo base_url("course/edit/review/").$course['course_id']; ?>" class="nav-link">Course Review</a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="card-body">
					<form class="ml-5 mr-5" method="POST" enctype="multipart/form-data" action="<?php echo base_url("course/edit/media/$course_id"); ?>">
						<div class="form-group">
							<label class="font-weight-bold">Thumbnail</label>
							<small class="form-text">Make your course stand out with a great image. Your Course Thumbnail will be displyed on search results. </small>
							<small class="form-text text-muted">We recommend using a thumbnail with a 16:9 aspect ratio</small>
							<small class="form-text text-muted">Max resolution is 1024x576</small>
							<small class="form-text text-muted">Mininum resolution is 384x216</small>
							<small class="text-danger"><?php echo $upload_error; ?></small>
						</div>
						<div class="form-group">
							<img class="rounded" width="360" height="202" src="<?php echo base_url("z/thumbnails/").$course['course_img_url']; ?>" id="thumnail_img" style="max-width: 360px;max-height: 202px;">
						</div>
						<div class="form-group">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" name="thumbnail" id="customFile" value="<?php echo set_value("thumbnail",$course['course_img_url']); ?>">
							  <label class="custom-file-label" for="customFile" id="filename">Choose Image</label>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('.custom-file-input').on('change', function() { 
	   let fileName = $(this).val().split('\\').pop(); 
	   $(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});
	//
	$('.custom-file-input').change( function(event) {
	var tmppath = URL.createObjectURL(event.target.files[0]);
	    $("#thumnail_img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
	});
</script>