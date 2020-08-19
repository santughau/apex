<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_mobile'])){
        header('Location:../admin.php');
    echo $_SESSION['user_mobile'];
    }
require_once('inc/top.php');

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

                    <div class="col-md-12 table-responsive">
                        <h1 class="text-secondary">Questions <small class="text-muted">Statistic Overview</small></h1>
                        <hr>
                        <table class="table table-bordered table-condensed">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sr</th>
                                    <th>Question</th>
                                    <th>Option A</th>
                                    <th>Option B</th>
                                    <th>Option C</th>
                                    <th>Option D</th>
                                    <th>Ans </th>

                                </tr>
                            </thead>
                            <?php
    
    $get_que = "SELECT * FROM questions WHERE exam_id = '$exam_id' ";
    $run_que = mysqli_query($con,$get_que);
    $sr = 0;
    while ($row_option = mysqli_fetch_array($run_que)){
    $exam_id = $row_option['exam_id'];
    $question = $row_option['text'];
    $opt_a = $row_option['opt_a'];
    $opt_b = $row_option['opt_b'];
    $opt_b = $row_option['opt_b'];
    $opt_c = $row_option['opt_c'];
    $opt_d = $row_option['opt_d'];
    $ans = $row_option['ans'];
    $sr++;
    ?>
                            <tr>
                                <td>
                                    <?php echo $sr;?>
                                </td>
                                <td>
                                    <?php echo $question;?>
                                </td>
                                <td>
                                    <?php echo $opt_a;?>
                                </td>
                                <td>
                                    <?php echo $opt_b;?>
                                </td>
                                <td>
                                    <?php echo $opt_c;?>
                                </td>
                                <td>
                                    <?php echo $opt_d;?>
                                </td>
                                <td>
                                    <?php echo $ans;?>
                                </td>
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