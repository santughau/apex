<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $edit_id = $_GET['id'];
            $courseInfo = "SELECT * FROM courses WHERE course_id = '$edit_id' ";
            $courseRun = mysqli_query($con,$courseInfo);
            $row=mysqli_fetch_array($courseRun);
                                    
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $course_duration = $row['course_duration'];
            $course_fee = $row['course_fee'];
            $course_start = $row['course_start'];
            $class = $row['class'];
            
            
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
                     <h2 class="text-center text-white bg-primary">Edit Batch</h2>
                   <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Course Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $course_name;?>" name="courseName" required>
                        </div>
                      </div>
                       
                       <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">For Class</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="class" required>
                                        <option value="1">Class 1 </option>
                                        <option value="2">Class 2 </option>
                                        <option value="3">Class 3 </option>
                                        <option value="4">Class 4 </option>
                                        <option value="5">Class 5 </option>
                                        <option value="6">Class 6 </option>
                                        <option value="7">Class 7 </option>
                                        <option value="8">Class 8 </option>
                                        <option value="9">Class 9 </option>
                                        <option value="10">Class 10 </option>
                                    </select>
                                </div>                                
                            </div>
                       
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Course Dutration</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $course_duration;?>" name="duration" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Course Fee</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $course_fee;?>" name="fee" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Batch Starts From</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="date" value="<?php echo $course_start;?>">
                        </div>
                      </div>
                        
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" name="update">Update Batch</button>
                        </div>
                      </div>
                    </form>
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
<script>
     $(function(){
             $('.datepicker').datepicker();
     });
    
</script>
<?php
  if(isset($_POST['update'])){
      $courseName = $_POST['courseName'];
      $duration = $_POST['duration'];
      $fee = $_POST['fee'];
      $date = $_POST['date'];
      $class = $_POST['class'];
      
      
     $insert_news = "update courses set 
      course_name = '$courseName',
      course_duration = '$duration',
      course_fee = '$fee',
      class = '$class',
      course_start = '$date'
      where course_id = '$edit_id'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
          echo"<script>alert('Welcome, You have Updated your Course !')</script>";
            echo"<script>window.open('course.php','_self')</script>";
     
            }
    }

?>
