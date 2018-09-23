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
      <!-- CDN Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <!-- Local Link -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
      <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom-style.css'); ?>">


    <!-- Icons -->
    <!-- <link href="<?php echo base_url('assets/fonts/open-iconic/font/css/open-iconic-bootstrap.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome/css/font-awesome.min.css'); ?>"> -->

    <!-- fontawesome 5.3.1 Icons -->
    <link href="<?php echo base_url('assets/fonts/fontawesome-free-5.3.1-web/css/all.css'); ?>" rel="stylesheet">
    <script defer src="<?php echo base_url('assets/fonts/fontawesome-free-5.3.1-web/js/all.js'); ?>"></script>
    <link href="<?php echo base_url('assets/fonts/fontawesome-free-5.3.1-web/css/fontawesome.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/fonts/fontawesome-free-5.3.1-web/css/brands.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/fonts/fontawesome-free-5.3.1-web/css/solid.css'); ?>" rel="stylesheet">
    <script defer serc="<?php echo base_url('assets/fonts/fontawesome-free-5.3.1-web/js/brands.js'); ?>"></script>
    <script defer serc="<?php echo base_url('assets/fonts/fontawesome-free-5.3.1-web/js/solid.js'); ?>"></script>
    <script defer serc="<?php echo base_url('assets/fonts/fontawesome-free-5.3.1-web/js/fontawesome.css'); ?>"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Local Javascripts -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
    
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light c1">
      <div class="container">
        <a class="navbar-brand text-white" href="<?php echo base_url(); ?>">E K A D E M Y A</a>
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
                <?php foreach ($course_categories as $category): ?>
                  <a class="dropdown-item" href="<?php echo base_url('courses/'.$category['category_code']); ?>"><?php echo ucwords($category['category_name']); ?></a>
                <?php endforeach; ?>
              </div>
            </li>
            <li>
              <a href="<?php echo base_url('signup/instructor'); ?>"><button class="btn btn-light">Become an Instructor</button></a>
              <a href="<?php echo base_url('signin'); ?>"><button class="btn btn-light c2 text-white">Signin</button></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('search'); ?>" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Explore Courses" name="data" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>