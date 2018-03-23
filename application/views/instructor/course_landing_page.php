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
			<img class="rounded img-thumbnail" src="https://www.udemy.com/staticx/udemy/images/course/200_H/placeholder.png" style="width: 256px;height: 144px;">
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
				<a href="<?php echo base_url('course/manage/landing_page/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action active"><span class="badge badge-dark">2</span> Landing Page</a>
				<a href="<?php echo base_url('course/manage/outline/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">3</span> Outline</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3>Course Landing Page</h3>
					<h6>Your Course Landing Page is the first thing students see when they find your course in the marketplace and will influence student enrollments. Fill in the details below to build your landing page, and click ‘Preview’ to see how it will appear to students in the marketplace.</h6>
				</div>
				<div class="card-body">
					<?php echo form_open(base_url('course/manage/landing_page/'.$_SESSION['course_id'])); ?>
						<div class="form-group">
							<label>Course Title</label><small class="text-muted"> max 50 chars</small>
							<input class="form-control" maxlength="50" type="text" name="courseTitle" value="<?php if(set_value('courseTitle')==null){echo $course_title;}else echo set_value('courseTitle'); ?>">
							<?php echo form_error('courseTitle'); ?>
						</div>
						<div class="form-group">
							<label>Course Description</label><small class="text-muted"> max 1000 chars</small>
							<textarea class="form-control" rows="8" maxlength="1000" name="courseDescription"><?php if(set_value('courseDescription')==null){echo $course_description;}else echo set_value('courseDescription'); ?></textarea>
							<?php echo form_error('courseDescription'); ?>
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Save</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>