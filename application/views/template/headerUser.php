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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  	  <a class="navbar-brand" href="<?php echo base_url(); ?>">E K A D E M Y A</a>
  	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  	    <span class="navbar-toggler-icon"></span>
  	  </button>

  	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  	    <ul class="navbar-nav mr-auto">
  	      <li class="nav-item dropdown">
  	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  	          Categories
  	        </a>
  	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
  	          <a class="dropdown-item" href="#">Art</a>
  	          <a class="dropdown-item" href="#">Business</a>
  	          <a class="dropdown-item" href="#">Craft</a>
  	          <a class="dropdown-item" href="#">Culinary</a>
  	          <a class="dropdown-item" href="#">Design</a>
  	          <a class="dropdown-item" href="#">Film</a>
  	          <a class="dropdown-item" href="#">Photography</a>
  	          <a class="dropdown-item" href="#">Technology</a>
  	          <div class="dropdown-divider"></div>
  	          <a class="dropdown-item" href="#">Something else here</a>
  	        </div>
  	      </li>
  	    </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo base_url('signout'); ?>">
          <span class="navbar-text">
            <?php echo $this->session->userdata('email'); ?>
          </span>
          <button class="btn btn-sm btn-outline-dark my-2 my-sm-0" type="submit">Logout</button>
        </form>
  	  </div>
  	</nav>