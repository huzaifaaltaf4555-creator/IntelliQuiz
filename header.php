<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Quiz System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">

    <style>

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            color: #ff8c00;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 18px;
            color: #ff8c00;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #fff;
            background-color: #6c757d;
        }

        .content {
            margin-left: 270px;
            padding: 16px;
        }

        .header {
            background-color: #343a40;
            padding: 10px;
            color: #ff8c00;
            text-align: right;
        }

        .profile-img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #343a40;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: #ff8c00; 
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #6c757d;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="dropdown">
            <img src="img/avatar-mini2.jpg" alt="Profile" class="profile-img">
            <div class="dropdown-content">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <a href="student_landing.php">Home</a>
        <a href="select_exam.php">Select Exam</a>
        <a href="old_exam_results.php">Last Results</a>
    </div>

    <div class="content">
        <div id="countdowntimer" style="display: block;"></div>
    </div>

    <script type="text/javascript">
        setInterval(function () {
            timer();
        }, 1000);

        function timer() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    if (xmlhttp.responseText == "00:00:01") {
                        window.location = "result.php";
                    }

                    document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;

                }
            };
            xmlhttp.open("GET", "forajax/load_timer.php", true);
            xmlhttp.send(null);
        }
    </script>

</body>

</html>
