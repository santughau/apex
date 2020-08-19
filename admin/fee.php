<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM fee WHERE id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('fee.php','_self')</script>";  
    }
}

?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php include('inc/navbar.php');?>
            </div>
        
        </div>
		<div class="row" style="margin-top:10px;">
			<div class="col-md-3">
                <?php include('inc/sidebar.php');?>
            </div>
			<div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <img src="images/logo.jpg" class="img-fluid shadow-light"><hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <h1 class="text-center bg-secondary text-white">View all Fees Paid Details</h1>
                    <div id="product_table">
                     <table class="table table-bordered display" id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Student Name</th>
                          <th scope="col">Class</th>
                          <th scope="col">Batch</th>
                          <th scope="col">Amount</th>
                          <th scope="col">VoucherNo</th>
                          <th scope="col">Date</th>
                         <th scope="col"><i class="fa fa-trash-o" aria-hidden="true"></i>
</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                   $fee = "SELECT * FROM fee ORDER BY id DESC ";
                    $runFee = mysqli_query($con, $fee);
                            $ia=0;
                            while($rowFee = mysqli_fetch_array($runFee)){
                                $id = $rowFee['id'];
                                $studentId = $rowFee['studentId'];
                                $classId = $rowFee['classId'];
                                $batchId = $rowFee['batchId'];
                                $fees = $rowFee['fees'];
                                $rNo = $rowFee['rNo'];
                                $date = $rowFee['date'];
                                $ia=$ia+1;
                                
                          $list = "SELECT * FROM student WHERE id = '$studentId' "; 
                          $runlist = mysqli_query($con, $list);
                          $rowList = mysqli_fetch_array($runlist);
                            $name = $rowList['name'];
                                
                          $batchName = "SELECT * FROM courses WHERE course_id = '$batchId' "; 
                          $runBatchName = mysqli_query($con, $batchName);
                          $rowBatchName = mysqli_fetch_array($runBatchName);
                          $course_name = $rowBatchName['course_name'];
                                
               
                ?> 
                        <tr>
                          <th scope="row"><?php echo $ia;?></th>
                          <td><?php echo ucfirst($name); ?></td>
                          <td>Class <?php echo $classId; ?></td>
                          <td><?php echo $course_name; ?></td>
                          <td>Rs <?php echo $fees; ?></td>
                          <td><?php echo $rNo;?></td>  
                          <td><?php echo $date; ?></td>
                            <td><a href="fee.php?del=<?php echo $id;?>" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        </tr>
                     <?php } ?>   
                      </tbody>
                    </table>
                        <hr>
                    </div>
                    <button type="button" class="btn btn-warning offset-md-4" id="but">Export to Excel</button><hr>
                    
                </div>
            </div>
            </div>
        </div>
    
    
<!--------------------Footer---------------------------------->
    <div class="container-fluid">
        <div class="row bg-dark" style="padding-top:20px;">
            <?php include('inc/footer.php');?>
        </div>
    </div>
<!--------------------Footer---------------------------------->
</div>
 </html>
<!------------------View Product----------------------------------->


<!----------------------------------------------------->

<!------------------------------------------------------>
<script>
CKEDITOR.replace( 'post-data' ); 
</script>
<script>
$(document).ready(function(){
    $('#table2excel').DataTable();
});
</script>
<script>
$("#but").click(function(){
  $("#table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "customer_name.xls" //do not include extension
  }); 
});
</script>






