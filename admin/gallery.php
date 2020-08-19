<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM gallery WHERE gallery_id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('gallery.php','_self')</script>";  
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
                  <h1 class="text-center bg-secondary text-white">View all Images</h1>
                    <div align="right">
                    <a href="addGallery.php" class="btn btn-outline-primary" >Add Images</a><hr>
                    </div>
                    <div id="product_table">
                     <table class="table table-bordered " id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Image Title</th>
                          <th scope="col">Image</th>
                          <th scope="col"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</th>
                          <th scope="col"><i class="fa fa-trash-o" aria-hidden="true"></i>
</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                   $gallery = "SELECT * FROM gallery ORDER BY gallery_id DESC ";
                    $runGallery = mysqli_query($con, $gallery);
                            $i=0;
                            while($rowGallery = mysqli_fetch_array($runGallery)){
                                $gallery_id = $rowGallery['gallery_id'];
                                $gallery_title = $rowGallery['gallery_title'];
                                $gallery_image = $rowGallery['gallery_image'];
                               
                                $i++;
                     
                                
                                
                ?> 
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo ucfirst($gallery_title); ?></td>
                          <td><img src="../images/gallery/<?php echo $gallery_image;?>" class="img-fluid shadow-bold" width="100px;"></td>
                          <td><a href="editGallery.php?id=<?php echo $gallery_id;?>" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                          <td><a href="gallery.php?del=<?php echo $gallery_id;?>" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        </tr>
                     <?php } ?>   
                      </tbody>
                    </table>
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
