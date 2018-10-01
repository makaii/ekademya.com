<div class="row">
	<div class="col">
		<h2 class="text-muted">Instructors</h2>
	</div>
	<div class="col text-right">
		<small class="text-muted"><?php echo date("M/d/Y"); ?></small>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<?php if(!empty($instructors)): ?>
			<table class="table table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>lastname</th>
						<th>firstname</th>
						<th>email</th>
						<th>date joined</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($instructors as $i): ?>
					<tr>
						<td><?php echo $i['user_id']; ?></td>
						<td><?php echo $i['user_fname']; ?></td>
						<td><?php echo $i['user_lname']; ?></td>
						<td><?php echo $i['user_email']; ?></td>
						<td><?php echo $i['user_date_joined']; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<?php echo "Intructors N/A"; ?>
		<?php endif; ?>
	</div>
</div>