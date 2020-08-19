<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $id = $_GET['id'];
            $studentInfo = "SELECT * FROM student WHERE id = '$id' ";
            $studentRun = mysqli_query($con,$studentInfo);
            $row=mysqli_fetch_array($studentRun);
                                    
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
                    $fees= $row['fee'];
                    $password= $row['password'];
                    $subject= $row['subject'];
                    $cexam= $row['cexam'];
                    $dob= $row['dob'];
                    $u_imagea= $row['image'];
                    $date= $row['date'];
                    $subjecta = explode(",",$subject);
                    $cexama = explode(",",$cexam);
    
            $courses = "SELECT * FROM courses WHERE course_id = '$batch' ";
            $run_courses = mysqli_query($con, $courses);
            $row_courses = mysqli_fetch_array($run_courses);
                
            $course_id = $row_courses['course_id'];
            $course_name = $row_courses['course_name'];
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
                        <img src="images/logo.jpg" class="img-fluid shadow-light">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-white bg-primary text-center">Edit Student Details </h2>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Student Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Student Name" name="studentName" required style="border: 1px solid black;padding:10px;" value="<?php echo $name;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Address Here" name="address" required style="border: 1px solid black;padding:10px;" value="<?php echo $address;?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">For Class</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="class" required style="border: 1px solid black;padding:10px;">
                                        <option value="1" <?php if($class == '1' ){echo "selected"; }?>>Class 1 </option>
                                        <option value="2" <?php if($class == '2' ){echo "selected"; }?>>Class 2 </option>
                                        <option value="3" <?php if($class == '3' ){echo "selected"; }?>>Class 3 </option>
                                        <option value="4" <?php if($class == '4' ){echo "selected"; }?>>Class 4 </option>
                                        <option value="5" <?php if($class == '5' ){echo "selected"; }?>>Class 5 </option>
                                        <option value="6" <?php if($class == '6' ){echo "selected"; }?>>Class 6 </option>
                                        <option value="7" <?php if($class == '7' ){echo "selected"; }?>>Class 7 </option>
                                        <option value="8" <?php if($class == '8' ){echo "selected"; }?>>Class 8 </option>
                                        <option value="9" <?php if($class == '9' ){echo "selected"; }?>>Class 9 </option>
                                        <option value="10" <?php if($class == '10' ){echo "selected"; }?>>Class 10 </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Batch</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="batch" required style="border: 1px solid black;padding-left:10px;">
                                        <?php
                                        $get_option = "SELECT * FROM courses ORDER BY course_id ASC";
                                        $run_option = mysqli_query($con,$get_option);
                                         while ($row_option = mysqli_fetch_array($run_option)){
                                            $option_id = $row_option['course_id'];
                                            $option_title = $row_option['course_name'];
                                        ?>
                                        <option value="<?php echo $option_id ;?>" <?php if($batch == $option_id ){echo "selected"; }?>><?php echo $option_title ;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Medium</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="medium" required style="border: 1px solid black;padding:10px;">
                                        <option value="Marathi" <?php if($medium == 'Marathi' ){echo "selected"; }?>>Marathi</option>
                                        <option value="Semi" <?php if($medium == 'Semi' ){echo "selected"; }?>>Semi</option>
                                        <option value="CBSE" <?php if($medium == 'CBSE' ){echo "selected"; }?>>CBSE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Gender</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="gender" required style="border: 1px solid black;padding:10px;">
                                        <option value="male" <?php if($gender == 'male' ){echo "selected"; }?>>Male</option>
                                        <option value="female" <?php if($gender == 'female' ){echo "selected"; }?>>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Mobile</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Mobile Here" name="mobile" required style="border: 1px solid black;padding:10px;" value="<?php echo $mobile;?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Email Here" name="email" required style="border: 1px solid black;padding:10px;" value="<?php echo $email;?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">School</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter School Here" name="school" required style="border: 1px solid black;padding:10px;" value="<?php echo $school;?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Fees</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Total Fees Here" name="fee" required style="border: 1px solid black;padding:10px;" 
                                           value="<?php echo $fees;?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Password Here" name="password" required style="border: 1px solid black;padding:10px;" value="<?php echo $password;?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Subject</label>
                                <div class="col-sm-10">
                                    <?php
                                    $subject = "SELECT * FROM subject ";
                                    $runSubject = mysqli_query($con, $subject);
                                    while($rowSubject = mysqli_fetch_array($runSubject)){
                                            $id = $rowSubject['id'];
                                            $subjectName = $rowSubject['subjectName'];

                                    ?>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="sub[]" value="<?php echo $subjectName;?>" <?php if(in_array("$subjectName",$subjecta)){echo "checked";}?>> <?php echo $subjectName;?>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Compititive Exam</label>
                                <div class="col-sm-10">
                                    <?php
                                    $csubject = "SELECT * FROM compititive ";
                                    $runSubjectc = mysqli_query($con, $csubject);
                                    while($rowSubjectc = mysqli_fetch_array($runSubjectc)){
                                            $idc = $rowSubjectc['id'];
                                            $examName = $rowSubjectc['examName'];

                                    ?>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="com[]" value="<?php echo $examName;?>" <?php if(in_array("$examName",$cexama)){echo "checked";}?>> <?php echo $examName;?>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Date Of Birth</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="date" placeholder="Choose Date" style="border: 1px solid black;padding:10px;" value="<?php echo $dob;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Student Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class=" btn btn-secondary" name="u_image" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="update">Update Student</button>
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

    <?php
  if(isset($_POST['update'])){
      
      if(isset($_GET['id'])){
        $id = $_GET['id'];
      }
      $studentName = $_POST['studentName'];
      $date = $_POST['date'];
      $password = $_POST['password'];
      $fee = $_POST['fee'];
      $school = $_POST['school'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $medium = $_POST['medium'];
      $batch = $_POST['batch'];
      $class = $_POST['class'];
      $address = $_POST['address'];
      $gender = $_POST['gender'];
      $sub = implode(",",$_POST['sub']); 
      $com = implode(",",$_POST['com']);  
      
      $image_tmp = $_FILES['u_image']['tmp_name']; 
      
      if(empty($u_image))
            {
                $u_image = $u_imagea;
            }
            else{
                $u_image = 'product_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
            }                 
            
      move_uploaded_file($image_tmp,"../images/student/$u_image");
     
      
  
     echo $insert_news = "update student set 
      name = '$studentName',
      address = '$address',
      class = '$class',
      batch = '$batch',
      medium = '$medium',
      gender = '$gender',
      mobile = '$mobile',
      email = '$email',
      school = '$school',
      fee = '$fee',
      password = '$password',
      subject = '$sub',
      cexam = '$com',
      dob = '$date'
      where id = '$id'";
      
      
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
          
          $get_media = "SELECT * FROM student WHERE image = '$u_image'";
                
            $media_query = mysqli_query($con,$get_media);
            $row_media = mysqli_fetch_array($media_query);
                
            $media_id = $row_media['id'];
            $media_name1 = $row_media['image'];
            
                if(file_exists("../images/student/$u_image")){
                    if(rename("../images/student/$u_image","../images/student/$media_id.jpg")){
                        $update = "UPDATE student SET image='$media_id.jpg' WHERE image = '$media_name1'";
            
                        $run = mysqli_query($con,$update);
                    }
                    else{
                        echo "<script>alert('Error in Rename !')</script>";
                    }
                }
                else{
                    echo "<script>alert('File does not exit')</script>";
                }
          echo"<script>alert('Welcome, You have Updated your Student !')</script>";
            echo"<script>window.open('student.php','_self')</script>";
     
            }
    }

?>