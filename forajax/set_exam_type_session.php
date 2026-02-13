<?php
session_start();
include "../connection.php";
$exam_category=$_GET["exam_category"];
$_SESSION["exam_category"]=$exam_category;

$res=mysqli_query($link,"select * from exam_category where category='$exam_category'");
while($row=mysqli_fetch_array($res))
{
    $_SESSION["exam_time"]=$row["time"];
}
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";

$username = $_SESSION["username"];
mysqli_query($link, "INSERT INTO quiz_attempts (id, username, exam_type, attempt_time, status) VALUES (NULL, '$username', '$exam_category', NOW(), 'started')");
$_SESSION["attempt_id"] = mysqli_insert_id($link);
?>