<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $edit_id = $_GET['id'];
            $product_info = "SELECT * FROM amazon WHERE id = '$edit_id' ";
            $product_run = mysqli_query($con,$product_info);
            $row=mysqli_fetch_array($product_run);
                                    
            $id = $row['id'];
            $cat_id = $row['cat_id'];
            $name = $row['name'];
            $code =  htmlentities($row['code']);
            $u_imagea = $row['image'];
            
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
                     <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $name;?>" name="productName" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Code</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $code;?>" name="productCode" >
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
                          <input type="file" class="form-control-file btn btn-secondary" name="u_image" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" name="update">Edit Product</button>
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
  if(isset($_POST['update'])){
      $productName = $_POST['productName'];
      $productCode = $_POST['productCode'];
      $productCat = $_POST['productCat'];
      $prodata = $_POST['prodata'];
      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
      if(empty($u_image)){
                $u_image = $u_imagea;
        }
      else{
          $u_image = 'product_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
      }
      
      
            
      move_uploaded_file($image_tmp,"../images/amazon/$u_image");
      
  
     $insert_news = "update amazon set 
      cat_id = '$productCat',
      name = '$productName',
      code = '$productCode',
      image = '$u_image'
      where id = '$edit_id'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
          echo"<script>alert('Welcome, You have Updated your product !')</script>";
            echo"<script>window.open('amazon.php','_self')</script>";
     
            }
    }

?>
