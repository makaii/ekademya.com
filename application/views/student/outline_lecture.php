<style>
	a{
		color: inherit;
	}
	a:hover{
		text-decoration: none;
		color: inherit;
	}
</style>
<div style="background-color: #E4F1FE;" class="pb-3 pt-3 mb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>
					<span class="text-info">
						<a href="<?php echo base_url("mycourse/$course_id"); ?>">
							<?php echo $c['course_title']; ?>
						</a>
					</span>
					<span> / </span>
					<span class=""><?php echo $l['lecture_title']; ?></span>
				</h4>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h5><?php echo ucwords($l['lecture_title']); ?></h5>
			<p><?php echo nl2br($l['lecture_body']); ?></p>
			<?php $last_elem = end($p); ?>
			<?php if(!empty($last_elem['progress_id'])): ?>
				<a href="<?php echo base_url("mycourse/$course_id/final"); ?>" class="btn btn-block btn-primary c2 font-weight-bold mt-2" style="border: none;" id="nextLesson" role="button">Proceed to Final Project</a>
			<?php endif; ?>
			<?php if(!empty($next_lesson)): ?>
				<a href="<?php echo base_url("mycourse/$course_id/$next_lesson_type/$next_lesson"); ?>" class="btn btn-block btn-info font-weight-bold mt-2" style="border: none;" id="nextLesson" role="button">Next</a>
			<?php endif; ?>
		</div>
	</div>
</div>