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
if(isset($_GET['examid'])){
    $examid = $_GET['examid'];
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
                        <h1 class="text-center bg-secondary text-white">Download Marksheet</h1>
                        <div id="product_table">
                            <table class="table table-bordered display" id="table2excel">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">BatchName</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Total marks</th>
                                        <th scope="col">Obtained marks</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $studentList = "SELECT * FROM student WHERE batch = '$id'  ";
                                        $runstudentList = mysqli_query($con, $studentList);
                                        $ia=0;
                                        while($rowstudentList = mysqli_fetch_array($runstudentList)){
                                            $name = $rowstudentList['name'];
                                            $batch = $rowstudentList['batch'];
                                            $classid = $rowstudentList['class'];
                                            $sid = $rowstudentList['id'];
                                
                                        $class= "SELECT * FROM exam WHERE id = '$examid' "; 
                                        $ruclass = mysqli_query($con, $class);
                                        $rowclass = mysqli_fetch_array($ruclass);
                        
                                        $date = $rowclass['date'];
                                        $subject = $rowclass['subject'];
                                        $totalMarks = $rowclass['totalMarks'];
                                            
                                        $batchname= "SELECT * FROM courses WHERE course_id = '$batch' "; 
                                        $rubatchname = mysqli_query($con, $batchname);
                                        $rowbatchname = mysqli_fetch_array($rubatchname);
                        
                                        $course_name = $rowbatchname['course_name'];
                                
               
                ?>
                                    <tr>
                                        <th scope="row"><?php echo $sid;?></th>
                                        <th scope="row"><?php echo $name;?></th>
                                        <td ><?php echo $batch; ?></td>
                                        <td><?php echo $classid; ?></td>
                                        <td ><?php echo $date; ?></td>
                                        <td ><?php echo $subject; ?></td>
                                        <td><?php echo $totalMarks; ?></td>
                                        <td></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <button type="button" class="btn btn-warning offset-md-4" id="but">Export to Excel</button>
                        <hr>

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


    <!----------------------------------------------------->

    <!------------------------------------------------------>
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
                filename: "batchlist.xls" //do not include extension
            });
        });
    </script>