<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_mobile'])){
        header('Location:../admin.php');
     $_SESSION['user_mobile'];
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $id = $_GET['id'];
        if($_SESSION['user_mobile']== '8698642735'){
        //$get_teacher = "SELECT * FROM exam WHERE exam_id = '$id'";
         $get_user = "SELECT * FROM users WHERE user_id='$id'";
    $run_user = mysqli_query($con,$get_user);
    $row = mysqli_fetch_array($run_user);
    $user_id = $row['user_id'];
    $user_name = ucfirst($row['user_name']);
    $user_country = ucfirst($row['user_country']);
    $last_login = $row['last_login'];
    $register_date = $row['register_date'];
    $u_imagea = $row['user_image'];
    $user_pass = $row['user_pass'];
    $user_email = $row['user_email'];
    $user_gender = $row['user_gender'];
    $user_mobile = $row['user_mobile'];
    $user_district = $row['user_dist'];
    $user_bday = $row['user_b_day'];
    
    $get_dist = "SELECT * FROM district WHERE d_id = $user_district";
    $run_dist = mysqli_query($con,$get_dist);
    $row_dist = mysqli_fetch_array($run_dist);
    $dist = $row_dist['d_name'];
        }
    else{
         header('Location:index.php');
    }
        }
if(isset($_GET['e_id'])){
    $exam_id = $_GET['e_id'];
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
                    <div class="col-md-6">
                        <h3 class="text-danger text-center">Edit User </h3>
                        <hr>
                        <form class="form-horizontal" style="margin-top:20px;" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="u_name" class="form-control " value="<?php echo $user_name; ?>" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mobile</label>
                                <div class="col-sm-8">
                                    <input type="text" name="u_name" class="form-control" value="<?php echo $user_mobile; ?>" required="required" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label ">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="u_pass" class="form-control " value="<?php echo $user_pass; ?>" required="required">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-sm-2 control-label ">Email</label>
                                <div class="col-sm-8 ">
                                    <input type="email" name="u_email" class="form-control" value="<?php echo $user_email; ?>" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">District</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="u_district" disabled="disabled">
                                        <option><?php echo $dist; ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="u_country" disabled="disabled">
                                        <option><?php echo $user_country; ?></option>
                                        <option>India</option>
                                        <option>Nepal</option>
                                        <option>United States</option>
                                        <option>Japan</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gender</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="u_gender" disabled="disabled">
                                        <option><?php echo $user_gender; ?></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control btn-warning" name="u_image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Birthday</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="u_bdate" value="<?php echo $user_bday; ?>">
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                            <button type="submit" name="update" class="btn btn-primary col-md-10 ">Update your Profile</button>
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
if(isset($_POST['update'])){
            $u_name = $_POST['u_name'];
            $u_pass = $_POST['u_pass'];
            $u_email = $_POST['u_email'];
            $u_bdate = $_POST['u_bdate'];
            $image_tmp = $_FILES['u_image']['tmp_name'];
            if(empty($u_image)){
                $u_image = $u_imagea;
            }
            else{
                $u_image = 'product_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
            }
            
            
            move_uploaded_file($image_tmp,"../images/user/$u_image");
            
    
              $update = "UPDATE users SET user_name='$u_name', user_pass='$u_pass', user_email='$u_email', user_image='$u_image',user_b_day='$u_bdate' WHERE user_id='$user_id'";
            
            $run = mysqli_query($con,$update);
            
            if($run){
                
            $get_media = "SELECT * FROM users WHERE user_image = '$u_image'";
                
            $media_query = mysqli_query($con,$get_media);
            $row_media = mysqli_fetch_array($media_query);
                
            $media_id = $row_media['user_id'];
            $media_name1 = $row_media['user_image'];
            
                if(file_exists("images/user/$u_image")){
                    if(rename("images/user/$u_image","images/user/$media_id.jpg")){
                        $update = "UPDATE users SET user_image='$media_id.jpg' WHERE user_image = '$media_name1'";
            
                        $run = mysqli_query($con,$update);
                    }
                    else{
                        echo "Error in rename";
                    }
                }
                else{
                    echo "File Not exist";
                }
                 echo"<script>alert('Welcome, You have Updated Succcessfully !')</script>";
                echo"<script>window.open('user.php','_self')</script>";

        }
}
?>