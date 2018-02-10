<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container mt-5">    
  <div class="row">
    <div class="col-sm-2 well">
      <div class="well text-center" >
        <img src="image/boyProf.jpg" class="img-circle" height="65" width="65" alt="Avatar">
          <p><a href="profile.php">Name of the Instructor</a></p>
      </div>
      <div class="well text-center">
        <p><strong>Instructor Profile</strong></p>
        <p>Titles / Achievements of the Instructor</p>
      </div> 
      <div class="list-groups">
      <a href="#" class="list-group-item list-group-item-action">View Public Profile</a>
      <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>
      <a href="photo.php" class="list-group-item list-group-item-action">Photo</a>
      <a href="account.php" class="list-group-item list-group-item-action ">Account</a>
      <a href="credit.php" class="list-group-item list-group-item-action ">Credit Cards</a>
      <a href="privacy.php" class="list-group-item list-group-item-action ">Privacy</a>
      <a href="notif.php" class="list-group-item list-group-item-action ">Notifications</a>
      <a href="api.php" class="list-group-item list-group-item-action active">API Clients</a>
      <a href="danger.php" class="list-group-item list-group-item-action">Danger Zone</a>
    </div>
  </div>
    <div class="col-sm-6 well text-center" >
          <p><strong>API Client</strong></p>
          <p>Create and List of API Clients</p>
      <div class="well">
         <button type="submit" class="btn btn-primary">Request API Client</button>
      </div>
    </div>
  </div>

</body>
</html>
