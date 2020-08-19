<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');

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
                        <h2 class="text-center text-white bg-primary">Create Exam</h2>
                        <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">For Class</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="class" id="class" required>
                                        <?php 
                                            for($i=1; $i<=10; $i++){
                                             echo "<option value='$i'>Class $i </option>"; 
                                            } 
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">For Batch</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="batch" id="batch" required>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Subject</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Duration Here" name="subject" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Total Marks</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Duration Here" name="tmarks" required>
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Exam Date</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="date" placeholder="Choose Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="submit">Add Exam</button>
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
    <script>
        $(function() {
            $('.datepicker').datepicker();
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker({
                language: 'pt-BR'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#class').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "fetchbatch.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "text",
                    success: function(data) {
                        $('#batch').html(data);
                    }
                });
            });
        });
    </script>
    <?php
  if(isset($_POST['submit'])){
       $class = $_POST['class'];
       $batch = $_POST['batch'];
       $tmarks = $_POST['tmarks'];
       $date = $_POST['date'];
       $subject = $_POST['subject'];
     
      
      $insert_news = "INSERT INTO exam (batchName,date,subject,totalMarks,class) VALUES ('$batch','$date','$subject','$tmarks','$class')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
          
	   echo"<script>alert('Welcome, You have added a new Exam !')</script>";
	   echo"<script>window.open('exam.php','_self')</script>";
        }
  } 
    
?>