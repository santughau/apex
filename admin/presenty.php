<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
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
                            <h2 class="text-white text-center bg-primary">Student Details Attendance</h2>
                            <hr>
                        <a href="course.php"class="btn btn-secondary">Back To Home</a><hr>
                    </div>
                </div>
                <div class="row">
                    <?php
                            $student = "SELECT * FROM attendance WHERE studentId = '$id' order by attId DESC";
                            $run_student = mysqli_query($con, $student);

                            while($row_student = mysqli_fetch_array($run_student)){
                                    $studentId = $row_student['studentId'];
                                    $attendance = $row_student['attendance'];
                                    $date = $row_student['date'];
                                $date = date('Y-m-d', strtotime($date));
                    ?>
                    <div class="col-md-2" style="border:1px solid gray; ">
                    <p><?php echo $date;?> 
                        <small class="<?php echo ($attendance == "Present") ? "text-primary" : "text-danger"; ?>"><?php echo $attendance;?></small></p>
                    </div>
                   <?php } ?>
                   
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


    <!----------------------------------------------------->

    <!------------------------------------------------------>
    <script>
        $(document).ready(function() {
            $('#selectallboxes').click(function(event) {
                if (this.checked) {
                    $('.checkboxes').each(function() {
                        this.checked = true;
                    })
                } else {
                    $('.checkboxes').each(function() {
                        this.checked = false;
                    })
                }
            });
        });
    </script>
    <script>
        CKEDITOR.replace('post-data');
    </script>
    <script>
        $(document).ready(function() {
            $('#table2excel').DataTable();
        });
    </script>
    <script>
        $("#but").click(function() {
            $("#table2excel").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "customer_name.xls" //do not include extension
            });
        });
    </script>