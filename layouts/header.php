<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dobble Social Network</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
  </head>

  <body>

  <header>
    <div class="container">
      <img src="img/logo.png" class="logo" alt="">
      
      <?php if(!isset($_SESSION['user'])): ?>
        <form class="form-inline">
          <div class="form-group">
            <label class="sr-only" for="signin_email">Email address</label>
            <input type="email" class="form-control" id="signin_email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label class="sr-only" for="signin_pwd">Password</label>
            <input type="password" class="form-control" id="signin_pwd" placeholder="Password">
          </div>
          <button type="submit" id="signin_submit" class="btn btn-default">Sign in</button><br>
          <!-- <div class="checkbox">
            <label>
              <input type="checkbox"> Remember me
            </label>
          </div> -->
        </form>
      <?php endif; ?>

    </div>
  </header>

  <?php if(isset($_SESSION['user'])): ?>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="members.html">Members</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="groups.html">Groups</a></li>
            <li><a href="photos.html">Photos</a></li>
            <li><a href="profile.html">Profile</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <?php endif; ?>