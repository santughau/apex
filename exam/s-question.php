<?php 
ob_start();
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
$page_title = "Tech Exam ";
$page_key = "";
$page_desc = "";
include('inc/top.php');
    
$number = (int) $_GET['n'];
$exam_id = $_GET['exam_id'];
$a = $number-1;
$query = "SELECT * FROM questions WHERE exam_id = '$exam_id' LIMIT 1 OFFSET $a";
$result = mysqli_query($con,$query);
$q = mysqli_fetch_array($result);
$qid = $q['question_number'];
$question = $q['text'];
$opt_a = $q['opt_a'];
$opt_b = $q['opt_b'];
$opt_c = $q['opt_c'];
$opt_d = $q['opt_d'];
$ans = $q['ans'];

 $query_t = "SELECT * FROM questions WHERE exam_id = '$exam_id'";
        $result_t = mysqli_query($con,$query_t);
        $total = mysqli_num_rows($result_t);

 $_SESSION['q'] = $qid;
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
		 
            <div class="jumbotro purple lighten-4 ">
                <p class="lead text-center">Question  <?php echo $number;?> / <?php echo $total;?></p>
                <hr>
            </div>
            <div class="list-group">
                <h3 class="text-danger">Question</h3>
                <a href="#" class="list-group-item list-group-item-action list-group-item-danger"> <b><?php echo $question;?></b></a><hr>
            </div>
            <form method="post" action="s-process.php"  > 
                <h3 class="text-primary">Please Choose one options</h3>
            <ul class="list-group" id="forma">
                <li class="list-group-item" ><input name="choice" type="radio" value="A"> <?php echo $opt_a;?></li>
                <li class="list-group-item" ><input name="choice" type="radio" value="B"> <?php echo $opt_b;?></li>
                <li class="list-group-item "><input name="choice" type="radio" value="C"> <?php echo $opt_c;?></li>
                <li class="list-group-item"><input name="choice" type="radio" value="D"> <?php echo $opt_d;?></li>
            </ul>
                <br>
                <input type="hidden" value="<?php echo $qid;?>" name="exam_id">
                <input type="submit" value="
                    <?php 
            if ($number == $total) {
                echo 'Submit';
                } else {
                echo 'Next';
                }
                ?>" class="btn btn-primary btn-xs col-md-offset-4 col-xs-offset-4" id="btn" >
                <input type="hidden" value="<?php echo $number;?>" name="number">
                <input type="hidden" value="<?php echo $exam_id;?>" name="exam_id">
				<div class="row">
                    <div class="col-md-12">
                     
                    </div>
                </div>
            </form>
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
		 <div class="row">
                    
            </div>
    </div>
    <?php } 
    $_SESSION['user_email'] = $mobile;
    $_SESSION['user_id'] = $user_id;
    ?>
    <!--------------------Footer---------------------------------->
    <script>
        $(document).ready(function() {
            $('#btn').mouseover(function() {
                $('#btn').removeClass('btn-primary');
                $('#btn').addClass('btn-danger');
            });
            $('#btn').mouseout(function() {
                $('#btn').removeClass('btn-danger');
                $('#btn').addClass('btn-primary');
            });
            $('#forma li').mouseover(function() {
                //$('#form').removeClass('bg-primary');
                $(this).addClass('active');
            });
            $('#forma li').mouseout(function() {
                $(this).removeClass('active');
               // $('#forma li').addClass('bg-primary');
            });
        });
    </script>
    <script>
    $(".table").DataTable();
</script>
   