<div class="row">
	<div class="col">
		<h2 class="text-muted">Overview</h2>
	</div>
	<div class="col text-right">
		<small class="text-muted"><?php echo date("M/d/Y"); ?></small>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-4">
		<div class="card text-center">
			<div class="card-body p-2">
				<i class="fa fa-users fa-5x"></i>
			</div>
			<div class="card-footer">Users&emsp;<span class="text-primary"><?php echo $no_user; ?></span></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card text-center">
			<div class="card-body p-2">
				<i class="fa fa-graduation-cap fa-5x"></i>
			</div>
			<div class="card-footer">Instructors&emsp;<span class="text-primary"><?php echo $no_instructors; ?></span></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card text-center">
			<div class="card-body p-2">
				<i class="fa fa-book fa-5x"></i>
			</div>
			<div class="card-footer">Courses&emsp;<span class="text-primary"><?php echo $no_courses; ?></span></div>
		</div>
	</div>
</div>