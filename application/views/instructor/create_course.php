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
								<?php foreach ($course_categories as $category): ?>
									<option value="<?php echo $category['category_code']; ?>"><?php echo ucwords($category['category_name']); ?></option>
								<?php endforeach; ?>
							</select>
							<br>
							<?php echo form_error('courseCategory'); ?>
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