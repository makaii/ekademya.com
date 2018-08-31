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
			<img class="rounded" src="<?php echo base_url("z/thumbnails/$course_thumb"); ?>" style="max-width: 194.83px; max-height: 109.591875px;">
		</div>
		<div class="col-md-10">
			<h3 class="font-weight-bold"><?php echo $course_title; ?></h3>
			<?php if (isset($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row mt-4 mb-4">
		<div class="col-md-2">
			<div class="list-group">
				<a href="<?php echo base_url('course/edit/goals/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">1</span> Goals</a>
				<a href="<?php echo base_url('course/edit/landing_page/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">2</span> Landing Page</a>
				<a href="<?php echo base_url('course/edit/outline/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action active"><span class="badge badge-dark">3</span> Outline</a>
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
							<form id="videoForm" action="<?php echo base_url('course/edit/outline/'.$course_id.'/video_check'); ?>" method="POST" style="display: none;" enctype="multipart/form-data" accept-charset="utf-8">
								<div class="form-group">
									<label class="font-weight-bold">New Video</label>
									<input class="form-control" id="INPUTsection" name="video_title" placeholder="Enter Video Title" maxlength="50"></input>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="video_description" placeholder="Video Description" rows="4" maxlength="1000"></textarea>
								</div>
								<div class="form-group">
									<input type="file" name="video_file">
									<small class="form-text text-muted">We recommend using a video with a 16:9 aspect ratio, with a maxfileze of 0</small>
									<small class="form-text text-muted">Max resolution is 1920x1080</small>
									<small class="form-text text-muted">Mininum resolution is 640x360</small>
								</div>
								<div class="form-group">
									<button class="btn btn-primary" type="submit">Add Video</button>
									<button type="reset" class="btn btn-secondary" onclick="cancel_add_video()">Cancel</button>
								</div>
							</form>
							<!-- Lecture Form -->
							<form id="lectureForm" action="<?php echo base_url('course/edit/outline/'.$course_id.'/lecture_check'); ?>" method="POST" style="display: none;">
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
				<ul class="list-group list-group-flush">
					<?php if (!empty($course_outline)): ?>
						<?php $count=1;foreach ($course_outline as $outline): ?>
							<li class="list-group-item bg-light">
								<div class="row">
									<div class="col-md-9 col-sm-8">
										<h6 class="card-text pt-1"><?php echo $count;$count++; ?>.
											<?php if ($outline['outline_type']=='lecture'): ?>
												<?php echo $outline['lecture_title']; ?>
												<i class="fa fa-newspaper-o"></i>
												<?php $edit_url = 'lecture_edit'; ?>
											<?php elseif ($outline['outline_type']=='video'): ?>
												<?php echo $outline['video_title']; ?>
												<i class="fa fa-video-camera"></i>
												<?php $edit_url = 'video_edit'; ?>
											<?php endif; ?>
										</a></h6>
									</div>
									<div class="col-md-3 col-sm-4">
										<a class="btn btn-sm btn-info" href="<?php echo base_url("course/edit/outline/$course_id/$edit_url/").$outline['outline_id']; ?>" role="button"><i class="fa fa-edit"></i> edit</a>
										<a href="<?php echo base_url("course/edit/outline/$course_id/delete/").$outline['outline_id']; ?>" role="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> delete</a>
									</div>
								</div>
							</li>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="card-body bg-light"><h5 class="card-title text-center">No Content Yet</h5></div>
					<?php endif; ?>
				</ul>
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