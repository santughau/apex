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
        <div class="col-md-12 mb-2">
            <div align="right">
                <a href="home.php" class="btn btn-outline-primary">Home Page</a>
                <hr>
            </div>
            <h2 class="text-center text-white bg-primary">Marks Details</h2>
            <hr>
            
            <table class="table table-bordered display" id="table2excel">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Total Marks</th>
                        <th scope="col">Obtained Marks</th>
                    </tr>
                </thead>
                <?php
                            $result = "SELECT * FROM result WHERE studentId = '$id' ";
                            $run_result = mysqli_query($con, $result);
                            $ia=0;
                            while($row_result = mysqli_fetch_array($run_result)){
                                $date = $row_result['date'];
                                $subject = $row_result['subject'];
                                $totalMarks = $row_result['totalMarks'];
                                $obtainmark = $row_result['obtainmark'];
                            ?>
                <tr>
                    <td><?php echo $date;?></td>
                    <td><?php echo $subject;?></td>
                    <td><?php echo $totalMarks;?></td>
                    <td><?php echo $obtainmark;?></td>
                </tr><?php } ?>
            </table>
        </div>
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