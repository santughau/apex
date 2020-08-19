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
                    <h2 class="text-center text-white bg-primary">Add Images to Gallery</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Image Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Enter Image Title Here" name="imageTitle" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control-file btn btn-secondary" name="u_image" required>
                        </div>
                      </div>
                        
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" name="submit">Add Image</button>
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
            CKEDITOR.replace( 'prodata' );
</script>
<?php
  if(isset($_POST['submit'])){
      $imageTitle = $_POST['imageTitle'];
      
      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
      
      $u_image = 'product_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
            
      move_uploaded_file($image_tmp,"../images/gallery/$u_image");
      
      $insert_news = "INSERT INTO gallery (gallery_title,gallery_image) VALUES ('$imageTitle','$u_image')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
          
	   echo"<script>alert('Welcome, You have added a new Image !')</script>";
	   echo"<script>window.open('gallery.php','_self')</script>";
        }
  } 
    
?>
