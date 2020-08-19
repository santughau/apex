<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');

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
                        <img src="images/logo.jpg" class="img-fluid shadow-light">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Batch Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Batch Name" name="courseName" required>
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
                                <label class="col-sm-2 col-form-label text-dark">Batch Dutration</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Duration Here" name="duration" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Batch Fee</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Fee Here" name="fee" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Batch Starts From</label>
                                <div class="col-sm-10">
                                   
                                    <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="date" placeholder="Choose Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="submit">Add Course</button>
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
        $(function() {
            $('.datepicker').datepicker();
        });
    </script>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>
    <?php
  if(isset($_POST['submit'])){
      $courseName = $_POST['courseName'];
      $duration = $_POST['duration'];
      $fee = $_POST['fee'];
      $date = $_POST['date'];
      $class = $_POST['class'];
      
      
      $insert_news = "INSERT INTO courses (course_name,course_duration,course_fee,course_start,class) VALUES ('$courseName','$duration','$fee','$date','$class')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
          
	   echo"<script>alert('Welcome, You have added a new Course !')</script>";
	   echo"<script>window.open('course.php','_self')</script>";
        }
  } 
    
?>