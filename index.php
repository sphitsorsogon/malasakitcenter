<?php
//start session
session_start();

//database connection
include_once('./connection.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Malasakit Center</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
<link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
  </head>
  <body>
  <div class="container"style="margin-top:20vh; height:40vh; width:30vw">
  <div class="text-center">
    <?php
    if (isset($_SESSION['message'])) {
    ?>
      <div class="alert alert-info text-center">
          <?php echo $_SESSION['message']; ?>
      </div>
    <?php
    unset($_SESSION['message']);
    }
    ?>
  <!-- <h1 class="h4 text-gray-900 mb-5">Welcome Back!</h1> -->
  </div>
  <form action="./login.php" method="POST" class="form-signin">
  <div class="text-center mb-4">
    <img class="mb-4" src="./assets/image/malasakitcenter.png" alt="" width="200" height="200">
  </div>

  <div class="form-label-group mb-2">
    <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
  </div>

  <div class="form-label-group mb-3">
    <input type="password" class="form-control" placeholder="Password" name="password" required>
  </div>

  <button class="btn btn-lg btn-primary btn-block" name="btnLogin" type="submit">Sign in</button>

</form>
<p class="mt-5 mb-3 text-muted text-center">&copy; <a href="https://www.facebook.com/kennethlimsolomon/">Kenneth Solomon</a></p>

  </div>
    
</body>
</html>
