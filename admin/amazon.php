<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM amazon WHERE id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('amazon.php','_self')</script>";  
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
                  <h1 class="text-center bg-secondary text-white">View all Products</h1>
                    <div align="right">
                    <a href="addAmazon.php" class="btn btn-outline-primary" >Add Product</a><hr>
                    </div>
                    <div id="product_table">
                     <table class="table table-bordered  table-responsive" id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Category</th>
                          <th scope="col">Image</th>
                          <th scope="col"><i class="fa fa-eye" aria-hidden="true"></i>
</th>
                          <th scope="col"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</th>
                          <th scope="col"><i class="fa fa-trash-o" aria-hidden="true"></i>
</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                   $product = "SELECT * FROM amazon ORDER BY id DESC ";
                    $run_product = mysqli_query($con, $product);
                            $i=0;
                            while($row_product = mysqli_fetch_array($run_product)){
                                $id = $row_product['id'];
                                $cat_id = $row_product['cat_id'];
                                $image = $row_product['image'];
                                $name = $row_product['name'];
                                $code = $row_product['code'];
                                $i++;
                     $cat = "SELECT * FROM category WHERE cat_id = '$cat_id' ";
                     $run_cat = mysqli_query($con, $cat);
                     $row_cat = mysqli_fetch_array($run_cat);
                     $cat_id = $row_cat['cat_id'];
                     $cat_name = $row_cat['cat_name'];
                                
                                
                ?> 
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo ucfirst($name); ?></td>
                          <td><?php echo ucfirst($cat_name); ?></td>
                          <td><img src="../images/amazon/<?php echo $image;?>" class="img-fluid shadow-bold" width="100px;"></td>
                          <td><?php echo $code;?></td>
                          <td><a href="editAmazon.php?id=<?php echo $id;?>" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                          <td><a href="amazon.php?del=<?php echo $id;?>" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                          
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
    <div class="row bg-dark" style="padding-top:20px;">
			
                <?php include('inc/footer.php');?>
            
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






