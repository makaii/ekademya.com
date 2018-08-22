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
			<h3 class="font-weight-bold"><?php echo $course_title; ?></h3>
			<?php if (isset($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row mt-4 mb-4">
		<div class="col-md-2">
			<div class="list-group">
				<a href="<?php echo base_url('course/manage/goals/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">1</span> Goals</a>
				<a href="<?php echo base_url('course/manage/landing_page/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">2</span> Landing Page</a>
				<a href="<?php echo base_url('course/manage/outline/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action active"><span class="badge badge-dark">3</span> Outline</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3>Edit Lecture</h3>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><?php echo $course_title; ?></li>
							<li class="breadcrumb-item"><?php echo $course_outline_id; ?></li>
							<li class="breadcrumb-item active text-primary" aria-current="page">Edit Lecture</li>
						</ol>
					</nav>


					<form method="POST" action="<?php echo current_url(); ?>">
						<div class="form-group">
							<label>Lecture Title <span class="text-danger">*</span></label>
							<input type="text" name="lectureTitle" class="form-control" value="<?php echo $lecture_title; ?>">
							<?php echo form_error('lectureTitle'); ?>
						</div>
						<div class="form-group">
							<label>Lecture Body <span class="text-danger">*</span></label>
							<textarea name="lectureBody" maxlength="" rows="4" class="form-control"><?php echo $lecture_body ?></textarea>
							<?php echo form_error('lectureBody'); ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>