<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM courses WHERE course_id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('course.php','_self')</script>";  
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
                  <h1 class="text-center bg-secondary text-white">View all Batches</h1>
                    <div align="right">
                    <a href="addCourse.php" class="btn btn-outline-primary" >Add Batches</a><hr>
                    </div>
                    <div id="product_table">
                     <table class="table table-bordered display" id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Course Name</th>
                          <th scope="col">For Class</th>
                          <th scope="col">Duration</th>
                          <th scope="col">Course Fee</th>
                          <th scope="col">No Of Student</th>
                          <th scope="col">Batch Starts</th>
                            <th scope="col"><i class="fa fa-eye" aria-hidden="true"></i>
</th>
                          <th scope="col"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</th>
                          <th scope="col"><i class="fa fa-trash-o" aria-hidden="true"></i>
</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                   $course = "SELECT * FROM courses ORDER BY course_id DESC ";
                    $runCourse = mysqli_query($con, $course);
                            $ia=0;
                            while($rowCourse = mysqli_fetch_array($runCourse)){
                                $course_id = $rowCourse['course_id'];
                                $course_name = $rowCourse['course_name'];
                                $course_duration = $rowCourse['course_duration'];
                                $course_fee = $rowCourse['course_fee'];
                                $course_start = $rowCourse['course_start'];
                                $class = $rowCourse['class'];
                                $ia=$ia+1;
                                
                          $list = "SELECT * FROM student WHERE batch = '$course_id' "; 
                          $runlist = mysqli_query($con, $list);
                          $row_list = mysqli_num_rows($runlist);
                                
               
                ?> 
                        <tr>
                          <th scope="row"><?php echo $ia;?></th>
                          <td><?php echo ucfirst($course_name); ?></td>
                          <td><?php echo $class; ?></td>
                          <td><?php echo ucfirst($course_duration); ?></td>
                          <td><?php echo $course_fee; ?></td>
                          <td><?php echo $row_list;?></td>  
                          <td><?php echo $course_start; ?></td>
                            <td><a href="viewCourse.php?id=<?php echo $course_id;?>" class="btn btn-primary" ><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                            <td><a href="editCourse.php?id=<?php echo $course_id;?>" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                          <td><a href="course.php?del=<?php echo $course_id;?>" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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






