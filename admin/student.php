<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM student WHERE id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('student.php','_self')</script>";  
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
                  <h1 class="text-center bg-secondary text-white">View all Students</h1>
                    <div align="right">
                    <a href="addStudent.php" class="btn btn-outline-primary" >Add Student</a><hr>
                    </div>
                    <div id="product_table table-responsive">
                     <table class="table table-bordered display" id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Student Name</th>
                          <th scope="col">Class</th>
                          <th scope="col">Batch</th>
                          <th scope="col">Image</th>
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
                   $student = "SELECT * FROM student ORDER BY id DESC ";
                    $run_student = mysqli_query($con, $student);
                            $ia=0;
                            while($row_student = mysqli_fetch_array($run_student)){
                                $id = $row_student['id'];
                                $name = $row_student['name'];
                                $class = $row_student['class'];
                                $batch = $row_student['batch'];
                                $image = $row_student['image'];
                                
                                 $ia=$ia+1;
                                
                            $courses = "SELECT * FROM courses WHERE course_id = '$batch' ";
                            $run_courses = mysqli_query($con, $courses);
                            $row_courses = mysqli_fetch_array($run_courses);

                            $course_id = $row_courses['course_id'];
                            $course_name = $row_courses['course_name'];
                
                ?> 
                        <tr>
                          <th scope="row"><?php echo $ia;?></th>
                            <td><?php echo ucfirst($name); ?></td>
                          <td>Class <?php echo $class; ?></td>
                          <td><?php echo $course_name; ?></td>
                          <td><img src="../images/student/<?php echo $image;?>" class="img-fluid" width="100px" ></td>
                            <td><a href="studentDetails.php?id=<?php echo $id;?>" class="btn btn-primary" ><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                            <td><a href="editStudent.php?id=<?php echo $id;?>" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                          <td><a href="student.php?del=<?php echo $id;?>" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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

// User “nandedweb_diecpd” was added to the database “nandedweb_diecpd”.






