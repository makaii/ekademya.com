<div class="jumbotron pb-1" style="background-color: #E4F1FE;">
	<dic class="container">
		<div class="row">
			<div class="col-md-3">
				<h3>Instructor Dashboard</h3>
			</div>
			<div class="col-md-9">
				<a href="<?php echo base_url('course/create') ?>">
					<button class="float-right btn btn text-white" style="background-color: #336E7B;">Create New Course</button>
				</a>
			</div>
		</div>
	</dic>
</div>
<?php $courses = $this->Instructor_model->get_instructors_courses($_SESSION['user_email']); ?>
<?php if($this->Instructor_model->get_instructors_courses($_SESSION['user_email'])): ?>
	<div class="container mb-5">
		<?php foreach ($courses as $data): ?>
			<div class="row mb-3">	
				<div class="col-md-2">
					<div class="card">
						<img style="max-height: 200px; max-width: 200px;" class="card-img img-responsive" src="<?php echo base_url('z/course/'.$data['course_img_url']); ?>" alt="<?php echo $data['course_title']; ?>">
					</div>
				</div>
				<div class="col-md-10">
					<div class="card">
						<div class="card-header">
							<?php echo $data['course_title']; ?>
						</div>
						<div class="card-body pt-1 pb-1">
							<div class="card-text">
								<?php $desc = $data['course_description']; ?>
								<?php if(strlen($desc)>=200){echo substr($desc, 0,200).' ...';}else echo $desc; ?>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary">Publish</button>
							<a href="<?php echo base_url('course/manage/goals/'.$data['course_id']); ?>"><button class="btn btn-sm btn-info">Edit</button></a>
							<a href="<?php echo base_url('course/delete'); ?>"><button class="btn btn-sm btn-danger float-right">Delete</button></a>
						</div>
					</div>
				</div>	
			</div>
		<?php endforeach; ?>
	</div>
<?php elseif($this->Instructor_model->get_instructors_courses($_SESSION['user_email'])===null): ?>
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
