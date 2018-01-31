<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 offset-md-3 mb-5">
			<p class="text-center display-4 mt-5">Delete Course</p>
			<div class="card border-danger mt-5 mb-5">
				<div class="card-header bg-danger text-white">
					Warning: Deleting Course!
				</div>
				<div class="card-body">
					<form method="POST" action="<?php echo base_url('course/delete'); ?>">
						<div class="form-group">
							<label>Enter Course Title:</label>
							<input class="form-control" type="text" name="courseTitle" placeholder="e.g. Learn Python Programming from Scratch 2018" value="<?php echo set_value('courseTitle'); ?>"></input>
							<?php echo form_error('courseTitle'); ?>
						</div>
						<div class="form-group">
							<label>Enter Course Author:</label>
							<input class="form-control" type="text" name="courseAuthor" value="<?php echo set_value('courseAuthor'); ?>"></input>
							<?php echo form_error('courseAuthor'); ?>
						</div>
						<div class="form-group">
							<small class="text-muted">Deleting a course is permanent</small>
							<button class="btn btn-danger float-right" type="submit">Delete</button>
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