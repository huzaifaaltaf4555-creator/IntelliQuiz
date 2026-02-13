<?php
include "connection.php";
//include "header1.php";
session_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style>
        body {
            background-color: #292b2c;
        }

        .sufee-login .login-content {
            max-width: 600px;
            margin: auto;
            margin-top: 50vh;
            transform: translateY(-50%);
        }

        .login-logo {
            font-size: 36px;
            margin-bottom: 20px;
            color: #ff8c00; 
        }

        .login-form .form-group {
            margin-bottom: 25px;
        }

        .login-form input {
            font-size: 18px;
        }

        .login-form .btn {
            font-size: 18px;
            background-color: #ff8c00; 
            color: #fff;
        }

        .login-form .btn:hover {
            background-color: #e07b00; 
        }

        .alert-danger {
            background-color: #d9534f;
            border-color: #d43f3a;
            color: #fff;
        }
    </style>
</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    Teacher's Login
                </div>
                <div class="login-form">
                    <form action="" name="form1" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="alert alert-danger" id="errormsg" style="margin-top: 10px;  display: none;">
                            <strong>Invalid!</strong> Username or Password.
                        </div>
                    </form>
                    <div class="text-center" style="margin-top: 20px;">
                        <a href="../index.php" style="color: #ff8c00; text-decoration: none; font-size: 16px;">
                            <i class="fa fa-arrow-left"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
if (isset($_POST["submit1"])) {
    $count = 0;
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);
    
    $res = mysqli_query($link, "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'");
    $count = mysqli_num_rows($res);
    
    if ($count == 0) {
        ?>
    <script type="text/javascript">
    document.getElementById("errormsg").style.display = "block";
    </script>
    <?php
    } else {
        $_SESSION["admin"]=$username;
        ?>
    <script type="text/javascript">
        window.location = "exam_category.php";
    </script>
    <?php
    }
}
?>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
