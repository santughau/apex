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
      $class = $_SESSION['class'];
      
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
                        <th>Exam Name</th>
                        <th>Total Question</th>
                        <th>View Toppers</th>
                    </tr>
                </thead>
                <?php
                
                $get_option = "SELECT * FROM exam WHERE dept_id= $class  ORDER BY exam_name ASC ";
                $run_option = mysqli_query($con,$get_option);
                //$total_que = mysqli_num_rows($run_option);
                $sr = 0;
                while ($row_option = mysqli_fetch_array($run_option)){
                $exam_id = $row_option['exam_id'];
                $exams_name = $row_option['exam_name'];
                $exam_name = ucfirst($row_option['exam_name']);
                $sr++;
                $get_que = "SELECT * FROM questions WHERE exam_id = '$exam_id' ";
                $run_que = mysqli_query($con,$get_que);
                $total_que = mysqli_num_rows($run_que);    
                    
                ?>
                <tr>
                    <td><?php echo $sr;?></td>
                    <td><?php echo $exam_name;?></td>
                    <td><?php echo $total_que ;?></td>
                    <td><a href="viewtoppers.php?e_id=<?php echo $exams_name;?>" class="btn btn-info btn-xs">View </a></td>
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

<?php } ?>