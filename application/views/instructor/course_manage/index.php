<div style="background-color: #17505D;" class="pb-3 pt-3 mb-5 mb-5">
	<div class="container text-white">
		<h4><?php echo ucwords($c['course_title']); ?></h4>
	</div>
</div>
<div class="container">
	<a href="<?php echo base_url("course/manage/$course_id/students"); ?>" class="btn btn-sm btn-light">Students</a>
	<a href="<?php echo base_url("course/manage/$course_id/projects"); ?>" class="btn btn-sm btn-light">Final Projects</a>
</div>