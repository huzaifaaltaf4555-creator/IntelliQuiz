<?php
include "connection.php";
include "header1.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Register Now - IntelliQuiz</title>
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
    }

    .register-container {
      max-width: 400px;
      margin: auto;
      margin-top: 50px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .register-heading {
      text-align: center;
      color: #ff8c00;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .register-form {
      margin-top: 20px;
    }

    .register-btn {
      background-color: #ff8c00;
      color: #fff;
    }

    .register-btn:hover {
      background-color: #e07b00;
    }
  </style>
</head>

<body>

  <div class="register-container">
    <h2 class="register-heading">Register Now with IntelliQuiz</h2>
    <form action="" name="form1" method="post" class="register-form" onsubmit="return validateForm()">
      <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" name="firstname" placeholder="Enter your first name" class="form-control">
      </div>
      <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" name="lastname" placeholder="Enter your last name" class="form-control">
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" placeholder="Choose a username" class="form-control" autocomplete="new-username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" placeholder="Choose a password" class="form-control" autocomplete="new-password">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" placeholder="Enter your email" class="form-control">
      </div>
      <div class="mb-3">
        <label for="contact" class="form-label">Contact</label>
        <input type="text" name="contact" placeholder="Enter your contact number" class="form-control">
      </div>
      <button type="submit" name="submit1" class="btn btn-primary register-btn">Register</button>

      <div class="alert alert-success mt-3" id="success" style="display: none;">
        <strong>Success!</strong> Account registration successful.
      </div>

      <div class="alert alert-danger mt-3" id="failure" style="display: none;">
        <strong>Already Exists!</strong> This username already exists. Please choose another one.
      </div>
    </form>
    <div class="text-center mt-3">
      <a href="index.php" style="color: #ff8c00; text-decoration: none; font-size: 16px;">
        <i class="bi bi-arrow-left"></i> Back to Home
      </a>
    </div>
  </div>

  <?php
  if (isset($_POST["submit1"])) {
    $count = 0;
    $result = mysqli_query($link, "SELECT * FROM registration WHERE username = '$_POST[username]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count > 0) {
  ?>
      <script type="text/javascript">
        document.getElementById("success").style.display = "none";
        document.getElementById("failure").style.display = "block";
      </script>
  <?php
    } else {
      mysqli_query($link, "INSERT INTO registration VALUES (NULL, '$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]')") or die(mysqli_error($link));
  ?>
      <script type="text/javascript">
        document.getElementById("success").style.display = "block";
        document.getElementById("failure").style.display = "none";
        setTimeout(function() {
          window.location.href = 'login.php';
        }, 1000);
      </script>
  <?php
    }
  }
  ?>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    function validateForm() {
      var username = document.forms["form1"]["username"].value;
      var password = document.forms["form1"]["password"].value;

      if (username == "" || password == "") {
        alert("Username and password must be filled out");
        return false;
      }

      return true;
    }
  </script>

</body>

</html>