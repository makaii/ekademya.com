<div class="row">
	<div class="col-md-12">
		<table class="table table-sm">
			<thead>
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Category</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php if (!empty($courses_review)): ?>
				<tbody>
					<?php foreach ($courses_review as $course): ?>
						<tr>
							<th><?php echo $course['course_title']; ?></th>
							<td><?php echo $course['user_email'] ?></td>
							<td><?php echo $course['category_name']; ?></td>
							<td><a href="<?php echo base_url("admin/review/").$course['course_id']; ?>" role="button" class="btn btn-sm btn-primary">view</a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			<?php else: ?>
				<section>no courses for review</section>
			<?php endif; ?>
		</table>
	</div>
</div>