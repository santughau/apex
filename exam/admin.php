<?php 
session_start();
$page_title = "Login Page ";
$page_key = "";
$page_desc = "";
include('inc/top.php');
?>
<!-- Start from here-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">Apex Acadamy</a>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row" style="margin-top:10px;">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">Admin Login</h4><hr>
                    <hr>
                    <form method="post" action="">
                        <div class="form-group">
                            <input name="mobile" class="form-control"  placeholder="Enter Mobile No" type="text"  required>
                        </div>
                        <!-- form-group// -->
                        <div class="form-group">
                            <input class="form-control" name="password" placeholder="******" type="password" required>
                        </div>
                        <!-- form-group// -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" name="login"> Login  </button>
                                </div>
                                <!-- form-group// -->
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="small" href="forget.php">Forgot password?</a>
                            </div>
                        </div>
                        <!-- .row// -->
                    </form>
                </article>
            </div>
        </div>
    </div>
    <hr>
    <!--------------------Footer---------------------------------->
    <div class="container-fluid">
        <div class="row bg-dark" style="padding-top:20px;">
            <?php include('inc/footer.php');?>
        </div>
    </div>
    <!--------------------Footer---------------------------------->
    <?php 
       if (isset($_POST['login'])){
        $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
        $pass = mysqli_real_escape_string($con,$_POST['password']);
        
        
        if($mobile == '8698642735' AND  $pass == 'ranjana'){
             $_SESSION['user_mobile'] = '8698642735';
            echo "<script>window.open('admin/index.php','_self')</script>";
        }
        else {
            echo "<script>alert('Email Or Password is not correct !')</script>";
        }
        }
?>