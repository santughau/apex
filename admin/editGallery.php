<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $edit_id = $_GET['id'];
            $gallery = "SELECT * FROM gallery WHERE gallery_id = '$edit_id' ";
            $runGallery = mysqli_query($con, $gallery);
            $row=mysqli_fetch_array($runGallery);
                                    
            $gallery_id = $row['gallery_id'];
            $gallery_title = $row['gallery_title'];
            $u_imagea = $row['gallery_image'];
            
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
                     <h2 class="text-center text-white bg-primary">Edit Images</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Image Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $gallery_title;?>" name="imageTitle" required>
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
                          <button type="submit" class="btn btn-primary" name="update">Update</button>
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
  if(isset($_POST['update'])){
      $imageTitle = $_POST['imageTitle'];
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
      if(empty($u_image)){
                $u_image = $u_imagea;
        }
      else{
          $u_image = 'product_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
      }
         
      move_uploaded_file($image_tmp,"../images/gallery/$u_image");
      
  
     $insert_news = "update gallery set 
      gallery_title = '$imageTitle',
      gallery_image = '$u_image'
      where gallery_id = '$edit_id'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
          
          
          $get_media = "SELECT * FROM gallery WHERE gallery_image = '$u_image'";
                
            $media_query = mysqli_query($con,$get_media);
            $row_media = mysqli_fetch_array($media_query);
                
            $media_id = $row_media['gallery_id'];
            $media_name1 = $row_media['gallery_image'];
            
                if(file_exists("../images/gallery/$u_image")){
                    if(rename("../images/gallery/$u_image","../images/gallery/$media_id.jpg")){
                        $update = "UPDATE gallery SET gallery_image='$media_id.jpg' WHERE gallery_image = '$media_name1'";
            
                        $run = mysqli_query($con,$update);
                    }
                    else{
                        echo "<script>alert('Error in Rename !')</script>";
                    }
                }
                else{
                    echo "<script>alert('File does not exit')</script>";
                }
          echo"<script>alert('Welcome, You have Updated your Gallery !')</script>";
            echo"<script>window.open('gallery.php','_self')</script>";
     
            }
    }

?>
