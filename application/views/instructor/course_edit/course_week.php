<style>
	a{
		text-decoration: none;
		color: inherit;
	}
	a:hover{
		text-decoration: none;
		color: inherit;
	}
</style>
<div style="background-color: #17505D;" class="pb-3 pt-3 mb-5 mb-5">
	<div class="container text-white">
		<h4>
			<span class="text-info">
				<a href="<?php echo base_url("course/edit/outline/$course_id"); ?>"><?php echo ucwords($course['course_title']); ?></a>
			</span>
			 / 
			<span><?php echo "Week $week_num"; ?></span>
		</h4>
		<div>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview</a>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card border-info">
				<div class="card-header border-info text-center">Week Overview</div>
					<?php if(!empty($outline)): ?>
						<ul class="list-group list-group-flush">
							<?php foreach($outline as $outln): ?>
								<?php if($outln['outline_type']=='video'): ?>
									<li class="list-group-item"><a class="outline-list" href="<?php echo base_url("course/edit/outline/$course_id/video/").$outln['outline_id']; ?>"><?php echo ucwords($outln['video_title']); ?>&#9;<i class="fas fa-video"></i></a></li>
								<?php elseif($outln['outline_type']=='lecture'): ?>
									<li class="list-group-item">
										<a class="outline-list" href="<?php echo base_url("course/edit/outline/$course_id/lecture/").$outln['outline_id']; ?>"><?php echo ucwords($outln['lecture_title']); ?>&#9;<i class="far fa-newspaper"></i></a>
										<button class="btn btn-danger btn-sm float-right" type="button" id="delete-<?php echo $outln['outline_id']; ?>">delete</button>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					<?php else: ?>
						<div class="card-body">
							<h5 class="text-center">This Week has no lessons yet.</h5>
						</div>
					<?php endif; ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body text-center">
					<small class="card-text text-muted">Ekademya courses consists of videos and lectures. To have your course published, you need to upload at least a handful of it.</small>
					<hr>
					<a rolse="button" class="btn btn-sm btn-block btn-info" href="<?php echo base_url("course/edit/outline/$course_id/week/$week_id/$week_code/video"); ?>">Add Video</a>
					<a rolse="button" class="btn btn-sm btn-block btn-info" href="<?php echo base_url("course/edit/outline/$course_id/week/$week_id/$week_code/lecture"); ?>">Add Lecture</a>
					<!-- <a rolse="button" class="btn btn-sm btn-info" href="<?php echo base_url("course/edit/outline/$course_id/quiz"); ?>">Add Quiz</a> -->
				</div>
			</div>
		</div>
	</div>
</div>