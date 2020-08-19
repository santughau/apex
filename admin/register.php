<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM customer WHERE cust_id = '$del_id'";
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
                  <h1 class="text-center bg-secondary text-white">View all Registration</h1>
                    
                    <div id="product_table">
                     <table class="table table-bordered display" id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Student Name</th>
                          <th scope="col">Student Email</th>
                          <th scope="col">Mobile</th>
                          <th scope="col">Address</th>
                          <th scope="col">Qualification</th>
                          <th scope="col">Course</th>
                          <th scope="col">Date</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                   $register = "SELECT * FROM register";
                    $runRegister = mysqli_query($con, $register);
                            $ia=0;
                            while($rowRegister = mysqli_fetch_array($runRegister)){
                                $regId = $rowRegister['regId'];
                                $regName = $rowRegister['regName'];
                                $regEmail    = $rowRegister['regEmail'];
                                $regMobile = $rowRegister['regMobile'];
                                $regAddress = $rowRegister['regAddress'];
                                $regQua = $rowRegister['regQua'];
                                $regCourse = $rowRegister['regCourse'];
                                $date = $rowRegister['date'];
                                
                                 $ia=$ia+1;
                                
                $courses = "SELECT * FROM courses WHERE course_id = '$regCourse' ";
                $run_courses = mysqli_query($con, $courses);
                $row_courses = mysqli_fetch_array($run_courses);
                
                $course_id = $row_courses['course_id'];
                $course_name = $row_courses['course_name'];
                $course_duration = $row_courses['course_duration'];
                $course_fee = $row_courses['course_fee'];
                $course_start = $row_courses['course_start'];
                
                ?> 
                        <tr>
                          <th scope="row"><?php echo $ia;?></th>
                          <td><?php echo ucfirst($regName); ?></td>
                          <td><?php echo $regEmail; ?></td>
                          <td><?php echo $regMobile; ?></td>
                          <td><?php echo $regAddress; ?></td>
                          <td><?php echo $regQua; ?></td>
                          <td><?php echo $course_name; ?></td>
                          <td><?php echo $date; ?></td>
                            
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






