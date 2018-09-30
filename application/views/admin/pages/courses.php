<div class="row">
	<div class="col">
		<h2 class="text-muted">Courses</h2>
	</div>
	<div class="col text-right">
		<small class="text-muted"><?php echo date("M/d/Y"); ?></small>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<h4 class="text-muted text-center">Featured Courses</h4>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Category</th>
					<th>Author</th>
				</tr>
			</thead>
			<?php if (!empty($courses)): ?>
				<tbody>
					<?php foreach($courses as $c): ?>
						<tr>
							<td><?php echo $c['course_id']; ?></td>
							<td><?php echo $c['course_title']; ?></td>
							<td><?php echo $c['category_name']; ?></td>
							<td><?php echo $c['user_email']; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			<?php else: ?>
				<section>Courses N/A</section>
			<?php endif; ?>
		</table>
	</div>
</div>