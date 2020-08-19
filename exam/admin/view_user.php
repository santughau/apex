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
                    <div class="col-md-6 table-responsive">
                        <h1 class="text-secondary">Questions <small class="text-muted">Statistic Overview</small></h1>
                        <hr>
                          <?php
                            $user_id = $_GET['id'];
                            $select = "SELECT * FROM users WHERE user_id='$user_id'";
                            $run = mysqli_query($con,$select);
                            $row = mysqli_fetch_array($run);

                            $id= $row['user_id'];
                            $image= $row['user_image'];
                            $name= ucfirst($row['user_name']);
                            $country= $row['user_country'];
                            $gender= $row['user_gender'];
                            $last_login= $row['last_login'];
                            $register_date= $row['register_date'];
                            $birthday_date= $row['user_b_day'];
                            $email= $row['user_email'];
                            $class= $row['class'];
                            $user_mobile= $row['user_mobile'];
                            $user_pass= $row['user_pass'];
                            ?>
            <table class="table table-bordered table-condensed ">
                <tbody>
                    <tr class="info">
                        <th class="bg-dark text-white">Name</th>
                        <th><?php echo $name;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Gender</th>
                        <th><?php echo $gender;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Country</th>
                        <th><?php echo $country;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Birthday</th>
                        <th><?php echo $birthday_date;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">E-mail</th>
                        <th><?php echo $email;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Class</th>
                        <th><?php echo $class;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Mobile</th>
                        <th><?php echo $user_mobile;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Password</th>
                        <th><?php echo $user_pass;?></th>
                    </tr>
                </tbody>
            </table>
                    </div>
                    <div class="col-md-4">
                    <div class="card card-testimonial text-center">
                        <div class="card-header red accent-3 ">
                            <img src="../images/user/<?php echo $image;?>" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title mt-5"><?php echo $name;?></h4>
                            <hr>
                            <p class="card-text"><br><br> </p>
                            <a href="#" class="btn twitter btn-circle white-text"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn facebook btn-circle white-text"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn google-plus btn-circle white-text"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
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