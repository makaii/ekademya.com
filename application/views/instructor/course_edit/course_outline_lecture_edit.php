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
			<?php echo $page_alert; ?>
			<div class="card">
				<div class="card-body">
					<form method="POST" action="<?php echo base_url("course/edit/outline/$course_id/week/$week_id/$week_code/lecture/$outline_id"); ?>" enctype="multipart/form-data" accept-charset="utf-8">
						<div class="form-group">
							<label class="font-weight-bold mb-0">Edit Lecture Title</label>
							<small class="form-text text-muted mt-0 mb-1">your title should captivate your students and to perfecly capture your lecture's gist</small>
							<?php echo form_error('title'); ?>
							<input class="form-control form-control-sm" name="title" value="<?php echo set_value('title',$outline['lecture_title']); ?>"></input>
						</div>
						<div class="form-group">
							<label class="font-weight-bold mb-0">Edit Body</label>
							<small class="form-text text-muted mt-0 mb-1">do your best to explain things. markdown supported</small>
							<?php echo form_error('body'); ?>
							<textarea class="form-control form-control-sm" name="body" rows="14" maxlength=""><?php echo set_value('body',$outline['lecture_body']); ?></textarea>
						</div>
						<div class="form-row">
							<div class="col-md-8">
								<div class="form-group">
									<label class="font-weight-bold">Update PDF</label>
									<?php if(!empty($outline['lecture_url'])): ?>
										<a href="<?php echo base_url("z/pdf/".$outline['lecture_url']); ?>" target="_blank" role="button" class="btn btn-sm btn-info">view <?php echo $outline['lecture_url']; ?></a>
									<?php endif; ?>
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
							<button type="submit" class="btn btn-primary btn-sm">Update Lecture</button>
							<button type="reset" class="btn btn-secondary btn-sm">Clear</button>
							<a href="<?php echo base_url("instructor/del_outline/$course_id/".$outline['outline_id'].'/'.$outline['outline_week_id']); ?>" role="button" class="btn btn-sm btn-danger float-right">remove</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	// sticky video file
	$('.custom-file-input').on('change', function() { 
	   let fileName = $(this).val().split('\\').pop(); 
	   $(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});
</script>