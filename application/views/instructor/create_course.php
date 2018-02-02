<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 offset-md-3 mb-5">
			<p class="text-center display-4 mt-5">Create a New Course</p>
			<div class="card mt-5 mb-5">
				<div class="card-header">
					Let's get Started
				</div>
				<div class="card-body">
					<form method="POST" action="<?php echo base_url('course/create'); ?>">
						<div class="form-group">
							<label>Enter a working Course Title:</label><small class="text-muted text-xs"> (max 50 chars)</small>
							<input class="form-control" type="text" maxlength="50" name="courseTitle" placeholder="e.g. Learn Python Programming from Scratch 2018" value="<?php echo set_value('courseTitle'); ?>"></input>
							<?php echo form_error('courseTitle'); ?>
						</div>
						<div class="form-group">
							<select class="custom-select" name="courseCategory">
							  <option selected disabled>Select Course Category</option>
							  <option value="Art & Design">Art &amp; Design</option>
							  <option value="Business">Business</option>
							  <option value="Culinary">Culinary</option>
							  <option value="Film & Photography">Film &amp; Photography</option>
							  <option value="Technology">Technology</option>
							</select>
							<br>
							<?php echo form_error('courseCategory'); ?>
						</div>
						<div class="form-group">
							<input type="checkbox" name="testCheck" id="testcheck" disabled="">
							<label for="testcheck">This is a practice test-only course</label>
						</div>
						<div class="form-group">
							<button class="btn btn-primary float-right" type="submit">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>