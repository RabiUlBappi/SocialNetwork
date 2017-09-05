<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dobble Social Network</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= RESOURCE_PATH.DS.'css/bootstrap.css' ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= RESOURCE_PATH.DS.'css/style.css' ?>" rel="stylesheet">
    <link href="<?= RESOURCE_PATH.DS.'css/font-awesome.css' ?>" rel="stylesheet">
  </head>

  <body>

  <header>
    <div class="container">
      <img src="<?= RESOURCE_PATH.DS.'img/logo.png' ?>" class="logo" alt="">

      <?php

        if(!isset($_SESSION['user_id'])) {
          include_layout_template("signin_form.php"); 
        }
        else{
          echo '
              <form class="form-inline">
                <button type="button" id="signout_submit" class="btn btn-default">Signout</button><br>
              </form>
          ';
        }

      ?>

    </div>
  </header>