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
                        <h2 class="text-center text-white bg-primary">Statics OverView of Apex Acadamy</h2><hr>
                    </div>
                    <div class="col-md-3 ">
                        <div class="card text-primary border-primary">
                            <div class="card-header bg-primary text-white">Students</div>
                            <div class="card-body">
                                <table class="table table-bordered table-condensed ">
                                    <tbody>
                                        <?php
                                for($i=1; $i<=10; $i++){
                                    $student = "SELECT * FROM student WHERE class = '$i'";
                                    $student_run = mysqli_query($con,$student);
                                    $row_student = mysqli_num_rows($student_run);
                                ?>
                                        <tr class="info">
                                            <th class="bg-dark text-white">Class <?php echo  $i;?>:</th>
                                            <th> <?php echo $row_student;?> </th>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card text-primary border-warning">
                            <div class="card-header bg-warning text-white">Total Fee Collected</div>
                            <div class="card-body">
                                <table class="table table-bordered table-condensed ">
                                    <tbody>
                                        <?php
                                    $studentTotalFee = "SELECT * from student ";
                                    $runstudentTotalFee = mysqli_query($con, $studentTotalFee);
                                    $studentTotalFee=0;
                                    $Totalfeesa=0;
                                    while($rowstudentTotalFee = mysqli_fetch_array($runstudentTotalFee)){
                                        $studentTotalFee = $rowstudentTotalFee['fee'];
                                        $Totalfeesa += $studentTotalFee;
                                    }
                                
                                    $feea = "SELECT * FROM fee ";
                                    $run_fee = mysqli_query($con, $fee);
                                    $fees=0;
                                    $feesa=0;
                                    while($row_fee = mysqli_fetch_array($run_fee)){
                                        $fees = $row_fee['fees'];
                                        $feesa += $fees;
                                    }
                                    
                                ?>
                                        <tr class="info">
                                            <th class="bg-dark text-white">Total Fees</th>
                                            <th>Rs <?php echo $Totalfeesa;?> </th>
                                        </tr>
                                        <tr class="info">
                                            <th class="bg-dark text-white">Collected Fees</th>
                                            <th>Rs <?php echo $feesa;?> </th>
                                        </tr>
                                        <tr class="info">
                                            <th class="bg-danger text-white">Remaining Fees</th>
                                            <th>Rs <?php echo $Totalfeesa-$feesa;?> </th>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <hr>
                        <div class="card text-primary border-secondary">
                            <div class="card-header bg-secondary text-white">Balance Cash</div>
                            <div class="card-body">
                                <table class="table table-bordered table-condensed ">
                                    <tbody>
                                        <?php
                                    $expenses = "SELECT * from expenses ";
                                    $runsexpenses = mysqli_query($con, $expenses);
                                    $expAmt=0;
                                    $Totalexp=0;
                                    while($rowexpenses = mysqli_fetch_array($runsexpenses)){
                                        $expAmt = $rowexpenses['amt'];
                                        $Totalexp += $expAmt;
                                    }
                                ?>
                                        <tr class="info">
                                            <th class="bg-dark text-white">Collected Fees</th>
                                            <th>Rs <?php echo $feesa;?> </th>
                                        </tr>

                                        <tr class="info">
                                            <th class="bg-dark text-white">Expence</th>
                                            <th>Rs <?php echo $Totalexp;?> </th>
                                        </tr>
                                        <tr class="info">
                                            <th class="bg-danger text-white">Remaining Balance</th>
                                            <th>Rs <?php echo $feesa-$Totalexp;?> </th>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 ">
                        <div class="card text-primary border-danger">
                            <div class="card-header bg-danger text-white">Expenses <small> ( Last 10 Expenses )</small></div>
                            <div class="card-body">
                                <table class="table table-bordered table-condensed ">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Sr No</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Particular</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $expenses = "SELECT * from expenses ORDER BY id DESC LIMIT 10";
                                    $runsexpenses = mysqli_query($con, $expenses);
                                    $ia=0;
                                    while($rowexpenses = mysqli_fetch_array($runsexpenses)){
                                        $expAmt = $rowexpenses['amt'];
                                        $particular = $rowexpenses['particular'];
                                        $date = $rowexpenses['date'];
                                        $ia=$ia+1;
                                ?>
                                        <tr class="info">
                                            <td ><?php echo $ia; ?></td>
                                            <td ><?php echo $date; ?></td>
                                            <td>Rs <?php echo $expAmt;?> </td>
                                            <td><?php echo $particular;?> </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
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