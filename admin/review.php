<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM review WHERE review_id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('review.php','_self')</script>";  
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
                  <h1 class="text-center bg-secondary text-white">View all Review</h1>
                
                    <div id="product_table table-responsive">
                     <table class="table table-bordered  " id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Date</th>
                          <th scope="col">Image</th>
                          <th scope="col">Description</th>
                          <th scope="col"><i class="fa fa-trash-o" aria-hidden="true"></i>
</th>
                           
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                   $review = "SELECT * FROM review  ";
                    $runReview = mysqli_query($con, $review);
                            $i=0;
                            while($rowReview = mysqli_fetch_array($runReview)){
                                $review_id = $rowReview['review_id'];
                                $review_name = $rowReview['review_name'];
                                $review_image = $rowReview['review_image'];
                                $review = $rowReview['review'];
                                $review_date = $rowReview['review_date'];
                                
                                $i++;
                    
                ?> 
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo ucfirst($review_name); ?></td>
                          <td><?php echo $review_date; ?></td>
                          
                          <td><img src="../images/review/<?php echo $review_image;?>" class="img-fluid shadow-bold" width="100px;"></td>
                            <td><?php echo $review; ?></td>
                            <td><a href="review.php?del=<?php echo $review_id;?>" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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






