<?php
session_start();
include "connection.php";

if (!isset($_SESSION["admin"])) {
    ?>
    <script>
        window.location = "index.php";
    </script>
    <?php
}

$Sid = $_GET["id"];

$res = mysqli_query($link, "SELECT category FROM exam_category WHERE id = '$Sid'");
$row = mysqli_fetch_array($res);
$category = $row['category'];

mysqli_query($link, "DELETE FROM exam_category WHERE id = '$Sid'");

mysqli_query($link, "DELETE FROM questions WHERE category = '$category'");

mysqli_query($link, "DELETE FROM exam_results WHERE exam_type = '$category'");
?>

<script type="text/javascript">
    window.location = "exam_category.php";
</script>
