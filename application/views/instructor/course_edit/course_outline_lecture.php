<div class="container">
	<div class="row mt-5">
		<div class="col-md-7">
			<h3><?php echo $course['course_title']; ?></h3>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview</a>
			<br>
			<a class="text-secondary" href="<?php echo base_url("course/edit/outline/$course_id"); ?>">go back to outline</a>
		</div>
		<div class="col-md-5">
			<?php if(!empty($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-12">
			
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<form method="POST" action="<?php echo base_url("course/edit/outline/$course_id/lecture"); ?>">
						<div class="form-group">
							<label class="font-weight-bold mb-0">Lecture Title</label>
							<small class="form-text text-muted mt-0 mb-1">your title should captivate your students and to perfecly capture your lecture's gist</small>
							<?php echo form_error('title'); ?>
							<input class="form-control form-control-sm" name="title" value="<?php echo set_value('title',null); ?>"></input>
						</div>
						<div class="form-group">
							<label class="font-weight-bold mb-0">Body</label>
							<small class="form-text text-muted mt-0 mb-1">do your best to explain things. markdown supported</small>
							<?php echo form_error('body'); ?>
							<textarea class="form-control form-control-sm" name="body" rows="14" maxlength=""><?php echo set_value('body',null); ?></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">Add Lecture</button>
							<button type="reset" class="btn btn-secondary btn-sm">Clear</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>