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
                    <img src="images/logo.jpg" class="img-fluid shadow-light"><hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <h1 class="text-center bg-secondary text-white">View Details</h1>
                   <div class="row">
                    <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $product = "SELECT * FROM products WHERE product_id = '$id' ";
                    
                    $run_product = mysqli_query($con, $product);
                            $i=0;
                            while($row_product = mysqli_fetch_array($run_product)){
                                $product_id = $row_product['product_id'];
                                $cat_id = $row_product['cat_id'];
                                $product_name = $row_product['product_name'];
                                $product_desc = $row_product['product_desc'];
                                $product_price = $row_product['product_price'];
                                $product_image = $row_product['product_image'];
                                
                ?>
                   <div class="col-md-5">
                        <img class="img-fluid shadow-light" src="../images/product/<?php echo $product_image;?>"><br><br>
                       <button type="button" class="btn btn-outline-primary offset-md-5">Rs <?php echo $product_price;?></button><hr>
                    </div>
                    <div class="col-md-7">
                       <button type="button" class="btn btn-outline-warning btn-block"><?php echo $product_name;?></button><hr>     
                        <div class="jumbotron purple lighten-4 ">
                          <?php echo $product_desc;?>
                          <p class="lead">
                            <a class="btn btn-secondary " href="product.php" role="button">Go Back</a>
                          </p>
                        </div>
                    </div>
                    <?php }}?>
                </div>
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






