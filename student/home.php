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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Responsive -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-4151366218309776"
             data-ad-slot="5270114532"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script> 
        <div class="col-md-2 mb-2">
            <div class="card text-center border-secondary text-white bg-secondary">
                <div class="card-body">
                    <h4 class="card-title">Marks</h4>
                    <a href="mark.php" class="btn btn-warning">Click Me!</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-2">
            <div class="card text-center border-primary text-white bg-primary">
                <div class="card-body">
                    <h4 class="card-title">Attendance</h4>
                    <a href="attendance.php" class="btn btn-danger">Click Me!</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-2">
            <div class="card text-center border-warning text-white bg-warning">
                <div class="card-body">
                    <h4 class="card-title">Fees</h4>
                    <a href="fees.php" class="btn btn-secondary">Click Me!</a>
                </div>
            </div>
        </div>

        <div class="col-md-2 mb-2">
            <div class="card text-center border-danger text-white bg-danger">
                <div class="card-body">
                    <h4 class="card-title">Messages</h4>
                    <a href="msg.php" class="btn btn-dark">Click Me!</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-2">
            <div class="card text-center border-dark text-white bg-dark">
                <div class="card-body">
                    <h4 class="card-title">Profile</h4>
                    <a href="profile.php" class="btn btn-danger">Click Me!</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-2">
            <div class="card text-center border-info text-white bg-info">
                <div class="card-body">
                    <h4 class="card-title">Query</h4>
                    <a href="query.php" class="btn btn-primary">Click Me!</a>
                </div>
            </div>
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#exampleModal").modal('show');
    });
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dear Parents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
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
                                
                $tFees += $feesPaid;}
                $remaingFee = $fee-$tFees;
                if($remaingFee > 0){
                    ?>
                <P>Please Pay Your remaining Fee Rs. <?php echo $remaingFee;?> immediately.</P>
                <?php 
                }else{
                    ?>
                <P>Thank You for your moral support .</P>
                <?php 
                }?>
                
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>