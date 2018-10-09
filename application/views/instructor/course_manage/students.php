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
			<span>Students</span>
		</h4>
	</div>
</div>

<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
			</tr>
		</thead>
		<?php if (!empty($s)): ?>
			<?php foreach($s as $key): ?>
				<tr>
					<td><?php echo $key['user_fname'].' '.$key['user_lnane']; ?></td>
					<td><?php echo $key['user_pubemail']; ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<section>No Students yet</section>
		<?php endif ?>
	</table>
</div>