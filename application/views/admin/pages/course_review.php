<div class="container-fluid" id="wrapper">
	<div class="row">
		<?php $this->load->view("admin/template/sidebar"); ?>
		
		<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
			<header class="page-header row justify-center">
				<div class="col-md-6 col-lg-8" >
					<h1 class="float-left text-center text-md-left"><?php echo $course['course_title']; ?></h1>
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
			
			<section class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5>Title: <span class="text-muted"><?php echo $course['course_title']; ?></span></h5>
							<h5>Description: <span class="text-muted"><?php echo $course['course_description']; ?></span></h5>
							<h5>Author: <span class="text-muted"><?php echo $course['user_email']; ?></span></h5>
							<h5>Category: <span class="text-muted"><?php echo $course['course_category']; ?></span></h5>
							<h5>Tools: <span class="text-muted"><?php echo $course['course_tools']; ?></span></h5>
							<h5>Audience: <span class="text-muted"><?php echo $course['course_audience']; ?></span></h5>
							<h5>Achievement: <span class="text-muted"><?php echo $course['course_achievement']; ?></span></h5>
							<h5>Date Created: <span class="text-muted"><?php echo date_format(date_create($course['course_date_created']),"M. d, Y g:i:s A"); ?></span></h5>
						</div>
					</div>
				</div>
			</section>
			<section class="row">
				<div class="col-md-12">
					<?php if (!empty($outline)): ?>
						<?php foreach($outline as $outln): ?>
							<div class="card mt-2">
								<div class="card-body">
									<?php if ($outln['outline_type']=='video'): ?>
										<h6 class="font-weight-bold"><?php echo $outln['video_title']; ?></h6>
										<h6><?php echo $outln['video_description']; ?></h6>
										<?php if($outln['video_thumbnail']==null){$thumbnail_url = "default_thumbnail.png";}else $thumbnail_url=$outln['video_thumbnail']; ?>
										<video controls controlsList="nodownload" preload="none" poster="<?php echo base_url("z/thumbnails/$thumbnail_url"); ?>" width="720" height="404">
											<?php $ext=pathinfo($outln['video_url'],PATHINFO_EXTENSION); ?>
											<?php if($ext=='mp4'): ?>
												<source src="<?php echo base_url("z/course/".$outln['video_url']); ?>" type="video/mp4">
											<?php elseif($ext=='webm'): ?>
												<source src="<?php echo base_url("z/course/".$outln['video_url']); ?>" type="video/webm">
											<?php endif; ?>
										</video>
									<?php elseif($outln['outline_type']=='lecture'): ?>
										<h6 class="font-weight-bold"><?php echo $outln['lecture_title']; ?></h6>
										<h6><?php echo $outln['lecture_body']; ?></h6>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						somethoing is wrong
					<?php endif; ?>
				</div>
			</section>
		</main>
	</div>
</div>