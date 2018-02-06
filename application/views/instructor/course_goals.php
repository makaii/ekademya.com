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
				<a href="<?php echo base_url('course/manage/goals/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action active"><span class="badge badge-dark">1</span> Goals</a>
				<a href="<?php echo base_url('course/manage/landing_page/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">2</span> Landing Page</a>
				<a href="<?php echo base_url('course/manage/outline/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">3</span> Outline</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3>Course Goals</h3>
				</div>
				<div class="card-body">
					<?php echo form_open(base_url('course/manage/goals/'.$_SESSION['course_id'])); ?>
						<div class="form-group">
							<label>What knowledge &amp; tools are required?</label>
							<input class="form-control" maxlength="255" type="text" placeholder="Example: You should be able to use a PC at a beginner level" name="courseTools" value="<?php if(set_value('courseTools')==null){echo $course_tools;}else echo set_value('courseTools'); ?>">
							<?php echo form_error('courseTools'); ?>
						</div>
						<div class="form-group">
							<label>Who should take this course?</label>
							<input class="form-control" maxlength="255" type="text" placeholder="Example: Anyone who wants to learn to code" name="courseAudience" value="<?php if(set_value('courseAudience')==null){echo $course_audience;}else echo set_value('courseAudience'); ?>">
							<?php echo form_error('courseAudience'); ?>
						</div>
						<div class="form-group">
							<label>What will students achieve or be able to do after taking your course?</label>
							<input class="form-control" maxlength="255" type="text" placeholder="Example: Build websites and webapps" name="courseAchievement" value="<?php if(set_value('courseAchievement')==null){echo $course_achievement;}else echo set_value('courseAchievement'); ?>">
							<?php echo form_error('courseAchievement'); ?>
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">save</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>