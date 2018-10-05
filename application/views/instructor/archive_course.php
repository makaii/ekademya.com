<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 offset-md-3 mb-5">
			<p class="text-center display-4 mt-5">Archive Course</p>
			<div class="card border-secondary mt-5 mb-5">
				<div class="card-header bg-secondary text-white">
					Warning: Archiving Course
				</div>
				<div class="card-body">
					<form method="POST" action="<?php echo base_url('course/archive/'.$course_id); ?>">
						<div class="form-group">
							<input class="form-control" value="<?php echo $course_title; ?>" readonly=""></input>
						</div>
						<div class="form-group">
							<label>Enter Your Password:</label>
							<input class="form-control" type="password" name="courseAuthorPass" value="<?php echo set_value('courseAuthorPass'); ?>"></input>
							<?php echo form_error('courseAuthorPass'); ?>
						</div>
						<div class="form-group">
							<small class="text-muted">Archiving course</small>
							<button class="btn btn-dark float-right" type="submit">Archive</button>
						</div>
						<small class="text-danger">
							<?php echo $this->session->flashdata('error'); ?>
						</small>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>