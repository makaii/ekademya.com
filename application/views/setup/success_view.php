<div class="jumbotron">	
	<div class="container text-center">
		<div class="alert alert-success" role="alert">
			<h6 class="display-4 text-success">Database Setup is a success</h6>
			<a href="<?php echo base_url(); ?>"><button class="btn btn-info btn-lg ">Home</button></a>
		</div>
	</div>
</div>
<div class="container">
	<?php foreach ($table as $field): ?>
		<pre><?php echo print_r($field) ?></pre>
	<?php endforeach; ?>
</div>