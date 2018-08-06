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
					<h3>Course Outline</h3>
					<h6 class="text-muted">Start putting together your course by adding videos, lectures, assignments and quizzes below.</h6>

					
				</div>
				<div class="card-body" id="outlineButtons">
					<div class="row">
						<div class="col-md-3">
							<button class="btn btn-outline-primary btn-block" onclick="add_video()">Add Video</button>
						</div>
						<div class="col-md-3">
							<button class="btn btn-outline-primary btn-block" onclick="add_lecture()">Add Lecture</button>
						</div>
						<div class="col-md-3">
							<button class="btn btn-outline-primary btn-block" onclick="" disabled="">Add Quiz</button>
						</div>
						<div class="col-md-3">
							<button class="btn btn-outline-primary btn-block" onclick="" disabled="">Add Assigment</button>
						</div>
					</div>
				</div>
				<!-- FORMS -->
				<div class="row">
					<div class="col-md-12">
						<div class="card-body">
							<!-- Video Form -->
							<form id="videoForm" action="<?php  ?>" method="POST" style="display: none;">
								<div class="form-group">
									<label class="font-weight-bold">New Video</label>
									<input class="form-control" id="INPUTsection" name="video_title" placeholder="Enter Video Title" maxlength="50"></input>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="video_description" placeholder="Video Description" rows="4" maxlength="1000"></textarea>
								</div>
								<div class="form-group">
									<input type="file" name="video_file">
								</div>
								<div class="form-group">
									<button class="btn btn-primary" type="submit">Add Video</button>
									<button type="reset" class="btn btn-secondary" onclick="cancel_add_video()">Cancel</button>
								</div>
							</form>
							<!-- Lecture Form -->
							<form id="lectureForm" action="<?php echo base_url('course/manage/outline/'.$_SESSION['course_id'].'/lecture_check'); ?>" method="POST" style="display: none;">
								<div class="form-group">
									<label class="font-weight-bold">New Lecture</label>
									<input class="form-control" name="lecture_title" placeholder="Enter Lecture Title" maxlength="""></input>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="lecture_body" placeholder="Lecture Body"  rows="4" maxlength=""></textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-primary" type="submit">Add Lecture</button>
									<button class="btn btn-secondary" type="reset" onclick="cancel_add_lecture()">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Outline -->
				<div class="row">
					<div class="col-md-12">
						<?php $count=1;foreach ($course_outline as $outline): ?>
							<div class="card-body bg-light">
								<p><?php echo $count.". ";$count++;echo $outline['outline_id']."/".$outline['outline_type']; ?></p>
								<pre><?php var_dump($outline); ?></pre>
								<button class="btn btn-sm btn-info">Edit</button>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>







<!-- Modals -->
<!-- delete Lecture -->
<form accept="<?php echo base_url('instructor/del_course_section/'); ?>" method="POST">
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="POST" action="">
	        	<div class="form-group">
	        		<label>Are you sure you want to delete this section?</label>
	        	</div>
	        	<div class="form-group">
	        		<button type="submit" class="btn btn-danger float-right">Delete</button>
	        	</div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
</form>

<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>