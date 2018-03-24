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
				<a href="<?php echo base_url('course/manage/landing_page/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">2</span> Landing Page</a>
				<a href="<?php echo base_url('course/manage/outline/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action active"><span class="badge badge-dark">3</span> Outline</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3>Course Outline</h3>
					<h6>Start putting together your course by creating sections, lectures and practice (quizzes and coding exercises) below.</h6>
					<?php if(!empty($course_sections)): ?>
						<?php $count = 1; ?>
						<?php foreach($course_sections as $sections): ?>
							<div class="card bg-light mt-3">
								<div class="card-body pt-2 pb-2 ">
									<strong class="card-text"><span class="text-muted"><?php echo $count; ?>. </span><?php echo $sections['outline_section_title']; ?></strong>

									<div class="card mt-1">
										<dov class="card-body pt-1 pb-1">
											<p class="card-text text-muted"><?php if($sections['outline_lecture_title']){echo $sections['outline_lecture_title'];}else echo "Section has no lectures yet"; ?></p>
										</dov>
									</div>
								</div>
								<div class="card-footer">
									<a href="<?php echo base_url('course/manage/outline/'.$_SESSION["course_id"].'/'.$sections['outline_id'].'/add_video_lecture'); ?>" role="button" class="btn btn-sm btn-info">Add Video Lecture</a>
									<a class="btn btn-sm btn-info disabled" role="button" href="">Add Article Lecture</a>
									<a class="btn btn-sm btn-info disabled" role="button" href="<?php echo base_url('course/manage/outline/'.$_SESSION["course_id"].'/'.$sections['outline_id'].'/add_quiz'); ?>">Add Quiz</a>
									<button class="btn btn-sm btn-info disabled" type="button">Add Assignment</button>
									<button class="btn btn-sm btn-danger float-right" type="button" data-toggle="modal" data-target="#exampleModalCenter"><?php echo $sections['outline_id']; ?>Delete</button>
								</div>
							</div>
							<?php $count++; ?>
						<?php endforeach; ?>
					<?php endif; ?>

					<div style="display: none;" id="FORMsection" class="form-section mt-3">
						<form action="<?php echo base_url('course/manage/outline/'.$_SESSION['course_id'].'/add_section_check'); ?>" method="POST">
							<div class="form-group">
								<label>New Section</label>
								<input class="form-control" id="INPUTsection" name="section" placeholder="Enter a Title" maxlength="50"></input>
								<?php echo form_error('section'); ?>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit" id="SUBMITsection">Add Section</button>
								<button type="reset" class="btn btn-secondary" onclick="cancel_Add_Section()">Cancel</button>
							</div>
						</form>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-outline-primary btn-lg btn-block" onclick="add_Section()" id="ADDsection">Add Section</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>







<!-- Modals -->
<?php if(!empty($course_sections)): ?>
	<?php foreach($course_sections as $section): ?>

	<?php endforeach; ?>
<?php endif; ?>
<!-- delete Lecture -->
<form accept="<?php echo base_url(''); ?>" method="POST">
	
</form>
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>