<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/fontastic.css'); ?>">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/style.green.css') ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/custom.css'); ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/admin/img/favicon/favicon.ico') ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <div class="sidenav-header-inner text-center">
            <!-- <img src="img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle"> -->
            <h2 class="h5 text-uppercase"><?php echo $admin_email; ?></h2>
            <!-- <span class="text-uppercase">Job Title</span> -->
          </div>
          <div class="sidenav-header-logo">
            <a href="index.html" class="brand-small text-center">
              <strong>E</strong>
              <strong class="text-primary">K</strong>
            </a>
          </div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="active">
              <a href="<?php echo base_url('admin'); ?>"><i class="icon-home"></i><span>Home</span></a>
            </li>
            <li>
              <a href="#"><i class="icon-form"></i><span>Forms</span></a>
            </li>
            <li>
              <a href="#"><i class="icon-presentation"></i><span>Charts</span></a>
            </li>
            <li>
              <a href="#"><i class="icon-grid"></i><span>Tables</span></a>
            </li>
            <li>
              <a href="#"><i class="icon-interface-windows"></i><span>Login page</span></a>
            </li>
            <li>
              <a href="#"><i class="icon-mail"></i><span>Demo</span> <div class="badge badge-warning">6 New</div></a>
            </li>
          </ul>
        </div>
        <div class="admin-menu">
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
            <li> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-interface-windows"></i><span>Dropdown</span>
                <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
              <ul id="pages-nav-list" class="collapse list-unstyled">
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
                <li><a href="#">Page 4</a></li>
              </ul>
            </li>
            <li> <a href="#"> <i class="icon-screen"> </i><span>Demo</span></a></li>
            <li> <a href="#"> <i class="icon-flask"> </i><span>Demo</span>
                <div class="badge badge-info">Special</div></a></li>
            <li> <a href=""> <i class="icon-flask"> </i><span>Demo</span></a></li>
            <li> <a href=""> <i class="icon-picture"> </i><span>Demo</span></a></li>
          </ul>
        </div>
      </div>
    </nav>