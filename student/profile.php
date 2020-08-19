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
            <h2 class="text-center text-white bg-primary">My Profile</h2>
            <hr>
        </div>
        <div class="col-md-4 table-responsive">
                        <?php
                            $select = "SELECT * FROM student WHERE id='$id'";
                            $run = mysqli_query($con,$select);
                            $row = mysqli_fetch_array($run);

                            $id= $row['id'];
                            $name= $row['name'];
                            $address= $row['address'];
                            $class= $row['class'];
                            $batch= $row['batch'];
                            $medium= $row['medium'];
                            $gender= $row['gender'];
                            $mobile= $row['mobile'];
                            $email= $row['email'];
                            $school= $row['school'];
                            $fee= $row['fee'];
                            $password= $row['password'];
                            $subject= $row['subject'];
                            $cexam= $row['cexam'];
                            $dob= $row['dob'];
                            $image= $row['image'];
                            $date= $row['date'];
                        
                        
                            $courses = "SELECT * FROM courses WHERE course_id = '$batch' ";
                            $run_courses = mysqli_query($con, $courses);
                            $row_courses = mysqli_fetch_array($run_courses);

                            $course_id = $row_courses['course_id'];
                            $course_name = $row_courses['course_name'];
                            ?>
                        <table class="table table-bordered table-condensed ">
                            <tbody>
                                <tr class="info">
                                    <th class="bg-dark text-white">Name</th>
                                    <th><?php echo $name;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Address</th>
                                    <th><?php echo $address;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Class</th>
                                    <th>Class <?php echo $class;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Batch</th>
                                    <th><?php echo $course_name;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Medium</th>
                                    <th><?php echo $medium;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Gender</th>
                                    <th><?php echo $gender;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Mobile</th>
                                    <th><?php echo $mobile;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">E-mail</th>
                                    <th><?php echo $email;?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 table-responsive">
                        <table class="table table-bordered table-condensed ">
                            <tbody>
                                <tr class="info">
                                    <th class="bg-dark text-white">School</th>
                                    <th><?php echo $school;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Fees</th>
                                    <th><?php echo $fee;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Password</th>
                                    <th> <?php echo $password;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Subject</th>
                                    <th><?php echo $subject;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Compititive Exam</th>
                                    <th><?php echo $cexam;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Date Of Birth</th>
                                    <th><?php echo $dob;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Registration Date</th>
                                    <th><?php echo $date;?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-testimonial text-center">
                            <div class="card-header red accent-3 ">
                                <img src="../images/student/<?php echo $image;?>" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title mt-5"><?php echo $name;?></h4>
                                <hr>
                                <p class="card-text"><br><br> </p>
                                <a href="#" class="btn twitter btn-circle white-text"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="btn facebook btn-circle white-text"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="btn google-plus btn-circle white-text"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <hr>
                        <a href="student.php" class="btn btn-secondary pull-right">Back to Student List</a>
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