<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_mobile'])){
        header('Location:../admin.php');
    echo $_SESSION['user_mobile'];
    }
require_once('inc/top.php');
 if(isset($_GET['e_id'])){
    $exam_name = $_GET['e_id'];
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
                        <table class="table table-bordered table-condensed">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sr</th>
                                    <th>Student Name</th>
                                    <th>Marks</th>
                                    <th>Exam date</th>
                                </tr>
                            </thead>
                            <?php
    $get_que = "SELECT * FROM result  WHERE  exam_name  = '$exam_name'   ";
    $run_que = mysqli_query($con,$get_que);
    $sr = 0;
    while ($row_option = mysqli_fetch_array($run_que)){
    $user_id = $row_option['user_id'];
    $exam_name = $row_option['exam_name'];
    $percent = $row_option['percent'];
    $exam_date = $row_option['exam_date'];
    $get_user = "SELECT * FROM users WHERE  user_id  = '$user_id' ";
    $run_user = mysqli_query($con,$get_user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $sr++;
    ?>
                            <tr>
                                <td><?php echo $sr;?></td>
                                <td><?php echo $user_name;?></td>
                                <td><?php echo $percent;?></td>
                                <td><?php echo $exam_date;?></td>
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