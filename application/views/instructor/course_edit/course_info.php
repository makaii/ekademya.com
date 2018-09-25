<div class="container">
	<div class="row mt-5">
		<div class="col-md-7">
			<h3><?php echo $course['course_title']; ?></h3>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview</a>
		</div>
		<div class="col-md-5">
			<?php if(!empty($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<ul class="nav nav-tabs card-header-tabs">
						<li class="nav-item"><a href="<?php echo base_url("course/edit/info/").$course['course_id']; ?>" class="nav-link active">Course Info.</a></li>
						<li class="nav-item"><a href="<?php echo base_url("course/edit/outline/").$course['course_id']; ?>" class="nav-link">Course Outline</a></li>
						<li class="nav-item"><a href="<?php echo base_url("course/edit/media/").$course['course_id']; ?>" class="nav-link">Promotional Media</a></li>
						<?php if($course['course_review']==1): ?>
							<li class="nav-item"><a href="<?php echo base_url("course/edit/review/").$course['course_id']; ?>" class="nav-link">Course Review</a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="card-body">
					<form class="ml-5 mr-5" method="POST" action="<?php echo base_url("course/edit/info/$course_id"); ?>">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="font-weight-bold">Course Title</label>
									<?php echo form_error('title'); ?>
									<input class="form-control form-control-sm" maxlength="50" name="title" value="<?php echo set_value('title',$course['course_title']); ?>"></input>
									<small class="text-muted">Give your course a fun, descriptive title that conveys what students will learn.</small>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="font-weight-bold">Cetegory</label>
									<?php echo form_error('category'); ?>
									<select class="form-control form-control-sm" name="category">
										<?php foreach ($category as $ctgry): ?>
											<option value="<?php echo $ctgry["category_id"]; ?>" <?php if(set_value('category')==$ctgry['category_id']){echo "selected";}elseif(set_value('category',null)==null&&$course['course_category']==$ctgry['category_id']){echo "selected";} ?>><?php echo ucwords($ctgry["category_name"]); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="font-weight-bold">Course Type</label>
									<?php echo form_error('type'); ?>
									<select class="form-control form-control-sm" name="type">
										<option value="premium" <?php if(set_value('type',null)=='premium'){echo "selected";}else{if($course['course_type']=='premium'){echo "selected";}} ?>>Premium</option>
										<option value="free" <?php if(set_value('type',null)=='free'){echo "selected";}else{if($course['course_type']=='free'){echo "selected";}} ?>>Free</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="font-weight-bold">Description</label>
							<?php echo form_error('description'); ?>
							<textarea class="form-control form-control-sm" maxlength="1500" name="description" rows="8"><?php if(set_value('description',null)!=null){echo set_value('description');}elseif(!empty($course['course_description'])){echo $course['course_description'];} ?></textarea>
							<small class="text-muted">What is your course about? Tell your students in 1500 charactters or less.</small>
						</div>
						<div class="form-group">
							<label class="font-weight-bold">Who should take this course?</label>
							<?php echo form_error('audience'); ?>
							<textarea class="form-control form-control-sm" maxlength="1000" name="audience" rows="6"><?php if(set_value('audience',null)!=null){echo set_value('audience');}elseif(!empty($course['course_audience'])){echo $course['course_audience'];} ?></textarea>
							<small class="text-muted">Who are your target audiance for this course?</small>
						</div>
						<div class="form-group">
							<label class="font-weight-bold">What knowledge and tools are required?</label>
							<?php echo form_error('ktools'); ?>
							<textarea class="form-control form-control-sm" maxlength="1000" name="ktools" rows="6"><?php if(set_value('ktools',null)!=null){echo set_value('ktools');}elseif(!empty($course['course_tools'])){echo $course['course_tools'];} ?></textarea>
							<small class="text-muted">What are the the specific tools the student will need</small>
						</div>
						<div class="form-group">
							<label class="font-weight-bold">What will students achieve or be able to do after taking your course?</label>
							<?php echo form_error('goals'); ?>
							<textarea class="form-control form-control-sm" maxlength="1000" name="goals" rows="6"><?php if(set_value('goals',null)!=null){echo set_value('goals');}elseif(!empty($course['course_achievement'])){echo $course['course_achievement'];} ?></textarea>
							<small class="text-muted">What are the things the students will learn by the end of the course</small>
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>