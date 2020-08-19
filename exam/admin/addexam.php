<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_mobile'])){
        header('Location:../admin.php');
    echo $_SESSION['user_mobile'];
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $del_id = $_GET['id'];
        if($_SESSION['user_mobile']== '8698642735'){
        $del_query = "DELETE FROM exam WHERE exam_id = '$del_id'";
            if(mysqli_query($con,$del_query)){
             echo"<script>alert('Successful Deleted !')</script>";
                echo"<script>window.open('addexam.php','_self')</script>";
            }
            else{
                 echo"<script>alert('Not Successful Deleted !')</script>";
            }
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
                    <div class="col-md-4">
                        <?php
    if(isset($_POST['submit'])){
        $exam = $_POST['exam'];
        $cate = $_POST['cate'];
        $insert_data = "INSERT INTO `exam` ( `exam_name`,`dept_id`) VALUES ('$exam','$cate')";
        $run = mysqli_query($con,$insert_data);
        if($run){
            echo "<script>alert('Category has been added!')</script>";
        }
        else{
          echo "<script>alert('Category has not been added!')</script>";  
        }
    }
?>
                        <form action="" method="post" style="padding-top:20px; padding-bottom:20px;" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Add Exam" name="exam">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="cate">
                                    <?php echo get_option_list('department','dept_id','dept_name');?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary col-md-offset-4" name="submit">Add Exam</button>
                        </form>
                    </div>
                    <div class="col-md-8 table-responsive">
                        <h1 class="text-secondary">Add Exam <small class="text-muted">Statistic Overview</small></h1>
                        <hr>
                        <table class="table table-bordered table-condensed ">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sr</th>
                                    <th>Exam Name</th>
                                    <th>No Of Que</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Mail</th>
                                </tr>
                            </thead>
                            <?php
        $get_result = "SELECT * FROM exam ORDER BY 1 DESC";
        $run_result = mysqli_query($con,$get_result);
        $sr = 0;
        while($row_result=mysqli_fetch_array($run_result)){
        $exam_id = $row_result['exam_id'];
        $dept_id = $row_result['dept_id'];
        $exam_name = $row_result['exam_name'];
        $get_exam = "SELECT * FROM questions  WHERE exam_id = '$exam_id'";
        $run_exam = mysqli_query($con,$get_exam);
        $total_exam = mysqli_num_rows($run_exam);
        $get_cat = "SELECT * FROM department  WHERE dept_id = '$dept_id'";
        $run_cat = mysqli_query($con,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_name  =  $row_cat['dept_name'];
        $sr++;
        ?>
                            <tr>
                                <td>
                                    <?php echo $sr; ?>
                                </td>
                                <td>
                                    <?php echo$exam_name; ?>
                                </td>
                                <td>
                                    <?php echo $total_exam; ?>
                                </td>
                                <td>
                                    <?php echo $cat_name; ?>
                                </td>
                                <td><a href="edit_exam.php?id=<?php echo $exam_id ;?>" class="btn btn-success btn-sm a">Edit</a></td>
                                <td><a href="addexam.php?id=<?php echo $exam_id ;?>" class="btn btn-danger btn-sm a">Delete</a></td>
                                <td><a href="addexam.php?mail=<?php echo $exam_id ;?>" class="btn btn-secondary btn-sm a">Mail</a></td>
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

    </html>
    <?php
if(isset($_GET['mail'])){
        $mail_id = $_GET['mail'];
        if($_SESSION['user_mobile']== '8698642735'){
        $exName = "SELECT * FROM exam WHERE exam_id = '$mail_id'";
        $run_exName = mysqli_query($con,$exName);
        $rowExam=mysqli_fetch_array($run_exName);
        $exam_name = $rowExam['exam_name'];
        $userMail = "SELECT * FROM users";
        $run_userMail = mysqli_query($con,$userMail);
        while($rowUser=mysqli_fetch_array($run_userMail)){
        $user_name = $rowUser['user_name'];
        $user_mobile = $rowUser['user_mobile'];
        $user_email = $rowUser['user_email'];
         $to = $user_email;
        $header = $exam_name;
        $subject = "New Exam are added : $exam_name";
        $message = "New Exam Added Please Login and Test it. ";  
        mail($to, $subject, $message, $header);  
        }
        }
    else{
         header('Location:index.php');
        }
    }
?>
    <script>
        $(".table").DataTable();
    </script>