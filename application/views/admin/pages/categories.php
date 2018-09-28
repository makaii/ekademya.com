<div class="row">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">Add New Category</div>
			<div class="card-body">
				<form method="POST">
					<div class="form-group">
						<label>Category Name</label>
						<input class="form-control" type="text" name="categoryName" value="<?php echo set_value("categoryName",null); ?>"></input>
						<small><?php echo form_error("categoryName"); ?></small>
					</div>
					<div class="form-group">
						<label>Category Code</label>
						<input class="form-control" type="text" name="categoryCode" value="<?php echo set_value("categoryCode",null); ?>"></input>
						<small class="form-text text-muted">category code serves as the url identifier</small>
						<small><?php echo form_error('categoryCode'); ?></small>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Add</button>
						<button class="btn btn-default" type="reset">Clear</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="card">
			<div class="card-header">
				Categories
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Category Name</th>
							<th>Category Code</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($categories)): ?>
							<?php foreach ($categories as $ctg): ?>
								<tr>
									<td><?php echo $ctg['category_id']; ?></td>
									<td><?php echo $ctg['category_name']; ?></td>
									<td><span class="font-weight-bold">/</span><?php echo $ctg['category_code']; ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>