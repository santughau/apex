<?php
session_start();
 
$page_title = "Home Page";
$page_key = "";
$page_desc = "";
$page_desc = "";
require_once('inc/top.php') ;?>

<?php if(!isset($_SESSION['user_email'])){
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
    
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php require_once('inc/nav.php') ;?>
        </div>
    </div>
      <hr>
    <h2 class="bg-dark text-white text-center">New Added Exams</h2>
    <div class="row">
       
        <?php
        $get_option = "SELECT * FROM exam  WHERE dept_id = $class";
         $run_option = mysqli_query($con,$get_option);
                while ($row_option = mysqli_fetch_array($run_option)){
                $option_id = $row_option['exam_id'];
                $option_title = ucfirst($row_option['exam_name']);
        ?>
        <div class="col-md-3" style="margin-bottom:10px;">
            <div class="card bg-primary text-white">
                <div class="card-body" style="height:100px;">
                    <a class="text-white" href="s-index.php?exam_id=<?php echo $option_id;?>"><h4 class="card-title text-center"><?php echo $option_title ?></h4></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="container-fluid bg-dark">
    <div class="row " style="padding-top:20px;">
        
        <?php include('inc/footer.php');?>
    </div>
</div>
</div>

<?php } 
$_SESSION['user_email'] = $mobile;
?>
</body>
</html>