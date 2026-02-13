<?php
session_start();
include "connection.php";
include "header1.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login - IntelliQuiz</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link href="style1.css" rel="stylesheet">

  <style>
    body {
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .login-container {
        width: 400px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .login-heading {
        text-align: center;
        color: #ff8c00;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .login-form {
        margin-top: 20px;
    }

    .login-btn {
        background-color: #ff8c00;
        color: #fff;
    }

    .login-btn:hover {
        background-color: #e07b00;
    }
</style>

</head>

<body>

  <div class="login-container">
    <h2 class="login-heading">Login to IntelliQuiz</h2>
    <form action="" name="form1" method="post" class="login-form">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" placeholder="Enter your username" title="Please enter your username" required="" value="" name="username" id="username" class="form-control">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" title="Please enter your password" placeholder="**********" required="" value="" name="password" id="password" class="form-control">
      </div>
      <button type="submit" name="login" class="btn btn-primary login-btn">Login</button>
      <a class="btn btn-secondary" href="register.php">Register</a>

      <div style="display: none;" class="alert alert-danger mt-3" id="failure">
        <strong>Invalid Credentials!</strong> Please check your username and password.
      </div>
    </form>
    <div class="text-center mt-3">
      <a href="index.php" style="color: #ff8c00; text-decoration: none; font-size: 16px;">
        <i class="bi bi-arrow-left"></i> Back to Home
      </a>
    </div>
  </div>

  <?php
  if (isset($_POST["login"])) {
      $count = 0;
      $result = mysqli_query($link, "SELECT * FROM registration WHERE username = '$_POST[username]' AND password='$_POST[password]'");
  
      $count = mysqli_num_rows($result);
  
      if ($count == 0) {
          echo "<script type=\"text/javascript\"> document.getElementById('failure').style.display = 'block'; </script>";
      } else {
          $_SESSION["username"]= $_POST["username"];
          echo "<script type=\"text/javascript\"> window.location = 'student_landing.php'; </script>";
      }
  }
  ?>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
