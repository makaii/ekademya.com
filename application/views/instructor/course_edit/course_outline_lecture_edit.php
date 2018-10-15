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
					<form method="POST" action="<?php echo base_url("course/edit/outline/$course_id/lecture/$outline_id"); ?>">
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
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">Update Lecture</button>
							<button type="reset" class="btn btn-secondary btn-sm">Clear</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>