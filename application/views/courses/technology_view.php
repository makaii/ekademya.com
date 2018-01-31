<style type="text/css">
	.card-image-top
	{
		height: auto;
		width: 360px;
		min-height: 200px
	}
}
</style>
<div class="jumbotron bg-white">
	<div class="container">
		<h4 class="text-center display-4">Access our Classes</h4>
		<hr>
		<ul class="nav nav-pills nav-fill">
		  <li class="nav-item">
		    <?php echo $n1; ?>
		  </li>
		  <li class="nav-item">
		    <?php echo $n2; ?>
		  </li>
		  <li class="nav-item">
		    <?php echo $n3; ?>
		  </li>
		  <li class="nav-item">
		    <?php echo $n4; ?>
		  </li>
		  <li class="nav-item">
		    <?php echo $n5; ?>
		  </li>
		</ul>
		<div class="mt-5">
			<?php $courses = $this->Courses_model->show_courses_by_category('Technology'); ?>
			<?php if (($courses!==null)&&($courses!==false)): ?>
				<div class="card-columns">
				<?php foreach ($courses as $data): ?>
					<div class="card">
					  <img class="card-image-top img-fluid" src="<?php echo base_url('z/course/'.$data['course_img']); ?>" alt="<?php  ?>"></img>
					  <div class="card-body pb-0">
					    <p class="card-title"><?php echo $data['course_title']; ?></p>
					    <small><?php echo $data['course_author']; ?></small>
					  </div>
					  <div class="card-body pt-0">
					  	<div class="text-right">
					  		<span class="oi oi-clock"></span> 5h
					  	</div>
					  </div>
					</div>
				<?php endforeach; ?>
				</div>
			<?php else: ?>
				<?php echo "no courses"; ?>
			<?php endif; ?>
			
			<!-- <div class="card-deck">
			  <div class="card">
			    <img class="card-image-top img-fluid" src="<?php echo base_url('assets/img/1.jpeg'); ?>" alt="<?php  ?>"></img>
			    <div class="card-body pb-0">
			      <p class="card-title">Introduction to Regular Expressions</p>
			      <small>Mark Cevan</small>
			    </div>
			    <div class="card-body pt-0">
			    	<div class="text-right">
			    		<span class="oi oi-clock"></span> 5h
			    	</div>
			    </div>
			  </div>
			  <div class="card">
			    <img class="card-image-top img-fluid" src="<?php echo base_url('assets/img/2.jpeg'); ?>" alt="<?php  ?>"></img>
			    <div class="card-body pb-0">
			      <p class="card-title">Course Title</p>
			      <small>author</small>
			    </div>
			    <div class="card-body pt-0">
			    	<div class="text-right">
			    		<span class="oi oi-clock"></span> 5h
			    	</div>
			    </div>
			  </div>
			  <div class="card">
			    <img class="card-image-top img-fluid" src="<?php echo base_url('assets/img/3.jpeg'); ?>" alt="<?php  ?>"></img>
			    <div class="card-body pb-0">
			      <p class="card-title">Course Title</p>
			      <small>author</small>
			    </div>
			    <div class="card-body pt-0">
			    	<div class="text-right">
			    		<span class="oi oi-clock"></span> 5h
			    	</div>
			    </div>
			  </div>
			  <div class="card">
			    <img class="card-image-top img-fluid" src="<?php echo base_url('assets/img/4.jpeg'); ?>" alt="<?php  ?>"></img>
			    <div class="card-body pb-0">
			      <p class="card-title">Course Title</p>
			      <small>author</small>
			    </div>
			    <div class="card-body pt-0">
			    	<div class="text-right">
			    		<span class="oi oi-clock"></span> 5h
			    	</div>
			    </div>
			  </div>
			</div> -->
		</div>
	</div>
</div>