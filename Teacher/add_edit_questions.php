<?php
session_start();
include "header.php";
include "connection.php";
if (!isset($_SESSION["admin"])) {
    ?>
    <script>
        window.location= "index.php";
    </script>
    <?php
}

$id = $_GET["id"];
$exam_category = '';
$res = mysqli_query($link, "SELECT * FROM exam_category WHERE id=$id");

while ($row = mysqli_fetch_array($res)) {
    $exam_category = $row["category"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Question inside <?php echo "<font color='red'>" . $exam_category . "</font>"; ?></h1>
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

                        <div class="col-lg-6">
                            <form action="" name="form1" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Add New Questions With Text</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class="form-control-label">Add Question

                                            </label>
                                            <input type="text" name="question" placeholder="Add Question" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class="form-control-label">Add Option 1

                                            </label>
                                            <input type="text" name="opt1" placeholder="Add Option 1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class="form-control-label">Add Option 2

                                            </label>
                                            <input type="text" name="opt2" placeholder="Add Option 2" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class="form-control-label">Add Option 3

                                            </label>
                                            <input type="text" name="opt3" placeholder="Add Option 3" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class="form-control-label">Add Option 4

                                            </label>
                                            <input type="text" name="opt4" placeholder="Add Option 4" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class="form-control-label">Add Answer

                                            </label>
                                            <input type="text" name="answer" placeholder="Add Answer" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit111" class="btn btn-success" value="Add Question">
                                        </div>
                                    </div>
                                </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="card">
                                <div class="card-header"><strong>Add New Questions With Images</strong></div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Add Question

                                        </label>
                                        <input type="text" name="fquestion" placeholder="Add Question" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Add Option 1

                                        </label>
                                        <input type="file" name="fopt1" class="form-control" style="padding-bottom: 45px">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Add Option 2

                                        </label>
                                        <input type="file" name="fopt2" class="form-control" style="padding-bottom: 45px">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Add Option 3

                                        </label>
                                        <input type="file" name="fopt3" class="form-control" style="padding-bottom: 45px">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Add Option 4

                                        </label>
                                        <input type="file" name="fopt4" class="form-control" style="padding-bottom: 45px">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Add Answer

                                        </label>
                                        <input type="file" name="fanswer" class="form-control" style="padding-bottom: 45px">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit1111" class="btn btn-success" value="Add Question">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Questions</th>
                            <th>Opt1</th>
                            <th>Opt2</th>
                            <th>Opt3</th>
                            <th>Opt4</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                        $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$exam_category' ORDER BY question_no ASC");
                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>";
                            echo $row["question_no"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["question"];
                            echo "</td>";

                            // For opt1
                            echo "<td>";
                            if (strpos($row["opt1"], "opt_images/") !== false) {
                        ?>
                                <img src="<?php echo $row["opt1"]; ?>" height="50" width="50"> <?php
                                                                                            } else {
                                                                                                echo $row["opt1"];
                                                                                            }
                                                                                            echo "</td>";

                                                                                            // For opt2
                                                                                            echo "<td>";
                                                                                            if (strpos($row["opt2"], "opt_images/") !== false) {
                                                                                                ?>
                                <img src="<?php echo $row["opt2"]; ?>" height="50" width="50"> <?php
                                                                                            } else {
                                                                                                echo $row["opt2"];
                                                                                            }
                                                                                            echo "</td>";

                                                                                            // For opt3
                                                                                            echo "<td>";
                                                                                            if (strpos($row["opt3"], "opt_images/") !== false) {
                                                                                                ?>
                                <img src="<?php echo $row["opt3"]; ?>" height="50" width="50"> <?php
                                                                                            } else {
                                                                                                echo $row["opt3"];
                                                                                            }
                                                                                            echo "</td>";

                                                                                            // For opt4
                                                                                            echo "<td>";
                                                                                            if (strpos($row["opt4"], "opt_images/") !== false) {
                                                                                                ?>
                                <img src="<?php echo $row["opt4"]; ?>" height="50" width="50"> <?php
                                                                                            } else {
                                                                                                echo $row["opt4"];
                                                                                            }
                                                                                            echo "</td>";
                                                                                            echo "<td>";
                                                                                            if (strpos($row["opt4"], "opt_images/") !== false) {
                                                                                                ?>
                                <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a> <?php
                                                                                                                            } else {
                                                                                                                                ?>
                                <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a> <?php
                                                                                                                            }
                                                                                                                            echo "</td>";
                                                                                                                            echo "<td>";
                                                                                                                        ?>
                            <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Delete</a>
                        <?php
                            echo "</td>";

                            echo "</tr>";

                            echo "</tr>";

                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php
if (isset($_POST["submit111"])) {
    $res = mysqli_query($link, "SELECT MAX(question_no) AS max_question_no FROM questions WHERE category='$exam_category'");
    $row = mysqli_fetch_assoc($res);
    $loop = ($row['max_question_no'] === null) ? 1 : $row['max_question_no'] + 1;

    mysqli_query($link, "INSERT INTO questions VALUES (NULL, '$loop', '$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$exam_category')") or die(mysqli_error($link));
?>
    <script type="text/javascript">
        // alert("Exam added successfully");
        window.location.href = window.location.href;
    </script>
<?php
}

?>

<?php
if (isset($_POST["submit1111"])) {
    $res = mysqli_query($link, "SELECT MAX(question_no) AS max_question_no FROM questions WHERE category='$exam_category'");
    $row = mysqli_fetch_assoc($res);
    $loop = ($row['max_question_no'] === null) ? 1 : $row['max_question_no'] + 1;

    $tm1 = md5(time());
    $fnm1 = $_FILES["fopt1"]["name"];
    $dst1 = "./opt_images/" . $tm . $fnm1;
    $dst_db1 = "opt_images/" . $tm . $fnm1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

    $fnm2 = $_FILES["fopt2"]["name"];
    $dst2 = "./opt_images/" . $tm . $fnm2;
    $dst_db2 = "opt_images/" . $tm . $fnm2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

    $fnm3 = $_FILES["fopt3"]["name"];
    $dst3 = "./opt_images/" . $tm . $fnm3;
    $dst_db3 = "opt_images/" . $tm . $fnm3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

    $fnm4 = $_FILES["fopt4"]["name"];
    $dst4 = "./opt_images/" . $tm . $fnm4;
    $dst_db4 = "opt_images/" . $tm . $fnm4;
    move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);

    $fnm5 = $_FILES["fanswer"]["name"];
    $dst5 = "./opt_images/" . $tm . $fnm5;
    $dst_db5 = "opt_images/" . $tm . $fnm5;
    move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);

    mysqli_query($link, "INSERT INTO questions VALUES (NULL, '$loop', '$_POST[fquestion]', '$dst_db1', '$dst_db2', '$dst_db3', '$dst_db4', '$dst_db5', '$exam_category')") or die(mysqli_error($link));
?>
    <script type="text/javascript">
        // alert("Exam added successfully");
        window.location.href = window.location.href;
    </script>
<?php
}
?>

<?php
include "footer.php";
?>