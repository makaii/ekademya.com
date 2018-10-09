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
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Profile</th>
				<th>Final Project</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php if (!empty($p)): ?>
			<?php foreach($p as $key): ?>
				<tr>
					<td><?php echo ucwords($key['user_fname'].' '.$key['user_lname']); ?></td>
					<td><?php echo $key['user_email']; ?></td>
					<td><a role="button" class="btn btn-sm btn-primary" href="<?php echo base_url('u/'.$key['user_id']); ?>" target="_blank">link</a></td>
					<td><a role="button" class="btn btn-sm btn-primary" href="<?php echo base_url("z/projects/".$key['project_url']); ?>" target="_blank" download><i class="fas fa-arrow-down"></i>&nbsp;download</a></td>
					<td><?php $date=date_create($key['project_date']);echo date_format($date, "M-d-Y h:i A"); ?></td>
					<td></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<section>No Projects from Students yet</section>
		<?php endif ?>
	</table>
</div>