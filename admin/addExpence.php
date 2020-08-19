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
                        <h2 class="text-center text-white bg-primary">Add Expenses</h2><hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Particular</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Particular here" name="particular" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Amount</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Amount Here" name="amt" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Date</label>
                                <div class="col-sm-10">
                                   
                                    <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="date" placeholder="Choose Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="submit">Add Expenses</button>
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
    <?php
  if(isset($_POST['submit'])){
      $particular = $_POST['particular'];
      $amt = $_POST['amt'];
       $date = $_POST['date'];
     
      $insert_news = "INSERT INTO expenses (date,particular,amt) VALUES ('$date','$particular','$amt')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
          
	   echo"<script>alert('Welcome, You have added a new Expenses !')</script>";
	   echo"<script>window.open('expenses.php','_self')</script>";
        }
  } 
    
?>