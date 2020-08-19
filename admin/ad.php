<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM advertise WHERE ad_id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('ad.php','_self')</script>";  
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
                    <img src="images/logo.jpg" class="img-fluid shadow-light"><hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <h1 class="text-center bg-secondary text-white">View all Advertisements</h1>
                    <div align="right">
                    <a href="addAdv.php" class="btn btn-outline-primary" >Add Advertisement</a><hr>
                    </div>
                    <div id="product_table">
                     <table class="table table-bordered  table-responsive" id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Date</th>
                          <th scope="col">Adv. Name</th>
                          <th scope="col">Mobile</th>
                          <th scope="col">Type</th>
                          <th scope="col">Description</th>
                          
                          <th scope="col"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</th>
                          <th scope="col"><i class="fa fa-trash-o" aria-hidden="true"></i>
</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                   $adv = "SELECT * FROM advertise ORDER BY ad_id DESC ";
                    $runAdv = mysqli_query($con, $adv);
                            $i=0;
                            while($rowAdv = mysqli_fetch_array($runAdv)){
                                $ad_id = $rowAdv['ad_id'];
                                $ad_date = $rowAdv['ad_date'];
                                $ad_desc = $rowAdv['ad_desc'];
                                $ad_name = $rowAdv['ad_name'];
                                $ad_mobile = $rowAdv['ad_mobile'];
                                $ad_type = $rowAdv['ad_type'];
                                $i++;
                     $cat = "SELECT * FROM adtype WHERE adType_id = '$ad_type' ";
                     $run_cat = mysqli_query($con, $cat);
                     $row_cat = mysqli_fetch_array($run_cat);
                     $adType_id = $row_cat['adType_id'];
                     $adType_name = $row_cat['adType_name'];
                                
                                
                ?> 
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $ad_date; ?></td>
                          <td><?php echo ucfirst($ad_name); ?></td>
                          <td><?php echo $ad_mobile; ?></td>
                          <td><?php echo $adType_name; ?></td>
                          <td><?php echo $ad_desc;?></td>
                          
                          <td><a href="editAd.php?id=<?php echo $ad_id;?>" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                          <td><a href="ad.php?del=<?php echo $ad_id;?>" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                          
                            
                            
                          
                        </tr>
                     <?php } ?>   
                      </tbody>
                    </table><hr>
                    </div>
                    <button type="button" class="btn btn-warning offset-md-4" id="but">Export to Excel</button><hr>
                    
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
CKEDITOR.replace( 'post-data' ); 
</script>
<script>
$(document).ready(function(){
    $('#table2excel').DataTable();
});
</script>
<script>
$("#but").click(function(){
  $("#table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "customer_name.xls" //do not include extension
  }); 
});
</script>






