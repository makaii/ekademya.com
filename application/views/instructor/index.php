<div class="jumbotron pb-1">
	<dic class="container">
		<div class="row">
			<div class="col-md-3">
				<h3>Instructor Dashboard</h3>
			</div>
			<div class="col-md-9">
				<a href="<?php echo base_url('course/create') ?>">
					<button class="float-right btn">Create New Course</button>
				</a>
			</div>
		</div>
	</dic>
</div>
<?php $courses = $this->Instructor_model->get_instructors_courses($_SESSION['email']); ?>
<?php if($this->Instructor_model->get_instructors_courses($_SESSION['email'])): ?>
	<div class="container mb-5">
		<div class="row">
			<?php foreach ($courses as $data): ?>
				<div class="col-md-2 mb-3">
					<div class="card">
						<img style="max-height: 200px; max-width: 200px;" class="card-img img-responsive" src="<?php echo base_url('z/course/'.$data['course_img']); ?>" alt="<?php echo $data['course_title']; ?>">
					</div>
				</div>
				<div class="col-md-10">
					<div class="card">
						<div class="card-header">
							<?php echo $data['course_title']; ?>
						</div>
						<div class="card-body">
							<div class="card-text">
								<?php echo $data['course_description']; ?>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary">Publish</button>
							<a href="<?php echo base_url('course/manage/goals/'.$data['course_id']); ?>"><button class="btn btn-sm btn-info">Edit</button></a>
							<a href="<?php echo base_url('course/delete'); ?>"><button class="btn btn-sm btn-danger float-right">Delete</button></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php elseif($this->Instructor_model->get_instructors_courses($_SESSION['email'])===null): ?>
	<div class="container mb-5">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
						Course A Course?
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						Create your first course now
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
