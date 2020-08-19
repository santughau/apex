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
        <div class="col-md-12 table-responsive">
            <div align="right">
                <a href="home.php" class="btn btn-outline-primary">Home Page</a>
                <hr>
            </div>
            <h2 class="text-center text-white bg-primary">View Messages</h2>
            <hr>
            <table class="table table-bordered display" id="table2excel2">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                   $msg = "SELECT * FROM msg WHERE studentId = '$id' ORDER BY id DESC ";
                    $run_msg = mysqli_query($con, $msg);
                            $ia=0;
                            while($row_msg = mysqli_fetch_array($run_msg)){
                                $id = $row_msg['id'];
                                $studentId = $row_msg['studentId'];
                                $message = $row_msg['message'];
                                $date = $row_msg['date'];
                                 $ia=$ia+1;
                
                ?>
                                <tr>
                                    <th scope="row"><?php echo $ia;?></th>
                                    <td> <?php echo $date; ?></td>
                                    <td> <?php echo $message; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
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