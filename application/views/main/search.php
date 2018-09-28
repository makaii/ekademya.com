<style>
	img
	{
		max-width: 250px;
		max-height: 150px;
	}
	a{
		color: black;
	}
	a:hover{
		color: inherit;
		text-decoration: none;
	}
</style>
<div class="container">
	<?php if(!empty($search)): ?>
		<div class="row mt-5">
			<?php foreach($search as $s): ?>
				<div class="col-md-4">
					<div class="card">
						<img class="card-image-top img-fluid" src="<?php echo base_url('z/thumbnails/'.$s['course_img_url']); ?>" alt="<?php echo $s['course_img_url']; ?>"></img>
						<div class="card-body pb-0">
							<span class="card-title text-info">
								<a href="<?php echo base_url('course/'.$s['course_id']); ?>"><?php echo ucwords($s['course_title']); ?></a>
							</span>
							<br>
							<small>
								<a href="<?php echo base_url('u/'.$s['course_author']); ?>"><?php echo ucwords($s['user_fname'].' '.$s['user_lname']); ?></a>
							</small>
							<br>
							<small>
								<a href="<?php echo base_url('course/'.$s['category_name']); ?>"><?php echo ucwords($s['category_name']); ?></a>
							</small>
						</div>
						<div class="card-body pt-0">
							<div class="text-right">
								<span class="oi oi-clock"></span> 5h
							</div>
						</div>
					</div>
					<!-- <div class="card">
						<div class="card-body pl-0 pb-0 pt-0">
							<img src="https://scontent.fmnl5-1.fna.fbcdn.net/v/t1.15752-9/42576632_247899532736686_5385334358582231040_n.png?_nc_cat=106&oh=d2bd6b8fdca2be42d14fda701d6eca60&oe=5C1E1D9A" alt="asdasd" class="img-fluid">
							<a href="" class="text-info"><?php echo $s['course_title']; ?></a>
							<span class="text-info"></span>
							<span class="text-info"><?php echo $s['category_name']; ?></span>
						</div>
					</div> -->
				</div>
			<?php endforeach;; ?>
		</div>
	<?php else: ?>
		<div class="row mt-5">
			<div class="col-md-4">
				<div class="card">
				  <img class="card-image-top img-fluid" src="<?php echo base_url('assets/img/2.jpeg'); ?>" alt="<?php  ?>"></img>
				  <div class="card-body pb-0">
				    <p class="card-title">Empty Search</p>
				    <!-- <small>author</small> -->
				  </div>
				  <!-- <div class="card-body pt-0">
				    <div class="text-right">
				      <span class="oi oi-clock"></span> 5h
				    </div>
				  </div> -->
				</div>
				<!-- <div class="card">
					<div class="card-body pl-0 pb-0 pt-0">
						<img src="https://scontent.fmnl5-1.fna.fbcdn.net/v/t1.15752-9/42576632_247899532736686_5385334358582231040_n.png?_nc_cat=106&oh=d2bd6b8fdca2be42d14fda701d6eca60&oe=5C1E1D9A" alt="asdasd" class="img-fluid">
						<span class="text-info"><?php echo "Empty Search"; ?></span>
					</div>
				</div> -->
			</div>
		</div>		
	<?php endif; ?>
</div>
