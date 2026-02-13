<?php
session_start();
include "../connection.php";

$total_que = 0;

if (isset($_SESSION['exam_category'])) {
    $exam_category = $_SESSION['exam_category'];
    $resl = mysqli_query($link, "SELECT * FROM questions WHERE category = '$exam_category'");
    $total_que = mysqli_num_rows($resl);
}

echo $total_que;
?>
