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
include "header.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <h3 style="text-align: center; margin-top: 20px;">Available Exams</h3>
        <?php
        $res = mysqli_query($link, "SELECT * FROM exam_category");
        while ($row = mysqli_fetch_array($res)) {
            $examCategory = $row["category"];

            $username = $_SESSION["username"];
            $result = mysqli_query($link, "SELECT * FROM exam_results WHERE username = '$username' AND exam_type = '$examCategory'");
            $attempted = mysqli_fetch_assoc($result);

            $attemptCount = mysqli_query($link, "SELECT COUNT(*) as count FROM quiz_attempts WHERE username = '$username' AND exam_type = '$examCategory'");
            $attemptRow = mysqli_fetch_assoc($attemptCount);
            $totalAttempts = $attemptRow['count'];

            if (!$attempted) {
                ?>
                <input type="button" class="btn btn-success form-control" value="<?php echo $examCategory . ($totalAttempts > 0 ? ' (Attempts: ' . $totalAttempts . ')' : ''); ?>"
                       style="margin-top: 10px; background-color: blue; color: white"
                       onclick="set_exam_type_session('<?php echo $examCategory; ?>');">
                <?php
            }
        }
        ?>

        <h3 style="text-align: center; margin-top: 30px;">My Quiz Attempt History</h3>
        <div style="margin-top: 20px;">
            <?php
            $username = $_SESSION["username"];
            $attemptHistory = mysqli_query($link, "SELECT qa.exam_type, qa.attempt_time, qa.status, COUNT(*) as attempt_count 
                                                    FROM quiz_attempts qa 
                                                    WHERE qa.username = '$username' 
                                                    GROUP BY qa.exam_type 
                                                    ORDER BY MAX(qa.attempt_time) DESC");
            
            if (mysqli_num_rows($attemptHistory) > 0) {
                echo '<table class="table table-bordered">';
                echo '<thead><tr><th>Exam</th><th>Total Attempts</th><th>Last Attempt</th></tr></thead>';
                echo '<tbody>';
                
                while ($historyRow = mysqli_fetch_array($attemptHistory)) {
                    // Get the last attempt details
                    $lastAttempt = mysqli_query($link, "SELECT attempt_time, status FROM quiz_attempts 
                                                         WHERE username = '$username' AND exam_type = '$historyRow[exam_type]' 
                                                         ORDER BY attempt_time DESC LIMIT 1");
                    $lastAttemptData = mysqli_fetch_assoc($lastAttempt);
                    
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($historyRow['exam_type']) . '</td>';
                    echo '<td>' . $historyRow['attempt_count'] . '</td>';
                    echo '<td>' . date('M d, Y h:i A', strtotime($lastAttemptData['attempt_time'])) . '</td>';
                    echo '</tr>';
                }
                
                echo '</tbody></table>';
            } else {
                echo '<p style="text-align: center; color: gray;">No quiz attempts yet.</p>';
            }
            ?>
        </div>

    </div>
</div>

<?php
include "footer.php";
?>

<script type="text/javascript">
    function set_exam_type_session(exam_category) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category=" + exam_category, true);
        xmlhttp.send(null);
    }
</script>