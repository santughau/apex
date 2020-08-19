<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_mobile'])){
        header('Location:../admin.php');
    echo $_SESSION['user_mobile'];
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $id = $_GET['id'];
        if($_SESSION['user_mobile']== '8698642735'){
        $get_teacher = "SELECT * FROM department WHERE dept_id = '$id'";
        $run_teacher = mysqli_query($con,$get_teacher);
	    $row_teacher = mysqli_fetch_array($run_teacher);
         $dept_name = $row_teacher['dept_name'];
            }
    else{
         header('Location:index.php');
    }
        }
 if(isset($_GET['e_id'])){
    $exam_id = $_GET['e_id'];
    
     $select_exam = "DELETE FROM `exam` WHERE `exam`.`exam_id` = $exam_id";
    $run_exam = mysqli_query($con,$select_exam);
    if($run_exam){
        
    
        
    $select_q = "DELETE FROM `questions` WHERE `questions`.`exam_id` = $exam_id";
    $run_q = mysqli_query($con,$select_q);
    if($run_q){
        header("location:addquestion.php");
    }
        else{
            echo "not";
        }
    }
        else{
            echo "not";
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
                        <h1 class="text-secondary">Questions <small class="text-muted">Statistic Overview</small></h1>
                        <hr>
                        <table class="table table-bordered table-condensed ">
                            <thead class="table-dark">
                                <tr class="info">
                                    <th>Sr</th>
                                    <th>Exam Name</th>
                                    <th>Total Question</th>
                                    <th>Add Question</th>
                                    <th>View Question</th>
                                    <th>View Toppers</th>
                                    <th>Delete </th>
                                </tr>
                            </thead>
                            <?php
                $get_option = "SELECT * FROM exam ORDER BY exam_name ASC";
                $run_option = mysqli_query($con,$get_option);
                //$total_que = mysqli_num_rows($run_option);
                $sr = 0;
                while ($row_option = mysqli_fetch_array($run_option)){
                $exam_id = $row_option['exam_id'];
                $exams_name = $row_option['exam_name'];
                $exam_name = $row_option['exam_name'];
                $sr++;
                $get_que = "SELECT * FROM questions WHERE exam_id = '$exam_id' ";
                $run_que = mysqli_query($con,$get_que);
                $total_que = mysqli_num_rows($run_que);    
                    
                ?>
                            <tr>
                                <td><?php echo $sr;?></td>
                                <td><?php echo $exam_name;?></td>
                                <td><?php echo $total_que ;?></td>
                                <td><a href="question.php?e_id=<?php echo $exam_id;?>" class="btn btn-primary btn-xs">Add </a></td>
                                <td><a href="viewquestion.php?e_id=<?php echo $exam_id;?>" class="btn btn-info btn-xs">View </a></td>
                                <td><a href="viewtoppers.php?e_id=<?php echo $exams_name;?>" class="btn btn-warning btn-xs">View </a></td>
                                <td><a href="addquestion.php?e_id=<?php echo $exam_id;?>" class="btn btn-danger btn-xs">Delete </a></td>
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