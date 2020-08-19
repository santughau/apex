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
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Enter Product Name" name="productName" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Price</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Enter Product Price" name="productPrice" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="productCat" required>
                                <?php echo get_option_list('category','cat_id','cat_name');?>
                              </select>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control-file btn btn-secondary" name="u_image" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Description</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" rows="3" placeholder="Textarea" name="prodata"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
                        </div>
                      </div>
                    </form>
                    
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
<script>
            CKEDITOR.replace( 'prodata' );
</script>
<?php
  if(isset($_POST['submit'])){
      $productName = $_POST['productName'];
      $productPrice = $_POST['productPrice'];
      $productCat = $_POST['productCat'];
      $prodata = $_POST['prodata'];
      
      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
      
      $u_image = 'product_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
            
      move_uploaded_file($image_tmp,"../images/product/$u_image");
      
      $insert_news = "INSERT INTO products (cat_id,product_name,product_desc,product_price,product_image) VALUES ('$productCat','$productName','$prodata','$productPrice','$u_image')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
          
	   echo"<script>alert('Welcome, You have added a new Product !')</script>";
	   echo"<script>window.open('product.php','_self')</script>";
        }
  } 
    
?>
