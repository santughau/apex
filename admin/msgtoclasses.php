<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM category WHERE cat_id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('category.php','_self')</script>";  
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
                        <h1 class="text-center bg-secondary text-white">View all Complaints/Messages</h1>

                        <div id="product_table table-responsive">
                            <table class="table table-bordered display" id="table2excel">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Sr No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Batch</th>
                                        <th scope="col">Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                   $message = "SELECT * FROM msgtoclasses ";
                    $runmessage = mysqli_query($con, $message);
                            $ia=0;
                            while($rowmessage = mysqli_fetch_array($runmessage)){
                                $id = $rowmessage['id'];
                                $studentId = $rowmessage['studentId'];
                                $date = $rowmessage['date'];
                                $msgToClass = $rowmessage['msgToClass'];

                                 $ia=$ia+1;
                ?>
                                    <tr>
                                        <th><?php echo $ia;?></th>
                                        <th><?php echo $date;?></th>
                                        <td><?php echo ucfirst($studentId); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <th><?php echo $msgToClass;?></th>

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
                filename: "customer_name.xls" //do not include extension
            });
        });
    </script>