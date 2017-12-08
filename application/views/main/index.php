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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom-style.css'); ?>">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
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
            <a href="<?php echo base_url('signin'); ?>"><button class="btn btn-outline-secondary">Signin</button></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Explore Courses" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="jumbotron jumbotron-header" style="padding: 8em;">
      <div class="container text-center">
        <div class="display-4">Classes by expert practitioners</div>
        <p class="lead" style="margin-top: 1rem;">Learn new things anywhere, anytime</p>
        <div>
          <a href="<?php echo base_url('signup'); ?>"><button class="btn btn-info">Get Started for Free</button></a>
        </div>
      </div>
    </div>

    <div class="jumbotron bg-white" style="">
      <div class="container">
        <h4 class="text-center">Access our Classes</h4>
      </div>
    </div>

    <div class="jumbotron">
      <div class="container text-center">
        <p class="display-4">Why Ekademya?</p>
        <hr>
        <div class="card-deck">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Lorem</h4>
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut metus eu ligula commodo semper. Integer id leo sollicitudin, ullamcorper.
              </p>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Lorem</h4>
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dignissim fermentum nunc vitae tristique. In ac magna hendrerit.
              </p>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Lorem</h4>
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse volutpat finibus accumsan. Aliquam erat volutpat.
              </p>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col">
            <h6>Lorem</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut metus eu ligula commodo semper. Integer id leo sollicitudin, ullamcorper.</p>
          </div>
          <div class="col">
            <h6>Lorem</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dignissim fermentum nunc vitae tristique. In ac magna hendrerit.</p>
          </div>
          <div class="col">
            <h6>Lorem</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse volutpat finibus accumsan. Aliquam erat volutpat.</p>
          </div>
        </div> -->
      </div>
    </div>

    <div class="jumbotron" style="padding: 10em;">
      <div class="container text-center">
        <h4>Teach on Ekademya</h4>
        <p class="lead">Earn money. Share your expertise. Build your personal brand.</p>
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