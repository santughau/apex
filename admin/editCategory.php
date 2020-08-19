<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $edit_id = $_GET['id'];
            $courseInfo = "SELECT * FROM category WHERE cat_id = '$edit_id' ";
            $courseRun = mysqli_query($con,$courseInfo);
            $row=mysqli_fetch_array($courseRun);
                                    
            $cat_id = $row['cat_id'];
            $cat_name = $row['cat_name'];
            
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
                        <label class="col-sm-2 col-form-label text-dark">Category Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $cat_name;?>" name="catName" required>
                        </div>
                      </div>
                       
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" name="update">Update Category</button>
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

<?php
  if(isset($_POST['update'])){
      $catName = $_POST['catName'];
      
     $insert_news = "update category set 
      cat_name = '$catName'
      where cat_id = '$edit_id'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
          echo"<script>alert('Welcome, You have Updated your Category !')</script>";
            echo"<script>window.open('category.php','_self')</script>";
     
            }
    }

?>
