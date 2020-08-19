<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_mobile'])){
        header('Location:../admin.php');
     $_SESSION['user_mobile'];
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $del_id = $_GET['id'];
        if($_SESSION['user_mobile']== '8698642735'){
        $del_query = "DELETE FROM users WHERE user_id = '$del_id'";
            if(mysqli_query($con,$del_query)){
             echo"<script>alert('Successful Deleted !')</script>";
                echo"<script>window.open('user.php','_self')</script>";
            }
            else{
                 echo"<script>alert('Not Successful Deleted !')</script>";
            }
            }
    else{
         header('Location:index.php');
    }
        }

if(isset($_POST['submit'])){
       $ida = $id;
       $category = $_POST['category'];
      $insert_news = "update department set 
      dept_name = '$category' 
      where dept_id = '$ida'";
      $insert_pro = mysqli_query($con, $insert_news);
      if($insert_pro){
	   echo"<script>alert('Welcome, You have Updated Succcessfully !')</script>";
	   echo"<script>window.open('category.php','_self')</script>";
       }
    else{
        echo"Not";
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
                        <img src="images/logo.jpg" class="img-fluid shadow-light">
                        <hr>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12 table-responsive">
                        <h1 class="text-secondary">Users <small class="text-muted">Statistic Overview</small></h1>
                        <hr>
                        <div align="right">
                            <a href="addUser.php" class="btn btn-outline-primary">Add Product</a>
                            <hr>
                        </div>
                        <table class="table table-bordered table-condensed ">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sr</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Image</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Mail</th>
                                </tr>
                            </thead>
                            <?php
        
        $get_result = "SELECT * FROM users ORDER BY 1 DESC ";
        $run_result = mysqli_query($con,$get_result);
        $sr = 0;
        while($row_result=mysqli_fetch_array($run_result)){

        $user_id = $row_result['user_id'];
        $user_name = $row_result['user_name'];
        $user_mobile = $row_result['user_mobile'];
        $user_email = $row_result['user_email'];
        $user_pass = $row_result['user_pass'];
        $user_image = $row_result['user_image'];
        $class = $row_result['class'];
            
        
        $sr++;
        ?>
                            <tr>
                                <td><?php echo $sr; ?></td>
                                <td><?php echo ucfirst($user_name); ?></td>
                                <td>Class <?php echo $class; ?></td>
                                <td><img src="../images/user/<?php echo $user_image; ?>" width="100px;" class="img-responsive img-circle"></td>
                                <td><a href="view_user.php?id=<?php echo $user_id ;?>" class="btn btn-dark btn-sm a">View</a></td>
                                <td><a href="edit_user.php?id=<?php echo $user_id ;?>" class="btn btn-primary btn-sm a">Edit</a></td>
                                <td><a href="user.php?id=<?php echo $user_id ;?>" class="btn btn-danger btn-sm a">Delete</a></td>
                                <td><a href="user.php?mail=<?php echo $user_id ;?>" class="btn btn-secondary btn-sm a">Mail</a></td>

                            </tr>
                            <?php } ?>
                        </table>
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
    <?php
    if(isset($_GET['mail'])){
        $mail_id = $_GET['mail'];
        if($_SESSION['user_mobile']== '8698642735'){
        $userMail = "SELECT * FROM users WHERE user_id = '$mail_id'";
        $run_userMail = mysqli_query($con,$userMail);
        while($rowUser=mysqli_fetch_array($run_userMail)){
        $user_name = $rowUser['user_name'];
        $user_mobile = $rowUser['user_mobile'];
        $user_email = $rowUser['user_email'];
        $user_pass = $rowUser['user_pass'];
         $to = $user_email;
        $header = $user_name;
        $subject = "Your Details :";
        $message = "Hello" .$user_name. "Your password is ".$user_pass;  
        mail($to, $subject, $message, $header);  
        }
        }
    else{
         header('Location:index.php');
        }
    }
?>

    </html>
    <script>
        $(".table").DataTable();
    </script>