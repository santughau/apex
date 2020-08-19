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
                        <form action="" method="post" style="padding-top:20px; padding-bottom:20px;" enctype="multipart/form-data">
                            <div class="form-group">
                                <h3 class="bg-danger">Add Question</h3>
                                <textarea class="form-control" rows="1" name="content"></textarea>
                            </div>

                            <div class="form-group">
                                <h3 class="bg-primary">Option A</h3>
                                <textarea class="form-control" rows="3" name="optiona"></textarea>
                            </div>

                            <div class="form-group">
                                <h3 class="bg-primary">Option B</h3>
                                <textarea class="form-control" rows="3" name="optionb"></textarea>
                            </div>

                            <div class="form-group">
                                <h3 class="bg-primary">Option C</h3>
                                <textarea class="form-control " rows="3" name="optionc"></textarea>
                            </div>

                            <div class="form-group">
                                <h3 class="bg-primary">Option D</h3>
                                <textarea class="form-control" rows="3" name="optiond"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="bg-primary">Answer</label>
                                <select class="form-control" name="ans">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary col-md-offset-4" name="submit">Add Question</button>
                        </form>

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
    <?php
    if(isset($_POST['submit'])){
        $question = $_POST['content'];
        $optionA = $_POST['optiona'];
        $optionB = $_POST['optionb'];
        $optionC = $_POST['optionc'];
        $optionD = $_POST['optiond'];
        $ans = $_POST['ans'];
        
          $insert_data = "INSERT INTO `questions` ( `exam_id`, `text`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `ans`) VALUES ('$exam_id', '$question', '$optionA', '$optionB', '$optionC', '$optionD', '$ans')";
        
         $run = mysqli_query($con,$insert_data);
        if($run){
        echo "<script>alert('Question Saved')</script>";
        }
        else{
          echo "<script>alert('Not Saved')</script>";  
        }
        
    }
?>

    <script>
        CKEDITOR.replace('optiona');
    </script>
    <script>
        CKEDITOR.replace('optionb');
    </script>
    <script>
        CKEDITOR.replace('optionc');
    </script>
    <script>
        CKEDITOR.replace('optiond');
    </script>
    <script>
        CKEDITOR.replace('content');
    </script>