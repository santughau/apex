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
            
            if($bulk_option == 'sendMsg'){
                 $msg = $_POST['post-data'];
                 $insert = "INSERT INTO msg (studentId,message,date) VALUES ('$user_id','$msg',NOW())";
      
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
                    <div class="col-md-12">
                        <h1 class="text-center bg-secondary text-white">Send Messages</h1>
                        <hr>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Write Message Here.....</label>
                                        <textarea class="form-control" rows="3" name="post-data"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <select name="bulk-options" id="" class="form-control" style="border:1px solid black;">
                                            <option value="">Please Select</option>
                                            <option value="sendMsg">Send Message</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <input type="submit" class="btn btn-warning" value="Apply" onClick="javascript: return confirm('Please confirm to Send ')" ;>
                                </div>
                            </div>
                            <table class="table table-bordered " id="table2excel">
                                <thead class="thead-dark">
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th scope="col">Sr No</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Batch</th>
                                        <th scope="col">Image</th>
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
                                        <td>Class <?php echo $class; ?></td>
                                        <td><?php echo $course_name; ?></td>
                                        <td><img src="../images/student/<?php echo $image;?>" class="img-fluid" width="100px"></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <hr>
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
    <script>
        CKEDITOR.replace('post-data');
    </script>
    <script>
        $(document).ready(function() {
            $('#table2excel').DataTable();
        });
    </script>
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
    <?php
  if(isset($_POST['selected'])){
       $batch = $_POST['batch']; 
      
       echo"<script>window.open('msglist.php?id=$batch','_self')</script>";
  } 
    
?>