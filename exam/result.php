<?php 
ob_start();
session_start();
$mobile = $_SESSION['user_email'];
$page_title = "Tech Exam ";
$page_key = "";
$page_desc = "";
include('inc/top.php');

/* Check User Session Session */
$exam_id = $_SESSION['exam_id'];
$user_id = $_SESSION['user_id'];
$class = $_SESSION['class'];



/* Cerate Total Exam  */
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
    
/*
       $to = "santu.ghau@gmail.com";
        $header = "$name<$mobile>";
        $subject = "Result  Page From $name<$exam_name><$marks>";
        $message = "Name: $name \n\n Email:  $mobile ";  
        mail($to, $subject, $message, $header); */ 
?>
<!-- Start from here-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php include('inc/nav.php'); ?>
        </div>
    </div>
    <div class="row" style="margin-top:10px;">
        
        <div class="col-md-6" style="margin-bottom:15px;">
		
            <div class="row">
                <div class="col-md-12">
                    <div class=" purple lighten-4 ">
                        <p class="lead text-center">Exam Completed !</p>
                    </div><hr>
                    <h3 class="text-muted text-center">Congratuation !  Your Exam is completed.</h3><hr>
                    <h4 class="text-muted text-center">Your Marks is  : <?php echo $percent;?> %</h4><hr>
                    <?php $_SESSION['score']="";
                
                ?>
                
            <div  align="center"><a href="home.php" class="btn btn-primary col-md-offset-4 col-xs-offset-2">Try Again </a><br><br></div>
			<div  align="center"><a href="whatsapp://send?text=Useful For Comptia,MCSE,CCNA  👉 https://orangecomputers.us/" data-ction="share/whatsapp/share" class="btn btn-danger whatsapp ">Whatsapp Share</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 table-responsive">
            <?php require_once('inc/rightsidewithdate.php') ;?>
        </div>
    </div>
    <hr>
    <!--------------------Footer---------------------------------->
    <div class="container-fluid">
        <div class="row bg-dark" style="padding-top:20px;">
            <?php include('inc/footer.php');?>
        </div>
    </div>
    <!--------------------Footer---------------------------------->
    
    <script>
    $(".table").DataTable();
</script>