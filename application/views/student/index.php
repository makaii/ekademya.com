<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="display-4">My Courses</p>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<?php if($this->Account_model->get_courses($_SESSION['user_email'])===null): ?>
			<div class="col-12 col-sm-6 col-md-3">
				<div class="card mb-3">
					<div class="card-body pb-0">
						<h5 class="card-title">You haven't enrolled into any courses</h5>
					</div>
					<a href="">
						<img class="card-img-top course-thumb-img" src="<?php echo base_url('assets/img/4.jpeg'); ?>" alt="<?php  ?>" title="<?php  ?>"></img>
					</a>
					<div class="card-body pb-0">
						<small class="card-title font-weight-bold"><?php echo substr("Click here to search", null, 45)."..."; ?></small>
						<br>
						<a href="" style="text-decoration: none; color: inherit;"><small class="font-weight-light">Ekademya</small></a>
						<hr>
						<div class="text-right">
							<span class="oi oi-clock"></span> 0h
						</div>
					</div>
				</div>
			</div>
		<?php elseif($this->Account_model->get_courses($_SESSION['email'])===false): ?>
			<div class="col-12 col-sm-6 col-md-3">
				<div class="card mb-3">
					<img class="card-img-top course-thumb-img" src="<?php echo base_url('assets/img/4.jpeg'); ?>" alt="<?php  ?>" title="<?php  ?>"></img>
					<div class="card-body pb-0">
						<small class="card-title font-weight-bold"><?php echo substr("Regex Academy: An Introduction To Text Parsing Sorcery", null, 45)."..."; ?></small>
						<br>
						<a href="" style="text-decoration: none; color: inherit;"><small class="font-weight-light">Author</small></a>
						<hr>
						<div class="text-right">
							<span class="oi oi-clock"></span> 0h
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>