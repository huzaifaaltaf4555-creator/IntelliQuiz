<?php
session_start();
include "header.php";
include "connection.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Quiz Closed</h2>
                <p>Time Limit for closing tabs exceeded.<br> 0 Marks have been awarded in liu of disqualification</p>
            </div>
        </div>

    </div>
</div>

<?php
$res = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'");
$count = mysqli_num_rows($res);
$date = date("Y-m-d");
mysqli_query($link, "insert into exam_results (id, username, exam_type, total_question, correct_answer, exam_time, attempted) values (NULL, '$_SESSION[username]', '$_SESSION[exam_category]', '$count', '0', '$date', 1)");

if (isset($_SESSION["attempt_id"])) {
    mysqli_query($link, "UPDATE quiz_attempts SET status = 'disqualified' WHERE id = '$_SESSION[attempt_id]'");
    unset($_SESSION["attempt_id"]);
}
?>

<?php
include "footer.php";
?>