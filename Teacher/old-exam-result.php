<?php
session_start();
include "connection.php";
include "header.php";

if (!isset($_SESSION["admin"])) {
    ?>
    <script>
        window.location= "index.php";
    </script>
    <?php
}

$teacher_username = $_SESSION["admin"];

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h1>All Exam Results</h1>
                        </center>
                        <?php
                        $count = 0;
                        $query = "SELECT ER.*, EC.category
                                  FROM exam_results ER
                                  INNER JOIN exam_category EC ON ER.exam_type = EC.category
                                  WHERE EC.username = '$teacher_username'
                                  ORDER BY ER.id DESC";

                        $result = mysqli_query($link, $query);
                        $count = mysqli_num_rows($result);

                        if ($count == 0) {
                        ?>
                            <center>
                                <h1>No results</h1>
                            </center>
                        <?php
                        } else {
                            echo "<table class='table table-bordered' >";
                            echo "<tr style='background-color: #004df0; color:white' >";
                            echo "<th>";
                            echo "username";
                            echo "</th>";
                            echo "<th>";
                            echo "exam type";
                            echo "</th>";
                            echo "<th>";
                            echo "total questions";
                            echo "</th>";
                            echo "<th>";
                            echo "correct answer";
                            echo "</th>";
                            echo "<th>";
                            echo "wrong answer";
                            echo "</th>";
                            echo "<th>";
                            echo "exam time";
                            echo "</th>";
                            echo "</tr>";

                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>";
                                echo $row["username"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["category"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["total_question"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["correct_answer"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["wrong_answer"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["exam_time"];
                                echo "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
