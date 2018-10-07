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
				<a href="<?php echo base_url("course/manage/$course_id"); ?>"><?php echo ucwords($c['course_title']); ?></a>
			</span>
			 / 
			<span>Final Projects</span>
		</h4>
	</div>
</div>

<div class="container">
	<?php print_r($s); ?>
</div>