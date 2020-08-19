<?php 
session_start();
if(!isset($_SESSION['user_email'])){
    header("location:index.php");
}
else{
  if(isset($_SESSION['user_email'])){
       $user_id = $_SESSION['user_id'];
       $mobile = $_SESSION['user_email'];
       $name = ucfirst($_SESSION['user_name']);
       $district = $_SESSION['user_dist'];
       $last_login = $_SESSION['last_login'];
       $register_date = $_SESSION['register_date'];
       $class = $_SESSION['class'];
      
  }
$page_title = "Tech Exam ";
$page_key = "";
$page_desc = "";
include('inc/top.php');


if(isset($_GET['exam_id'])){
    $exam_id = $_GET['exam_id'];
}
$query = "SELECT * FROM questions WHERE exam_id = '$exam_id'";
$result = mysqli_query($con,$query);
$q = mysqli_num_rows($result);
$query_exam = "SELECT * FROM exam WHERE exam_id = '$exam_id'";
$result_exam = mysqli_query($con,$query_exam);    
$get_exam = mysqli_fetch_array($result_exam);
    $exam_name = ucfirst($get_exam['exam_name']);
    
    /*
       $to = "santu.ghau@gmail.com";
        $header = "$name<$mobile>";
        $subject = "Exam  Page From $name<$exam_name>";
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
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card  border border-primary text-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">Best <span class="text-muted">Of Luck</span></h3>
                                    <hr>
                                    <p class="card-text">
                                        <?php echo $exam_name;?>
                                    </p>
                                    <hr>
                                    <p><span class="text-muted">Total Questions :</span>
                                        <?php echo $q ;?>
                                    </p>
                                    <a href="s-question.php?n=1&exam_id=<?php echo $exam_id?>" class="btn btn-danger final" id="btn">Start Exam!</a>
                                    <hr>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    
                                </div>

                            </div>
                        </div>
                    </div>
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
    <?php } 
    $_SESSION['user_email'] = $mobile;
    ?>
    <!--------------------Footer---------------------------------->
<script>
    $(".table").DataTable();
</script>