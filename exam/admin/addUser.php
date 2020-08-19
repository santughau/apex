<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_mobile'])){
        header('Location:../admin.php');
     $_SESSION['user_mobile'];
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
                    <div class="col-md-6">
                        <h3 class="text-white bg-primary text-center">Add User </h3>
                        <hr>
                        <form class="form-horizontal" style="margin-top:20px;" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="u_name" class="form-control "  required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mobile</label>
                                <div class="col-sm-8">
                                    <input type="text" name="u_moblie" class="form-control"  required="required" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label ">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="u_pass" class="form-control "  required="required">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-sm-2 control-label ">Email</label>
                                <div class="col-sm-8 ">
                                    <input type="email" name="u_email" class="form-control"  required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gender</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="u_gender" >
                                        <option value="male">Male</option>
                                        <option value="male">Female</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Class</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="u_class" >
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 2</option>
                                        <option value="3">Class 3</option>
                                        <option value="4">Class 4</option>
                                        <option value="5">Class 5</option>
                                        <option value="6">Class 6</option>
                                        <option value="7">Class 7</option>
                                        <option value="8">Class 8</option>
                                        <option value="9">Class 9</option>
                                        <option value="10">Class 10</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-8">
                                    <input type="file" class="btn  btn-warning" name="u_image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Birthday</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="u_bdate" >
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                            <button type="submit" name="submit" class="btn btn-primary col-md-10 ">Add User Profile</button>
                        </form>
                        <hr><br>
                    </div>
                    <div class="col-md-6 table-responsive">
                        <h1 class="text-secondary">Category <small class="text-muted">Statistic Overview</small></h1>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
        <!--------------------Footer---------------------------------->
        <div class="container-fluid bg-dark">
            <div class="row " style="padding-top:20px;">

                <?php include('inc/footer.php');?>
            </div>
        </div>
        <!--------------------Footer---------------------------------->
    </div>

    </html>
    <?php
if(isset($_POST['submit'])){
            $u_name = $_POST['u_name'];
            $u_moblie = $_POST['u_moblie'];
            $u_pass = $_POST['u_pass'];
            $u_email = $_POST['u_email'];
            $u_gender = $_POST['u_gender'];
            $u_class = $_POST['u_class'];
            $u_bdate = $_POST['u_bdate'];
            $image_tmp = $_FILES['u_image']['tmp_name'];            
            $u_image = 'product_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';                    
            
            move_uploaded_file($image_tmp,"../images/user/$u_image");  
    
              $update = "INSERT INTO `users` 
              ( `user_name`,`user_mobile`,`user_pass`,`user_email`,`user_gender`,`user_b_day`,`user_image`,`class`)
              VALUES 
              ('$u_name','$u_moblie','$u_pass','$u_email','$u_gender','$u_bdate','$u_image','$u_class')            ";
            
            $run = mysqli_query($con,$update);
            
            if($run){
                
            $get_media = "SELECT * FROM users WHERE user_image = '$u_image'";
                
            $media_query = mysqli_query($con,$get_media);
            $row_media = mysqli_fetch_array($media_query);
                
            $media_id = $row_media['user_id'];
            $media_name1 = $row_media['user_image'];
            
                if(file_exists("../images/user/$u_image")){
                    if(rename("../images/user/$u_image","../images/user/$media_id.jpg")){
                        $update = "UPDATE users SET user_image='$media_id.jpg' WHERE user_image = '$media_name1'";
            
                        $run = mysqli_query($con,$update);
                    }
                    else{
                        echo "<script>alert('Error in Rename !')</script>";
                    }
                }
                else{
                    echo "<script>alert('File does not exit')</script>";
                }
                 echo"<script>alert('Welcome, You have Added Succcessfully !')</script>";
                echo"<script>window.open('user.php','_self')</script>";

        }
}
?>