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
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php if(!empty($outline)): ?>
				<div class="card">
					<div class="card-header">Course Outline</div>
					<ul class="list-group list-group-flush">
						<?php foreach($outline as $key => $o): ?>
							<?php if($o['outline_type']=='video'): ?>
								<li class="list-group-item">
									<?php if($o['outline_id']==$p[$key]['progress_outline']): ?>
										<a href="<?php echo base_url("mycourse/$course_id/video/".$o['outline_id']); ?>">
											<?php echo $o['video_title']; ?>
										</a>
									<?php else: ?>
										<a>
											<?php echo $o['video_title']; ?>
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
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-md-8">
			<?php if(!empty($course)): ?>
				<small class="text-muted"><?php echo nl2br($course['course_description']); ?></small>
			<?php endif; ?>
		</div>
	</div>
</div>