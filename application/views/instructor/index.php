<div class="jumbotron pb-1 pt-2" style="background-color: #E4F1FE;">
	<dic class="container">
		<div class="row">
			<div class="col-md-3">
				<h3>Welcome <?php $name = explode(" ",$_SESSION['user_name']);echo $name[0]; ?></h3>
			</div>
			<div class="col-md-9">
				<a href="<?php echo base_url('course/create') ?>">
					<button class="float-right btn btn text-white" style="background-color: #336E7B;">Create New Course</button>
				</a>
			</div>
		</div>
	</dic>
</div>
<?php $courses = $this->Instructor_model->get_instructors_courses($_SESSION['user_id']); ?>
<?php if($this->Instructor_model->get_instructors_courses($_SESSION['user_id'])): ?>
	<div class="container mb-5">
		<?php foreach ($courses as $data): ?>
			<div class="row mb-3">	
				<div class="col-md-2">
					<div class="card border">
						<img style="max-height: 200px; max-width: 200px;" class="card-img img-responsive" src="<?php echo base_url('z/thumbnails/'.$data['course_img_url']); ?>" alt="<?php echo $data['course_title']; ?>">
					</div>
				</div>
				<div class="col-md-10">
					<div class="card <?php if($data['course_published']==1){echo'border-success';} ?>">
						<div class="card-header <?php if($data['course_published']==1){echo'border-success';} ?>">
							<b><?php echo $data['course_title']; ?></b>
							<?php if($data['course_review']==0){echo "<span class='badge badge-secondary'>draft</span>";} if($data['course_published']==1){echo "<span class='badge badge-success'>published</span>";} if($data['course_review']!=0&&$data['course_published']==0){echo "<span class='badge badge-info'>under review</span>";}?>
						</div>
						<div class="card-body pt-3 pb-3">
							<div class="card-text">
								<?php if (!empty($data['course_description'])): ?>
									<?php if (strlen($data['course_description'])>=200): ?>
										<?php echo substr($data['course_description'],0,200).' ...'; ?>
									<?php else: ?>
										<?php echo $data['course_description']; ?>
									<?php endif; ?>
								<?php else: ?>
									<span class="text-muted mb-0">No Description Yet</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="card-footer <?php if($data['course_published']==1){echo'border-success';} ?>">
							<div id="course<?php echo $data['course_id']; ?>Options">
								<?php if ($data['course_published']==0&&$data['course_review']!=2): ?>
									<button class="btn btn-sm btn-primary" id="sendForReview" onclick="show_review_buttons(<?php echo $data['course_id']; ?>)"><i class="fa fa-send"></i>&nbsp;Send for Review</button>
								<?php endif; ?>
								<?php if ($data['course_published']==0&&$data['course_review']==1): ?>
									<a href="<?php echo base_url('course/edit/review/'.$data['course_id']); ?>" role="button" class="btn btn-sm btn-success">See Review Comments</a>
								<?php endif; ?>
								<?php if($data['course_published']==0): ?>
									<a href="<?php echo base_url('course/edit/info/'.$data['course_id']); ?>"><button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Edit</button></a>
								<?php elseif($data['course_published']==1): ?>
									<a href="<?php echo base_url('course/manage/'.$data['course_id']); ?>"><button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Manage</button></a>
								<?php endif; ?>
								<a href="<?php echo base_url('course/delete/'.$data['course_id']); ?>"><button class="btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i>&nbsp;Delete</button></a>
							</div>
							<div style="display: none;" id="review<?php echo $data['course_id']; ?>Buttons">
								<label class="font-weight-bold mb-0">Are you sure?</label>
								<a href="<?php echo base_url("course/review/").$data['course_id']; ?>" role="button" class="btn btn-sm btn btn-primary">Yes</a>
								<button class="btn btn-sm btn btn-danger" onclick="cancel_review(<?php echo $data['course_id']; ?>);">No</button>
							</div>
						</div>
					</div>
				</div>	
			</div>
		<?php endforeach; ?>
	</div>
<?php elseif($this->Instructor_model->get_instructors_courses($_SESSION['user_email'])===null): ?>
	<div class="container mb-5 pt-5 pb-5">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
						Create a Course?
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
<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>