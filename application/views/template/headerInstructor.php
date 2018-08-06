<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $page_title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favico -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon/favicon.ico'); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('assets/img/favicon/favicon.ico'); ?>" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <!-- Local Link -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom-style.css'); ?>">

    <!-- Icons -->
    <link href="<?php echo base_url('assets/fonts/open-iconic/font/css/open-iconic-bootstrap.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome/css/font-awesome.min.css'); ?>">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Local Javascripts -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script> -->

  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light c1">
      <div class="container">
        <a class="navbar-brand text-white" href="<?php echo base_url('instructor'); ?>">E K A D E M Y A</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url('courses/art_design'); ?>">Art & Design</a>
                <a class="dropdown-item" href="<?php echo base_url('courses/business'); ?>">Business</a>
                <a class="dropdown-item" href="<?php echo base_url('courses/culinary'); ?>">Culinary</a>
                <a class="dropdown-item" href="<?php echo base_url('courses/film'); ?>">Film & Photography</a>
                <a class="dropdown-item" href="<?php echo base_url('courses/technology'); ?>">Technology</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item disabled" href="">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('search'); ?>" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Explore Courses" name="data" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
              </form>
            </li>
          </ul>
          <a href="<?php echo base_url('instructor'); ?>">
            <span class="navbar-text text-white mr-2 ml-2">
              <?php echo $this->session->userdata('user_name'); ?>
            </span>
          </a>
          <div class="nav-item dropdown">
            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Settings <span class="oi oi-cog"></span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url('profile'); ?>">Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('profile/account/edit'); ?>">Account</a>
              <a class="dropdown-item" href="<?php echo base_url('signout'); ?>">signout</a>
            </div>
          </div>
        </div>
      </div>
    </nav>