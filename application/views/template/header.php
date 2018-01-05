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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom-style.css'); ?>">

    <!-- Open Iconic -->
    <link href="<?php echo base_url('assets/fonts/open-iconic/font/css/open-iconic-bootstrap.css'); ?>" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light c1">
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
              <a class="dropdown-item" href="<?php echo base_url('courses/art_design'); ?>">Art & Design</a>
              <a class="dropdown-item" href="<?php echo base_url('courses/business'); ?>">Business</a>
              <a class="dropdown-item" href="<?php echo base_url('courses/culinary'); ?>">Culinary</a>
              <a class="dropdown-item" href="<?php echo base_url('courses/film'); ?>">Film & Photography</a>
              <a class="dropdown-item" href="<?php echo base_url('courses/technology'); ?>">Technology</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li>
            <button class="btn btn-light">Become an Instructor</button>
            <a href="<?php echo base_url('signin'); ?>"><button class="btn btn-light c2 text-white">Signin</button></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Explore Courses" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>