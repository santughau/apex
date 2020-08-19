<?php
ob_start();
session_start();
require_once('../inc/db.php');

if (isset($_POST['submit'])){
        
        echo $username = mysqli_real_escape_string($con,$_POST['username']);
       echo $password = mysqli_real_escape_string($con,$_POST['password']);
       
        $get_user = "SELECT * FROM users where user_name = '$username' AND user_pass = '$password'";
        $run_user = mysqli_query($con,$get_user);
        $check = mysqli_num_rows($run_user);
        
        if($check == 1){
             $_SESSION['user_name'] = $username;
             
            echo "<script>window.open('index.php','_self')</script>";
            
        }
        
                
        else {
            echo "<script>alert('Email Or Password is not correct !')</script>";
            
        }
        
        
        }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login | Gaurav</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="bpp/bpp.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
      

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <script src="js/jquery-1.11.1.min.js"></script>
	
	<script src="js/bootstrap.min.js"></script>
      
  </head>

  <body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1 class="bg-warning text-white text-center">Only For Vinay Computers</h1><hr>
                <form class="form-signin" action="" method="post">
        <h2 class="text-secondary">Please sign in</h2>
        <label  class="sr-only">Username</label>
        <input type="text"  class="form-control" name="username" placeholder="Username" required autofocus><br>
        <label  class="sr-only">Password</label>
        <input type="password" name="password"  class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <?php
                if(isset($error)){
                    echo "$error";
                    
                }  
            ?>
          </label>
        </div>
        
          <input type="submit" value="Sign In" name="submit" class="btn  btn btn-secondary btn-block">
        
      </form>
            </div>
            <div class="col-md-4"></div>
        </div>

      

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
