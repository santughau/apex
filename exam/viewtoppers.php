<?php
session_start();
$page_title = "";
$page_key = "";
$page_desc = "";
$page_desc = "";
?>
<?php require_once('inc/top.php') ;

?>

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
      
  }
if(isset($_GET['e_id'])){
    $exam_name = $_GET['e_id'];
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <?php require_once('inc/nav.php') ;?>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive" style="padding-top:20px;">
                    <table class="table table-bordered table-condensed ">
                        <thead class="thead-dark">
                            <tr class="info">
                                <th>Sr</th>
                                <th>Student Name</th>
                                <th>Marks</th>
                                <th>Exam date</th>

                            </tr>
                        </thead>
                        <?php
    
    $get_que = "SELECT * FROM result  WHERE  exam_name  = '$exam_name'  ORDER BY  percent  DESC ";
    $run_que = mysqli_query($con,$get_que);
    $sr = 0;
    while ($row_option = mysqli_fetch_array($run_que)){
    $user_id = $row_option['user_id'];
    $exam_name = $row_option['exam_name'];
    $percent = $row_option['percent'];
    $exam_date = $row_option['exam_date'];
     
    $get_user = "SELECT * FROM users WHERE  user_id  = '$user_id' ";
    $run_user = mysqli_query($con,$get_user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $sr++;
    ?>
                        <tr>
                            <td><?php echo $sr;?></td>
                            <td><?php echo $user_name;?></td>
                            <td><?php echo $percent;?></td>
                            <td><?php echo $exam_date;?></td>


                        </tr>
                        <?php } ?>
                    </table>

                </div>
    </div>
    <div class="container-fluid bg-dark">
    <div class="row " style="padding-top:20px;">        
        <?php include('inc/footer.php');?>
    </div>
</div>
</div>
<?php require_once('inc/footer.php') ; ?>
<?php } ?>