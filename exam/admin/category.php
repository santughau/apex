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
        $del_query = "DELETE FROM department WHERE dept_id = '$del_id'";
            if(mysqli_query($con,$del_query)){
             echo"<script>alert('Successful Deleted !')</script>";
                echo"<script>window.open('category.php','_self')</script>";
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
        $category = $_POST['category'];
        $insert_data = "INSERT INTO `department` ( `dept_name`) VALUES ('$category')";
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
                                <input type="text" class="form-control" placeholder="Add Category" name="category">
                            </div>
                            <button type="submit" class="btn btn-primary col-md-offset-4" name="submit">Add Category</button>
                        </form>
                    </div>
                    <div class="col-md-8 table-responsive">
                        <h1 class="text-secondary">Category <small class="text-muted">Statistic Overview</small></h1>
                        <hr>
                        <table class="table table-bordered table-condensed ">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sr</th>
                                    <th>Category Name</th>
                                    <th>No Of Exams</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <?php
        $get_result = "SELECT * FROM department ORDER BY 1 DESC";
        $run_result = mysqli_query($con,$get_result);
        $sr = 0;
        while($row_result=mysqli_fetch_array($run_result)){

        $dept_id = $row_result['dept_id'];
        $dept_name = $row_result['dept_name'];
            
        $get_exam = "SELECT * FROM exam  WHERE dept_id = '$dept_id'";
        $run_exam = mysqli_query($con,$get_exam);
        $total_exam = mysqli_num_rows($run_exam);
        
        $sr++;
        ?>
                            <tr>
                                <td><?php echo $sr; ?></td>
                                <td><?php echo ucfirst($dept_name); ?></td>
                                <td><?php echo $total_exam ?></td>
                                <td><a href="edit_category.php?id=<?php echo $dept_id ;?>" class="btn btn-success btn-sm a">Edit</a></td>
                                <td><a href="category.php?id=<?php echo $dept_id ;?>" class="btn btn-danger btn-sm a">Delete</a></td>
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
    <script>
        $(".table").DataTable();
    </script>