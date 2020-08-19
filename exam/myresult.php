<?php
session_start();
$user_id = $_SESSION['user_id'];
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

else if (($_GET['u_id'] !== $user_id )){
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

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php require_once('inc/nav.php') ;?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive" style="padding-top:20px;">
            <h3 class="text-center text-white bg-primary">My Performance</h3><br>
            <hr>
            <table class="table table-bordered table-condensed ">
                <thead class="thead-dark">
                        <tr class="info">
                            <th>Sr</th>
                            <th>Exam</th>
                            <th>Marks</th>
                            <th>Date</th>
                        </tr>
                </thead>
               
                    
        <?php
        $get_result = "SELECT * FROM result where user_id = '$user_id' ORDER BY 1 DESC";
        $run_result = mysqli_query($con,$get_result);
        $sr = 0;
        while($row_result=mysqli_fetch_array($run_result)){

        $result_id = $row_result['result_id'];
        $user_id = $row_result['user_id'];
        $exam_name = $row_result['exam_name'];
        $percent = $row_result['percent'];
        $exam_date = $row_result['exam_date'];
            $sr++;
        ?>
                        <tr>
                            <td><?php echo $sr;?></td>
                            <td><?php echo $exam_name;?></td>
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
<?php } ?>