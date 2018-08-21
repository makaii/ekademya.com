<div class="jumbotron pb-1" style="background-color: #E4F1FE;">
	<dic class="container">
		<div class="row">
			<div class="col-md-3">
				<h3>Welcome Instructor</h3>
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
					<div class="card">
						<img style="max-height: 200px; max-width: 200px;" class="card-img img-responsive" src="<?php echo base_url('z/course/'.$data['course_img_url']); ?>" alt="<?php echo $data['course_title']; ?>">
					</div>
				</div>
				<div class="col-md-10">
					<div class="card">
						<div class="card-header">
							<?php echo $data['course_title']; ?>
							<?php if($data['course_review']==0){echo "<span class='badge badge-secondary'>draft</span>";} ?>
						</div>
						<div class="card-body pt-3 pb-3">
							<div class="card-text">
								<?php $desc = $data['course_description']; ?>
								<?php if(strlen($desc)>=200){echo substr($desc, 0,200).' ...';}else echo "<p class='text-muted mb-0'>No Description Yet..</p>"; ?>
							</div>
						</div>
						<div class="card-footer">
							<div id="courseOptions">
								<?php if($data['course_review']==1){$review="disabled";}else $review=""; ?>
								<button class="btn btn-sm btn-primary <?php echo $review; ?>" id="sendForReview" onclick="show_review_buttons()"><i class="fa fa-send"></i>&nbsp;Send for Review</button>
								<a href="<?php echo base_url('course/manage/goals/'.$data['course_id']); ?>"><button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Manage</button></a>
								<a href="<?php echo base_url('course/delete/'.$data['course_id']); ?>"><button class="btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i>&nbsp;Delete</button></a>
							</div>
							<div style="display: none;" id="reviewButtons">
								<label class="font-weight-bold mb-0">Are you sure?</label>
								<button class="btn btn-sm btn btn-primary">Yes</button>
								<button class="btn btn-sm btn btn-danger" onclick="cancel_review();">No</button>
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
<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>