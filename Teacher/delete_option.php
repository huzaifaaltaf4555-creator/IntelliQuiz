<?php
session_start();
include "connection.php";
if (!isset($_SESSION["admin"])) {
    ?>
    <script>
        window.location= "index.php";
    </script>
    <?php
}
$id = $_GET["id"];
$id1 = $_GET["id1"];
mysqli_query($link, "DELETE FROM questions WHERE id=$id");
?>
<script type="text/javascript">
    window.location.href = "add_edit_questions.php?id=<?php echo $id1; ?>";
</script>
