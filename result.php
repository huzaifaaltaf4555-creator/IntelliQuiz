<?php
include "connection.php";

session_start();
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+ $_SESSION[exam_time] minutes"));
include "header.php";
?>

<div class="row">
    <div class="col-lg-6 col-lg-push-3">
        <?php
        $correct = 0;
        $wrong = 0;
        $answeredQuestions = 0; // Track the number of questions answered by the user

        if (isset($_SESSION["answer"])) {
            $res = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'");

            while ($row = mysqli_fetch_array($res)) {
                $questionNo = $row["question_no"];
                $answer = $row["answer"];

                if (isset($_SESSION["answer"][$questionNo])) {
                    $answeredQuestions++;

                    $userAnswer = empty($_SESSION["answer"][$questionNo]) ? "incorrect" : $_SESSION["answer"][$questionNo];
                    if ($answer == $userAnswer) {
                        $correct++;
                    } else {
                        $wrong++;
                    }
                } else {
                    $wrong++;
                }
            }

            $count = mysqli_num_rows($res);

            echo "<br>";
            echo "<br>";
            echo "<center>";
            echo "Total Questions=" . $count;
            echo "<br>";
            echo "Correct Answer=" . $correct;
            echo "<br>";
            echo "Wrong Answer=" . $wrong;
            echo "<center>";
        }
        ?>
    </div>
</div>

<?php
if (isset($_SESSION["exam_start"])) {
    $date = date("Y-m-d");
    // Note: wrong_answer is auto-calculated by database trigger
    mysqli_query($link, "insert into exam_results (id, username, exam_type, total_question, correct_answer, exam_time, attempted) values (NULL, '$_SESSION[username]', '$_SESSION[exam_category]', '$count', '$correct', '$date', 1)");

    if (isset($_SESSION["attempt_id"])) {
        mysqli_query($link, "UPDATE quiz_attempts SET status = 'completed' WHERE id = '$_SESSION[attempt_id]'");
        unset($_SESSION["attempt_id"]);
    }

    unset($_SESSION["exam_start"]);
    ?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
    <?php
}
?>
<?php
include "footer.php";
?>
