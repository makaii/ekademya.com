<style type="text/css">
	.list-group-item.active{
		background-color: #36D7B7 !important;
		border-color: transparent !important;
		color: white !important;
	}
</style>
<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-md-2">
			<img class="rounded img-thumbnail" src="https://www.udemy.com/staticx/udemy/images/course/200_H/placeholder.png">
		</div>
		<div class="col-md-10">
			<h3 class="font-weight-light">Course Title</h3>
			<p class="font-weight-light">Author</p>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row mt-4 mb-4">
		<div class="col-md-2">
			<div class="list-group">
				<a href="<?php echo base_url('course/manage/goals'); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">1</span> Goals</a>
				<a href="<?php echo base_url('course/manage/landing_page'); ?>" class="list-group-item list-group-item-action active"><span class="badge badge-dark">2</span> Landing Page</a>
				<a href="<?php echo base_url('course/manage/curriculum'); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">3</span> Curriculum</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3>Course Landing Page</h3>
				</div>
				<div class="card-body">
					<form>
						<div class="form-group">
							<label>Course Title</label>
							<input class="form-control" type="text" name="">
						</div>
						<div class="form-group">
							<label>Course Description</label>
							<textarea class="form-control"></textarea>
						</div>
						<div class="custom-file">
						  <input type="file" class="custom-file-input" id="customFile">
						  <label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>