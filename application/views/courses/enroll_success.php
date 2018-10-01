<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3 mt-4">
			<div class="card border-success mt-5">
				<div class="card-body">
					<h4 class="card-title">Success</h4>
					<p class="card-text">Congratulations, you're now enrolled to <span class="text-info"><?php echo ucwords($course['course_title']); ?></span>.</p>
					<a role="button" href="<?php echo base_url('mycourse/'.$course['course_id']); ?>" class="btn btn-sm c2 text-white">Okay</a>
				</div>
			</div>
		</div>
	</div>
</div>