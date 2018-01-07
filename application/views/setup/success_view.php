<div class="jumbotron">	
	<div class="container text-center">
		<div class="alert alert-success" role="alert">
			<h6 class="display-4 text-success">Database Setup is a success</h6>
			<a href="<?php echo base_url(); ?>"><button class="btn btn-info btn-lg ">Home</button></a>
		</div>
	</div>
</div>
<div class="container">
	<h4>User_tbl</h4>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Type</th>
				<th scope="col">Max. Length</th>
				<th scope="col">Default</th>
				<th scope="col">Primary Key</th>
			</tr>
		</thead>
		<tbody>
			<?php $row_count = 1; ?>
			<?php foreach ($user as $field): ?>
			<tr>
				<th scope="row"><?php echo $row_count; ?></th>
				<td><?php echo $field->name; ?></td>
				<td><?php echo $field->type; ?></td>
				<td><?php echo $field->max_length; ?></td>
				<td><?php echo $field->default; ?></td>
				<td><?php echo $field->primary_key; ?></td>
			</tr>
			<?php $row_count +=1; ?>
			<?php endforeach; ?>
			<?php $row_count = 1; ?>
		</tbody>
	</table>
</div>
<div class="container">
	<h4>Instructor_tbl</h4>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Type</th>
				<th scope="col">Max. Length</th>
				<th scope="col">Default</th>
				<th scope="col">Primary Key</th>
			</tr>
		</thead>
		<tbody>
			<?php $row_count = 1; ?>
			<?php foreach ($instructor as $field): ?>
			<tr>
				<th scope="row"><?php echo $row_count; ?></th>
				<td><?php echo $field->name; ?></td>
				<td><?php echo $field->type; ?></td>
				<td><?php echo $field->max_length; ?></td>
				<td><?php echo $field->default; ?></td>
				<td><?php echo $field->primary_key; ?></td>
			</tr>
			<?php $row_count +=1; ?>
			<?php endforeach; ?>
			<?php $row_count = 1; ?>
		</tbody>
	</table>
</div>