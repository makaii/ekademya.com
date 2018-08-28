<div class="container-fluid" id="wrapper">
	<div class="row">
		<?php $this->load->view("admin/template/sidebar"); ?>
		
		<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
			<header class="page-header row justify-center">
				<div class="col-md-6 col-lg-8" >
					<h1 class="float-left text-center text-md-left">Unreviewed Courses</h1>
				</div>
				
				<div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="<?php echo base_url('assets/admin/img/profile-pic.jpg'); ?>" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
					
					<div class="username mt-1">
						<h6 class="mb-1"><?php echo $admin_email; ?></h6>
						
						<h6 class="text-muted"><?php echo $admin_type; ?></h6>
					</div>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink">
					     <a class="dropdown-item" href="<?php echo base_url('signout'); ?>"><em class="fa fa-power-off mr-1"></em> Signout</a></div>
				</div>
				
				<div class="clear"></div>
			</header>
			
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
										<td><?php echo $course['course_category']; ?></td>
										<td><a href="<?php echo base_url("admin/course_review/").$course['course_id']; ?>" role="button" class="btn btn-sm btn-primary">view</a></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						<?php else: ?>
							<section>no courses for review</section>
						<?php endif; ?>
					</table>
				</div>
			</div>
		</main>
	</div>
</div>