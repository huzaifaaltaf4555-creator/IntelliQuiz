<?php
session_start();
include "header.php";

// agar login nhi hai tou bahir bhejdou
if (!isset($_SESSION["username"])){
    ?>

<script>
window.location = "login.php";
</script>

<?php
}

?>

<head>
    
    <script>
    var warningTimer;

    function startWarningTimer() {
        var warningTimeLimit = 10000;
        alert(
            "Warning: You have 10 seconds to close all tabs excluding the quiz. Failure to do so will result in disqualification");
        warningTimer = setTimeout(function() {
            window.location.href = './quiz_closed.php';
        }, warningTimeLimit);
    }

    function stopWarningTimer() {
        clearTimeout(warningTimer);
    }

    document.addEventListener("visibilitychange", function() {
        if (document.visibilityState === "hidden") {
            startWarningTimer();
        } else {
            stopWarningTimer();
        }
    });
    </script>
</head>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

        <br>
        <div class="row">

            <br>
            <div class="col-lg-2 col-lg-push-10">
                <div id="current_que" style="float:left">0</div>
                <div style="float:left">/</div>
                <div id="total_que" style="float:left">0</div>
            </div>

            <div class="row" style="margin-top: 30px;">

                <div class="row">
                    <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color:white;"
                        id="load_questions">

                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 10px">
                <div class="col-lg-6 col-lg-push-3" style="min-height: 50px;">
                    <div class="col-lg-12 text-center">
                        <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
                        <input type="button" class="btn btn-success" value="Next" onclick="load_next();">

                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 10px">
                <div class="col-lg-6 col-lg-push-3" style="min-height: 50px;">
                    <div class="col-lg-12 text-center">
                        <input type="button" class="btn btn-warning" value="Submit Quiz" onclick="submitQuiz();">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include "footer.php";
?>

<script>
    var totalQuestions = 0;

    function submitQuiz() {
        var confirmSubmit = confirm("Are you sure you want to submit the quiz?");
        if (confirmSubmit) {
            window.location.href = 'result.php';
        }
    }

function load_total_que() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            totalQuestions = parseInt(xmlhttp.responseText.trim());
            document.getElementById("total_que").innerHTML = totalQuestions;
        }
    };
    xmlhttp.open("GET", "forajax/load_total_que.php", true);
    xmlhttp.send(null);
}

var questionno = "1";
load_questions(questionno);

function load_questions(questionno) {
    document.getElementById("current_que").innerHTML = questionno;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText.trim() === "over") {
                window.location = "result.php";
            } else {
                document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                load_total_que();
            }
        }
    };
    xmlhttp.open("GET", "forajax/load_questions.php?questionno=" + questionno, true);
    xmlhttp.send(null);
}

function radioclick(radiovalue, questiono) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        }
    };
    xmlhttp.open("GET", "forajax/save_answer_in_session.php?questionno=" + questionno + "&value1=" + radiovalue, true);
    xmlhttp.send(null);
}

function load_previous() {
    if (questionno == '1') {
        load_questions(questionno);
    } else {
        questionno = eval(questionno) - 1;
        load_questions(questionno);
    }
}

function load_next() {
        if (parseInt(questionno) < totalQuestions) {
            questionno = eval(questionno) + 1;
            load_questions(questionno);
        } else {
            submitQuiz();
        }
    }
</script>