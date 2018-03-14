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



					<form>
						<div class="form-group">
							<label>Lecture Title</label>
							<input type="text" name="" class="form-control">
						</div>
						<div class="form-group">
							<label>Lecture Type</label>
							<div class="form-check">
								<label class="form-check-label" for="article"><input class="form-check-input" type="radio" id="article" name="type" value="article" onclick="show_article_form()"></input> Article</label>
							</div>
							<div class="form-check disabled">
								<label class="form-check-label" for="pdf"><input class="form-check-input" type="radio" id="pdf" name="type" value="pdf" disabled></input> PDF</label>
							</div>
							<div class="form-check">
								<label class="form-check-label" for="video"><input class="form-check-input" type="radio" id="video" name="type" value="video" onclick="show_video_form()"></input> Video</label>
							</div>
						</div>
						<!-- Article Form -->
						<div id="ARTICLEform" style="display: none;">
							<div class="form-group">
								<label>Body</label>
								<textarea class="form-control" rows="15"></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-primary">Save</button>
								<button class="btn btn-info">Preview</button>
							</div>
						</div>
						<!-- Video Form -->
						<div id="VIDEOform" style="display: none;">
							<div class="form-group">
								<label>Video</label>
								<br>
								<video width="640" height="360" preload="none" controls controlsList="nodownload" preload="none" poster="" id="video">
									<source src="">
									<!-- <source src="" type="video/mp4">
									<source src="" type="video/webm"> -->
								</video>
								<input type="file" name="video">
							</div>
							<div class="form-group">
								<label>Thumbnail</label>
								<br>
								<img width="640" height="360" src="<?php echo base_url('z/course/default_thumbnail.png'); ?>" class="img-fluid img-thumbnail" id="thumnail_img">
								<div id="disp_tmp_path"></div>
								<img src="" width="200" style="display:none;" />
								<input type="file" name="thumbnail" id="thumbnail_file">
								<script type="text/javascript">
									$('#thumbnail_file').change( function(event) {
									var tmppath = URL.createObjectURL(event.target.files[0]);
									    $("#thumnail_img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
									    
									    // $("#disp_tmp_path").html("Temporary Path(Copy it and try pasting it in browser address bar) --> <strong>["+tmppath+"]</strong>");
									});
								</script>
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