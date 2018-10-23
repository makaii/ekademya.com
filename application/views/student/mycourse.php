<style>
	a:hover {
		text-decoration: none;
	}
</style>
<!-- <pre><?php print_r($p); ?></pre> -->
<div style="background-color: #E4F1FE;" class="pb-3 pt-3 mb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<span class="h4"><?php echo $course['course_title']; ?></span>
			</div>
			<div class="col-md-5">
				<div class="progress">
					<div style="width: 25%" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<small><pre><?php print_r($p); ?></pre></small>
			<!-- <small><pre><?php print_r($outline); ?></pre></small> -->
			<?php if(!empty($outline)): ?>
				<div class="card mb-3">
					<div class="card-header font-weight-bold">Lesson Overview</div>
					<ul class="list-group list-group-flush">
						<?php foreach($outline as $wkey=>$week): ?>
							<?php foreach($week as $key=>$o): ?>
								<?php if($o['outline_type']=='video'): ?>
									<li class="list-group-item">
										<?php if($o['outline_id']==$p[$key]['progress_outline']): ?>
											<a href="<?php echo base_url("mycourse/$course_id/video/".$o['outline_id']); ?>">
												<?php echo ucwords($o['video_title']); ?>
											</a>
										<?php else: ?>
											<a>
												<?php echo $o['outline_id'];echo ucwords($o['video_title']); ?>
											</a>
										<?php endif; ?>
									</li>
								<?php elseif($o['outline_type']=='lecture'): ?>
									<li class="list-group-item">
										<?php if($o['outline_id']==$p[$key]['progress_outline']): ?>
											<a href="<?php echo base_url("mycourse/$course_id/lecture/".$o['outline_id']); ?>">
												<?php echo $o['lecture_title']; ?>
											</a>
										<?php else: ?>
											<a>
												<?php echo $o['outline_id'];echo $o['lecture_title']; ?>
											</a>
										<?php endif; ?>
									</li>
								<?php elseif($o['outline_type']=='quiz'): ?>
									<li class="list-group-item">
										<?php if($o['outline_id']==$p[$key]['progress_outline']): ?>
											<a href="<?php echo base_url("mycourse/$course_id/quiz/".$o['outline_id']); ?>">
												<?php echo $o['quiz_title']; ?>
											</a>
										<?php else: ?>
											<a>
												<?php echo $o['outline_id'];echo $o['quiz_title']; ?>
											</a>
										<?php endif; ?>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endforeach; ?>
						<!-- <?php foreach($outline as $key => $o): ?>
							<?php if($o['outline_type']=='video'): ?>
								<li class="list-group-item">
									<?php if($o['outline_id']==$p[$key]['progress_outline']): ?>
										<a href="<?php echo base_url("mycourse/$course_id/video/".$o['outline_id']); ?>">
											<?php echo ucwords($o['video_title']); ?>
										</a>
									<?php else: ?>
										<a>
											<?php echo ucwords($o['video_title']); ?>
										</a>
									<?php endif; ?>
								</li>
							<?php elseif($o['outline_type']=='lecture'): ?>
								<li class="list-group-item">
									<?php if($o['outline_id']==$p[$key]['progress_outline']): ?>
										<a href="<?php echo base_url("mycourse/$course_id/lecture/".$o['outline_id']); ?>">
											<?php echo $o['lecture_title']; ?>
										</a>
									<?php else: ?>
										<a">
											<?php echo $o['lecture_title']; ?>
										</a>
									<?php endif; ?>
								</li>
							<?php elseif($o['outline_Type']=='quiz'): ?>

							<?php endif; ?>
						<?php endforeach; ?> -->
					</ul>
				</div>
			<?php endif; ?>
			<?php $last_elem = end($p); ?>
			<?php if(!empty($last_elem['progress_id'])): ?>
				<a href="<?php echo base_url("mycourse/$course_id/project"); ?>" role="button" class="btn btn-block c2 text-white font-weight-bold">Upload Final Project</a>
			<?php endif; ?>
		</div>
		<div class="col-md-8">
			<?php if(!empty($course)): ?>
				<small class="text-muted"><?php echo nl2br($course['course_description']); ?></small>
			<?php endif; ?>
		</div>
	</div>
</div>