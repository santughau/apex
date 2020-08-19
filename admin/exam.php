<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM exam WHERE cid = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('exam.php','_self')</script>";  
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
                        <h1 class="text-center bg-secondary text-white">View all Exams</h1>
                        <div align="right">
                            <a href="addExam.php" class="btn btn-outline-primary">Add Exams</a>
                            <hr>
                        </div>
                        <div id="product_table">
                            <table class="table table-bordered display" id="table2excel">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Sr No</th>
                                        <th scope="col">BatchName</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Total marks</th>
                                        <th scope="col"><i class="fa fa-download" aria-hidden="true"></i>
                                        </th>
                                        <th scope="col"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                   $exam = "SELECT * FROM exam ORDER BY id DESC ";
                    $runexam = mysqli_query($con, $exam);
                            $ia=0;
                            while($rowexam = mysqli_fetch_array($runexam)){
                                $id = $rowexam['id'];
                                $batchName = $rowexam['batchName'];
                                $date = $rowexam['date'];
                                $subject = $rowexam['subject'];
                                $totalMarks = $rowexam['totalMarks'];
                                $ia=$ia+1;
                                
                          $class= "SELECT * FROM courses WHERE course_id = '$batchName' "; 
                          $ruclass = mysqli_query($con, $class);
                          $rowclass = mysqli_fetch_array($ruclass);
                        
                            $course_name = $rowclass['course_name'];
                            $class = $rowclass['class'];
                                
               
                ?>
                                    <tr>
                                        <th scope="row"><?php echo $ia;?></th>
                                        <td><?php echo $course_name; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $subject; ?></td>
                                        <td><?php echo $totalMarks; ?></td>
                                        <td><a href="csv.php?id=<?php echo $batchName;?>&examid=<?php echo $id;?>" class="btn btn-warning"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                        <td><a href="exam.php?del=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <button type="button" class="btn btn-warning offset-md-4" id="but">Export to Excel</button>
                        <hr>
                        <h2 class="text-center text-white bg-primary">Upload Excel File for Result</h2><hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Upload Excel File </label>
                                <div class="col-sm-4">
                                    <input type="file" class=" btn btn-secondary" name="u_image" required>
                                </div>
                                <div class="col-sm-4">
                                     <button type="submit" class="btn btn-primary" name="upload">Upload Excel</button>
                                </div>
                            </div>
                        </form>
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
                filename: "customer_name.xls" //do not include extension
            });
        });
    </script>
<?php
    if(isset($_POST['upload'])){
        $u_image = $_FILES['u_image']['name'];
        $image_tmp = $_FILES['u_image']['tmp_name'];  
            
        move_uploaded_file($image_tmp,"$u_image");
        include ("PHPExcel/IOFactory.php");
        $objPHPExcel = PHPExcel_IOFactory::load('batchlist.xls');
        foreach($objPHPExcel->getWorksheetIterator() as $worksheet){
	   $highestRow = $worksheet->getHighestRow();
	   for($row=2; $row<=$highestRow; $row++){
		$student_id = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0,$row)->getValue());
		$batchId = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2,$row)->getValue());
		$classId = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
		$date = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
		$subject = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(5,$row)->getValue());
		$tmarks = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(6,$row)->getValue());
		$omarks = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(7,$row)->getValue());
		
		$sql = "INSERT INTO result(studentId,batchId,classId,date,subject,totalMarks,obtainmark) VALUES('".$student_id."','".$batchId."','".$classId."','".$date."','".$subject."','".$tmarks."','".$omarks."')";
		mysqli_query($con,$sql);
	}
}
          
    }
?>