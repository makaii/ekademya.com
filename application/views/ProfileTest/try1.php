<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<title>Profile</title>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
     <a class="navbar-brand" href="#">Logo</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container mt-5" style="margin-bottom: 8rem;">
	<div class="row">
		<div class="col">
			<h3>Profile</h3>
		</div>
		<div class="col-4">
			<div class="card">
					<div class="card-header bg-secondary text-white text-center">
						Sign in to your Ekademya Account!
					</div>
					<div class="card-body bg-light">
						 <form action="/action_page.php">
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd">
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember me
                  </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form> 
					</div>
					<div class="card-footer text-center">
						<small>Need an account? <strong><a href="#">Create one here</a></strong></small>
					</div>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>
</body>
</html>