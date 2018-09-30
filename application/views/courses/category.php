<div class="container mt-5">
	<?php if(!empty($courses)): ?>
		<?php foreach($courses as $c): ?>
			<?php echo $c['course_title']; ?>
		<?php endforeach; ?>
	<?php else: ?>
		<div class="card-columns">
			<div class="card">
				<img class="card-img-top" src="<?php echo base_url('images/z/1.jpeg'); ?>" alt="sad face" title="sad face">
				<div class="card-body">
					<h5 class="card-title">There are no courses yet</h5>
					<p class="card-text">Help by expanding our catalog by joining us and creating your own online course</p>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>