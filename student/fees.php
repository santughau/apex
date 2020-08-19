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
            <h2 class="text-center text-white bg-primary">Fees Details</h2>
            <hr>
        </div>

        <div class="col-md-4 table-responsive">
            <table class="table table-bordered table-condensed ">
                <tbody>
                    <?php
                               // $fee = 0;
                                $studentName = "SELECT * FROM student WHERE id = '$id' ";
                                $runstudentName = mysqli_query($con, $studentName);
                                $rowstudentName = mysqli_fetch_array($runstudentName);
                                     $fee = $rowstudentName['fee'];
                                $feePaidByStudent = "SELECT * FROM fee WHERE studentId = '$id' ";
                                $runPaidStudent = mysqli_query($con, $feePaidByStudent);
                                $tFees = 0;
                                $feesPaid=0;
                                while($rowPaidStudent = mysqli_fetch_array($runPaidStudent)){
                                $feesPaid = $rowPaidStudent['fees'];
                                $paidDate = $rowPaidStudent['date'];
                                $rNo = $rowPaidStudent['rNo'];
                                
                                $tFees += $feesPaid;
                                    
                                
                                ?>
                    <tr class="info">
                        <th class="bg-dark text-white">1<?php echo $paidDate;?></th>
                        <th> Rs <?php echo $feesPaid;?> </th>
                        <th>Voucher No. <?php echo $rNo;?></th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 table-responsive">
            <table class="table table-bordered table-condensed ">
                <tbody>
                    <tr class="info">
                        <th class="bg-dark text-white">Total Fees</th>
                        <th> Rs <?php echo $fee;?> </th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Paid Fees</th>
                        <th> Rs <?php echo $tFees;?> </th>
                    </tr>
                    <tr class="info">
                        <th class="bg-danger text-white">Balance</th>
                        <th> Rs <?php echo $fee-$feesPaid;?> </th>
                    </tr>
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