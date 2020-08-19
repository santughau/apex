<?php 
$page_title = "";
$page_key = "";
$page_desc = "";
$page_desc = "";
require_once('inc/top.php') ?>
<?php session_start();
$mobile = $_SESSION['user_email'];
$user_id = $_SESSION['user_id'];

/* Start Session */

/* Check User Session Session */
$exam_id = $_SESSION['exam_id'];
/* Check User Id */
/* Cerate Exam id */
$query_t = "SELECT * FROM questions WHERE exam_id = '$exam_id'";
$result_t = mysqli_query($con,$query_t);
$total = mysqli_num_rows($result_t);
/* Create Total Questions */
$marks = $_SESSION['score'];
$percent = 100*$marks /$total;
/* Create Exam Name */
$query_exam = "SELECT * FROM exam WHERE exam_id = '$exam_id'";
$result_exam = mysqli_query($con,$query_exam);
$row_exam = mysqli_fetch_array($result_exam);
$exam_name = $row_exam['exam_name'];
$_SESSION['user_email'] = $mobile;
$_SESSION['user_id'] = $user_id;
?>
<div class="container">
    <div class="row">
        
            <div class="col-md-6 frame" style="padding-bottom:10px;">
             <h2 class="text-success well text-center">You are done!</h2><hr>
            <h4 class="text-primary text-center">Congrats! <span class="text-danger"><?php echo ucfirst($_SESSION['user_name']);?></span> You have completed this Exam.</h4><hr>
            <h3 class="bg-info"><span class="text-danger">Your Final Score is : </span><?php echo $percent;?> %</h3><hr> 
        <?php 
        $insert_result = "INSERT INTO result (user_id, exam_name, percent,exam_date) VALUES ( '$user_id', '$exam_name', '$percent',NOW())";
        $run_result = mysqli_query($con,$insert_result)
        ?>
                <?php 
                header("location:result.php");
                ?>
        </div>
    </div>
</div>
