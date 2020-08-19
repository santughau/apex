<?php
session_start();
 
$page_title = "Home Page";
$page_key = "";
$page_desc = "";
$page_desc = "";
require_once('inc/top.php') ;?>

<?php if(!isset($_SESSION['mobile'])){
    header("location:index.php");
}
else{
  if(isset($_SESSION['mobile'])){
       $id = $_SESSION['id'];
       $name = $_SESSION['name'];
       $image = ucfirst($_SESSION['image']);
       $mobile = $_SESSION['mobile'];
      
  }
    
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php require_once('inc/nav.php') ;?>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div align="right">
                <a href="home.php" class="btn btn-outline-primary">Home Page</a>
                <hr>
            </div>
        </div>
        <?php
                            $student = "SELECT * FROM attendance WHERE studentId = '$id' order by attId DESC";
                            $run_student = mysqli_query($con, $student);

                            while($row_student = mysqli_fetch_array($run_student)){
                                    $studentId = $row_student['studentId'];
                                    $attendance = $row_student['attendance'];
                                    $date = $row_student['date'];
                                $date = date('Y-m-d', strtotime($date));
                    ?>
        <div class="col-md-2 " style="border:1px solid gray; ">
            <p><?php echo $date;?>
                <small class="<?php echo ($attendance == "Present") ? "text-primary" : "text-danger"; ?>"><?php echo $attendance;?></small></p>
        </div>
        <?php } ?>

    </div>
    <div class="container-fluid bg-dark">
        <div class="row " style="padding-top:20px; margin-top:20px;">

            <hr> <?php include('inc/footer.php');?>
        </div>
    </div>
</div>

<?php } 
$_SESSION['user_email'] = $mobile;
?>
</body>

</html>