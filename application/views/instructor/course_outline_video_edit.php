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
			<h3 class="font-weight-bold"><?php echo $course_title; ?></h3>
			<?php if (isset($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row mt-4 mb-4">
		<div class="col-md-2">
			<div class="list-group">
				<a href="<?php echo base_url('course/edit/goals/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">1</span> Goals</a>
				<a href="<?php echo base_url('course/edit/landing_page/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">2</span> Landing Page</a>
				<a href="<?php echo base_url('course/edit/outline/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action active"><span class="badge badge-dark">3</span> Outline</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3>Edit Video</h3>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><?php echo $course_title; ?></li>
							<li class="breadcrumb-item"><?php echo $course_outline_id; ?></li>
							<li class="breadcrumb-item active text-primary" aria-current="page">Edit Video</li>
						</ol>
					</nav>



					<?php echo form_open_multipart('');?>
						<div class="form-group">
							<label>Video Title <span class="text-danger">*</span></label>
							<input type="text" name="videoTitle" class="form-control" value="<?php if(!empty($video['video_title'])){echo $video['video_title'];} ?>">
							<?php echo form_error(''); ?>
						</div>
						<div class="form-group">
							<label>Video Description</label>
							<textarea name="" maxlength="" rows="4" class="form-control"><?php if(!empty($video['video_description'])){echo $video['video_description'];} ?></textarea>
							<?php echo form_error(''); ?>
						</div>
						<div id="VIDEOform">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Video</label>
										<small class="form-text text-muted">We recommend using a video with a 16:9 aspect ratio, with a maxfileze of 0</small>
										<small class="form-text text-muted">Max resolution is 1920x1080</small>
										<small class="form-text text-muted">Mininum resolution is 640x360</small>
										<?php echo $upload_error; ?>
										<?php if($video['video_thumbnail']==null){$thumbnail_url = "default_thumbnail.png";}else $thumbnail_url=$video['video_thumbnail']; ?>
										<video width="360" height="202" preload="none" controls controlsList="nodownload" preload="none" poster="<?php echo base_url("z/thumbnails/$thumbnail_url"); ?>" id="video" style="width: 360px;height: 202px">
											<?php $ext=pathinfo($video['video_url'],PATHINFO_EXTENSION); ?>
											<?php if($ext=='mp4'): ?>
												<source src="<?php echo base_url("z/course/".$video['video_url']); ?>" type="video/mp4">
											<?php elseif($ext=='webm'): ?>
												<source src="<?php echo base_url("z/course/".$video['video_url']); ?>" type="video/webm">
											<?php endif; ?>
										</video>
										<br>
										<input type="file" name="lectureVideo" id="video_file">
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
											<img width="360" height="202" src="<?php echo base_url('z/thumbnails/default_course_thumbnail.png'); ?>" class="card-image img-fluid" id="thumnail_img" alt="card image" style="max-width: 360px; max-height: 202px;">
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
								<button class="btn btn-primary">update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>