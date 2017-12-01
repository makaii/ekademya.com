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
          <li>
            <button class="btn btn-outline-primary">Become an Instructor</button>
            <a href="#username"><button class="btn btn-outline-secondary">Signin</button></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search for Course" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="jumbotron">
      <div class="container">
        <div class="display-4">Ekademya</div>
        <p>Learn new things everyday, anywhere, anytime</p>
        <div>
          <button class="btn btn-primary">FAQ</button>
          <button class="btn btn-info">Why Ekademya?</button>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="card">
            <?php echo form_open(base_url('signin')); ?>
              <div class="card-header bg-secondary text-white">
                <h6>Sign in to your Ekademya Account!</h6>
              </div>
              <div class="card-body bg-light">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control form-control-sm" type="text" placeholder="abc@domain.com" name="email" value="<?php echo set_value('email'); ?>"></input>
                  <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control form-control-sm" type="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" name="password" value="<?php echo set_value('password'); ?>"></input>
                  <?php echo form_error('password'); ?>
                </div>
                <!-- <div class="form-check">
                  <label class="form-check-label text-muted">
                  <input type="checkbox" class="form-check-input"><small>remember me</small></label>
                </div> -->
                <button class="btn btn-outline-primary btn-block" type="submit">Signin</button>
                <button class="btn btn-link btn-block" type="reset">or Forgot Password</button>
              </div>
              <div class="card-footer text-center">
                <small>Need an account? <strong><a href="<?php echo base_url('signup'); ?>">Create one here</a></strong></small>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
        <div class="col-4">
        </div>
        <div class="col-4">
        </div>
      </div>
    </div>

    <footer class="bg-info text-light text-center">
      <div class="container-fluid">
        QWERTeam&#8482
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>