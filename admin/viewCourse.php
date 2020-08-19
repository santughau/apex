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

if(isset($_POST['checkboxes'])){
        foreach($_POST['checkboxes'] as $user_id){
            $bulk_option = $_POST['bulk-options'];
            
            if($bulk_option == 'present'){
                 $insert = "INSERT INTO attendance (studentId,attendance,date) VALUES ('$user_id','Present',NOW())";
      
                $insert_pro = mysqli_query($con,$insert);
                
            }
            
            if($bulk_option == 'absent'){
                $insert = "INSERT INTO attendance (studentId,attendance,date) VALUES ('$user_id','Absent',NOW())";
      
                $insert_pro = mysqli_query($con,$insert);
               
                
            }
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
                        <form action="" method="post">
                            <h2 class="text-white text-center bg-primary">Batchwise Student List</h2>
                            <hr>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <select name="bulk-options" id="" class="form-control" style="border:1px solid black;">
                                            <option value="">Please Select</option>
                                            <option value="present">Present</option>
                                            <option value="absent">Absent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <input type="submit" class="btn btn-warning" value="Apply" onClick="javascript: return confirm('Please confirm to Send ')";>
                                </div>
                            </div>
                            <table class="table table-bordered " id="table2excel">
                                <thead class="thead-dark">
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th scope="col">Sr No</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">School</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Batch</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Fees Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                   $student = "SELECT * FROM student WHERE batch = '$id' ";
                    $run_student = mysqli_query($con, $student);
                            $ia=0;
                            while($row_student = mysqli_fetch_array($run_student)){
                                $id = $row_student['id'];
                                $name = $row_student['name'];
                                $class = $row_student['class'];
                                $batch = $row_student['batch'];
                                $image = $row_student['image'];
                                $gender = $row_student['gender'];
                                $mobile = $row_student['mobile'];
                                $school = $row_student['school'];
                                $subject = $row_student['subject'];
                                $cexam = $row_student['cexam'];
                                $address = $row_student['address'];
                                
                                 $ia=$ia+1;
                                
                            $courses = "SELECT * FROM courses WHERE course_id = '$batch' ";
                            $run_courses = mysqli_query($con, $courses);
                            $row_courses = mysqli_fetch_array($run_courses);

                            $course_id = $row_courses['course_id'];
                            $course_name = $row_courses['course_name'];
                
                ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"></td>
                                        <th scope="row"><?php echo $ia;?></th>
                                        <td><a href="presenty.php?id=<?php echo $id;?>" class=""><?php echo ucfirst($name); ?></a></td>
                                        <td><?php echo $school; ?></td>
                                        <td><?php echo ucfirst($gender); ?></td>
                                        <td>Class <?php echo $class; ?></td>
                                        <td><?php echo $course_name; ?></td>
                                        <td><img src="../images/student/<?php echo $image;?>" class="img-fluid" width="100px"></td>
                                        <td>Fee</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                        </form>
                    </div>
                    <button type="button" class="btn btn-warning offset-md-4 mb-5" id="but">Export to Excel</button>
                    <hr><br><br>
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