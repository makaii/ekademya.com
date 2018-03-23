<style type="text/css">
	.list-group-item.active{
		background-color: #36D7B7 !important;
		border-color: transparent !important;
		color: white !important;
	}
</style>
<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-md-2">
			<img class="rounded img-thumbnail" src="https://www.udemy.com/staticx/udemy/images/course/200_H/placeholder.png">
		</div>
		<div class="col-md-8">
			<h3 class="font-weight-light"><?php echo $course_title; ?></h3>
			<p class="font-weight-light"><?php echo $course_author; ?></p>
			<?php if (isset($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row mt-4 mb-4">
		<div class="col-md-2">
			<div class="list-group">
				<a href="<?php echo base_url('course/manage/goals/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">1</span> Goals</a>
				<a href="<?php echo base_url('course/manage/landing_page/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">2</span> Landing Page</a>
				<a href="<?php echo base_url('course/manage/outline/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action active"><span class="badge badge-dark">3</span> Outline</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3>Add Lecture</h3>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><?php echo $course_title; ?></li>
							<li class="breadcrumb-item"><?php echo $course_section ?></li>
							<li class="breadcrumb-item active text-primary" aria-current="page">Add Lecture</li>
						</ol>
					</nav>



					<form action="<?php echo base_url('course/manage/outline/'.$_SESSION['course_id'].'/'.$course_outline_lecture_num.'/add_lecture/check'); ?>" method="POST">
						<div class="form-group">
							<label>Lecture Title <span class="text-danger">*</span></label>
							<input type="text" name="lectureTitle" class="form-control">
							<?php echo form_error('lectureTitle'); ?>
						</div>
						<div class="form-group">
							<label>Lecture Description</label>
							<textarea name="lectureDescription" maxlength="" rows="4" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Lecture Type <span class="text-danger">*</span></label>
							<div class="form-check">
								<label class="form-check-label" for="article"><input class="form-check-input" type="radio" id="article" name="lectureType" value="article" onclick="show_article_form()"></input> Article</label>
							</div>
							<!-- <div class="form-check disabled">
								<label class="form-check-label" for="pdf"><input class="form-check-input" type="radio" id="pdf" name="lectureType" value="pdf" disabled></input> PDF</label>
							</div> -->
							<div class="form-check">
								<label class="form-check-label" for="video"><input class="form-check-input" type="radio" id="video" name="lectureType" value="video" onclick="show_video_form()"></input> Video</label>
							</div>
							<?php echo form_error('lectureType'); ?>
						</div>
						<!-- Article Form -->
						<div id="ARTICLEform" style="display: none;">
							<div class="form-group">
								<label>Article</label>
								<textarea class="form-control" rows="8" name="article"></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Save</button>
								<a href="<?php echo base_url('course/manage/outline/5/4/preview_lecture'); ?>" target="_blank" title="Preview Article in a new page"><button class="btn btn-info" type="button">Preview</button></a>
							</div>
						</div>
						<!-- Video Form -->
						<div id="VIDEOform" style="display: block;">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Video</label>
										<small class="form-text text-muted">We recommend using a video with a 16:9 aspect ratio, with a maxfileze of 0</small>
										<small class="form-text text-muted">Max resolution is 1920x1080</small>
										<small class="form-text text-muted">Mininum resolution is 640x360</small>
										<video width="360" height="202" preload="none" controls controlsList="nodownload" preload="none" poster="" id="video" style="width: 360px;height: 202px">
											<source src="" id="video_src">
											<!-- <source src="" type="video/mp4">
											<source src="" type="video/webm"> -->
										</video>
										<input type="file" name="lectureVideo" id="video_file">
										<script type="text/javascript">
											$('#video_file').change( function(event) {
											var tmppath = URL.createObjectURL(event.target.files[0]);
											    $("#video_src").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
											});
										</script>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Thumbnail</label>
										<small class="form-text text-muted">We recommend using a thumbnail with a 16:9 aspect ratio, with a maxfilese of 0</small>
										<small class="form-text text-muted">Max resolution is 1024x576</small>
										<small class="form-text text-muted">Mininum resolution is 384x216</small>
										<br>
										<div class="card" style="max-width: 360px; max-height: 202px;">
											<img width="360" height="202" src="<?php echo base_url('z/thumbnails/default_course_thumbnail.png') ?>" class="card-image img-fluid" id="thumnail_img" alt="card image" style="max-width: 360px; max-height: 202px;">
										</div>
										<br>
										<input type="file" name="lectureThumbnail" id="thumbnail_file">
										
										<!-- <div id="disp_tmp_path"></div> -->
										<script type="text/javascript">
											$('#thumbnail_file').change( function(event) {
											var tmppath = URL.createObjectURL(event.target.files[0]);
											    $("#thumnail_img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
											    
											    // $("#disp_tmp_path").html("Temporary Path(Copy it and try pasting it in browser address bar) --> <strong>["+tmppath+"]</strong>");
											});
										</script>
									</div>
								</div>
							</div>
							<div>
								<button class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function show_article_form()
	{
		document.getElementById('ARTICLEform').style.display = 'block';
		document.getElementById('VIDEOform').style.display = 'none';
	}

	function show_video_form()
	{
		document.getElementById('ARTICLEform').style.display = 'none';
		document.getElementById('VIDEOform').style.display = 'block';
	}
</script>