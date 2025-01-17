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
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview
			</a>
		</div>
	</div>
</div>
<!-- <div class="container">
	<div class="row mt-5">
		<div class="col-md-7">
			<h3><?php echo $course['course_title']; ?></h3>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview</a>
			<br>
			<a class="text-secondary" href="<?php echo base_url("course/edit/outline/$course_id"); ?>">go back to Lessons</a>
		</div>
		<div class="col-md-5">
			<?php if(!empty($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-12">
			
		</div>
	</div>
</div> -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<form method="POST" action="<?php echo base_url("course/edit/outline/$course_id/week/$week_id/$week_code/lecture"); ?>" enctype="multipart/form-data" accept-charset="utf-8">
						<div class="form-group">
							<label class="font-weight-bold mb-0">Lecture Title</label>
							<small class="form-text text-muted mt-0 mb-1">your title should captivate your students and to perfecly capture your lecture's gist</small>
							<?php echo form_error('title'); ?>
							<input class="form-control form-control-sm" name="title" value="<?php echo set_value('title',null); ?>"></input>
						</div>
						<div class="form-group">
							<!-- <label class="font-weight-bold mb-0">Body</label> -->
							<small class="form-text text-muted mt-0 mb-1">do your best to explain things</small>
							<?php echo form_error('body'); ?>
							<textarea class="form-control form-control-sm" name="body" rows="14" maxlength=""><?php echo set_value('body',null); ?></textarea>
						</div>
						<div class="form-row">
							<div class="col-md-8">
								<div class="form-group">
									<label class="font-weight-bold">Upload PDF</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="pdf_file" id="pdfFile">
										<label class="custom-file-label" for="pdfFile">Choose file</label>
									</div>
									<small class="text-danger">
										<?php echo $upload_error; ?>
									</small>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">Add Lecture</button>
							<button type="reset" class="btn btn-secondary btn-sm">Clear</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- <div class="col-md-4">
			<div class="card">
				<div class="card-header">Or Upload Here</div>
				<div class="card-body">
					<form>
						<div class="form-group">
							<label class="font-weight-bold">Lecture Title</label>
							<input class="form-control form-control-sm"></input>
						</div>
					</form>
				</div>
			</div>
		</div> -->
	</div>
</div>
<script>
	// sticky video file
	$('.custom-file-input').on('change', function() { 
	   let fileName = $(this).val().split('\\').pop(); 
	   $(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});
</script>