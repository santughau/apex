<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM review WHERE review_id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('review.php','_self')</script>";  
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
                    <div class="col-md-12">
                        <h1 class="text-center bg-secondary text-white">Send Messages</h1>
                        <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Select Batch</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="batch" name="batch" required style="border: 1px solid black;padding-left:10px;">
                                        <?php echo get_option_list('courses','course_id','course_name');?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary" name="selected">Select Batch</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered display" id="table2excel">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Batch</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                   $msg = "SELECT * FROM msg ORDER BY id DESC ";
                    $run_msg = mysqli_query($con, $msg);
                            $ia=0;
                            while($row_msg = mysqli_fetch_array($run_msg)){
                                $id = $row_msg['id'];
                                $studentId = $row_msg['studentId'];
                                $message = $row_msg['message'];
                                $date = $row_msg['date'];
                                
                                 $ia=$ia+1;
                                
                            $studentName = "SELECT * FROM student WHERE id = '$studentId' ";
                            $run_studentName = mysqli_query($con, $studentName);
                            $row_studentName = mysqli_fetch_array($run_studentName);

                            $name = $row_studentName['name'];
                            $class = $row_studentName['class'];
                            $image = $row_studentName['image'];
                            $batch = $row_studentName['batch'];
                                
                            $batchName = "SELECT * FROM courses WHERE course_id = '$batch' ";
                            $run_batchName = mysqli_query($con, $batchName);
                            $row_batchName = mysqli_fetch_array($run_batchName);

                            $batchname = $row_batchName['course_name'];
                
                ?>
                                <tr>
                                    <th scope="row"><?php echo $ia;?></th>
                                    <td><?php echo ucfirst($name); ?></td>
                                    <td>Class <?php echo $class; ?></td>
                                    <td><?php echo $batchname; ?></td>
                                    <td><img src="../images/student/<?php echo $image;?>" class="img-fluid" width="100px"></td>
                                    <td> <?php echo $date; ?></td>
                                    <td> <?php echo $message; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
    <!------------------View Product----------------------------------->
<script>
$(document).ready(function(){
    $('#table2excel').DataTable();
});
</script>
    <?php
  if(isset($_POST['selected'])){
       $batch = $_POST['batch']; 
      
       echo"<script>window.open('msglist.php?id=$batch','_self')</script>";
  } 
    
?>