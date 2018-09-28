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