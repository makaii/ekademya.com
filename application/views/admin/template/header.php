<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php if(!empty($page_title)){echo $page_title;} ?></title>

	<!-- favicon -->
	<link rel="icon" type="image/ico" href="<?php echo base_url('assets/admin/img/favicon/favicon.ico'); ?>">

	<!-- CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custom-style.css'); ?>">

	<!-- icons -->
	<link href="<?php echo base_url('assets/admin/css/font-awesome.css'); ?>" rel="stylesheet">
</head>
<body class="bg-light">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
		<a class="navbar-brand" href="<?php echo base_url('admin'); ?>">Ekademya Admin</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Go to
					</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo base_url(); ?>" target="_blank">Ekademya</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
				</li>
			</ul>
		<span class="navbar-text"><a href="<?php echo base_url('signout'); ?>">Signout</a></span>
		</div>
		</div>
	</nav>
	<div id="main-wrapper" class="container mt-5">
		<div class="row">
			<div class="col-md-3" id="sidebar">
				<div class="list-group">
					<a href="<?php echo base_url('admin'); ?>" class="list-group-item list-group-item-action <?php if(!empty($overview_active)){echo $overview_active;} ?>">
						Overview
					</a>
					<a href="<?php echo base_url('admin/courses'); ?>" class="list-group-item list-group-item-action <?php if(!empty($courses_active)){echo $courses_active;} ?>">
						Courses
					</a>
					<a href="<?php echo base_url('admin/review'); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php if(!empty($review_active)){echo $review_active;} ?>">
						Courses Review <?php if($this->Admin_model->count_courses_for_review()!=null){echo '<span class="badge badge-primary badge-pill">'.$this->Admin_model->count_courses_for_review().'</span>';} ?>
					</a>
					<a href="<?php echo base_url('admin/instructors'); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php if(!empty($instructors_active)){echo $instructors_active;} ?>">
						Instructors<span class="badge badge-primary badge-pill"><?php echo $this->Admin_model->count_instructors(); ?></span></a>
					<a href="<?php echo base_url('admin/categories'); ?>" class="list-group-item list-group-item-action <?php if(!empty($categories_active)){echo $categories_active;} ?>">
						Categories
					</a>
					<a href="<?php echo base_url('admin/settings'); ?>" class="list-group-item list-group-item-action <?php if(!empty($settings_active)){echo $settings_active;} ?>">
						Settings
					</a>
				</div>
			</div>
			<div class="col-md-9" id="main-content">