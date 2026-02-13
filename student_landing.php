<?php
session_start();
if (!isset($_SESSION["username"])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}

include "connection.php";

$username = $_SESSION["username"];
$query1 = "SELECT id, firstname, lastname, contact, email FROM registration WHERE username = '$username'";
$result1 = mysqli_query($link, $query1);
$query = "SELECT AVG(correct_answer) as avg_correct, AVG(wrong_answer) as avg_wrong FROM exam_results WHERE username = '$username'";
$result = mysqli_query($link, $query);

if ($result1 && mysqli_num_rows($result1) > 0) {
    $row = mysqli_fetch_assoc($result1);
    $id = $row["id"];
    $firstName = $row["firstname"];
    $lastName = $row["lastname"];
    $contact = $row["contact"];
    $email = $row["email"];
} else {
    die("Error fetching user information: " . mysqli_error($link));
}

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $avgCorrect = $row["avg_correct"];
    $avgWrong = $row["avg_wrong"];
} else {
    die("Error fetching user results: " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <?php include "header.php"; ?>

    <div class="content">
        <div class="welcome-container">
            <div class="personal-info-box" style="border: 2px solid #ff8c00; padding: 20px; border-radius: 8px;text-align: center;">
                <h2 style="font-size: 24px; margin-bottom: 15px; color: #ff8c00;">Personal Information</h2>
                <hr style="border-top: 2px solid #ff8c00; margin-top: -10px; margin-bottom: 15px;">
                <div style="font-size: 18px; margin-top: -10px;text-align: center;">
                    <p><strong>First Name:</strong> <?php echo $firstName; ?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Last Name:</strong> <?php echo $lastName; ?></p>
                    <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Contact:</strong> <?php echo $contact; ?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Student ID:</strong> <?php echo $id; ?></p>
                </div>
            </div>
        </div>
    </div>

<div class="content">
        <div class="welcome-container">
            <h2>Average Performance</h2>
            <p>Average Correct Answers: <?php echo $avgCorrect; ?></p>
            <p>Average Wrong Answers: <?php echo $avgWrong; ?></p>

            <canvas id="performanceChart"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('performanceChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Average Correct Answers', 'Average Wrong Answers'],
                datasets: [{
                    label: 'Performance',
                    data: [<?php echo $avgCorrect; ?>, <?php echo $avgWrong; ?>],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>
