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
                        <label class="col-sm-2 col-form-label text-dark">Advertisers Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Enter Advertisers Name" name="adName" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Advertisers Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Enter Mobile Price" name="adMobile" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Adv Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="adCat" required>
                                <?php echo get_option_list('adtype','adType_id','adType_name');?>
                              </select>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Advertisers Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="date" placeholder="Choose Date">
                        </div>
                      </div>
                       
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Description</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" rows="3"  name="desc" id="textarea1" data-status-message="#counter1"></textarea>
                            <div id="counter1" class="text-left"></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" name="submit">Add Advertisement</button>
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
     $(function(){
             $('.datepicker').datepicker();
     });
    
</script>
<script>
$(function () {
     $('#textarea1').limitText({limit:500,warningLimit:50});
 });
</script>
<?php
  if(isset($_POST['submit'])){
      $adName = $_POST['adName'];
      $adMobile = $_POST['adMobile'];
      $adCat = $_POST['adCat'];
      $date = $_POST['date'];
      $desc = $_POST['desc'];
      
      
      $insert_news = "INSERT INTO advertise (ad_date,ad_desc,ad_name,ad_mobile,ad_type) VALUES ('$date','$desc','$adName','$adMobile','$adCat')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
          
	   echo"<script>alert('Welcome, You have added a new Advertisement !')</script>";
	   echo"<script>window.open('ad.php','_self')</script>";
        }
  } 
    
?>
