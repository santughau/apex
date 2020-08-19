<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['id'])){
        $edit_id = $_GET['id'];
            $adInfo = "SELECT * FROM advertise WHERE ad_id = '$edit_id' ";
            $adRun = mysqli_query($con,$adInfo);
            $row=mysqli_fetch_array($adRun);
                                    
            $ad_id = $row['ad_id'];
            $ad_date = $row['ad_date'];
            $ad_desc = $row['ad_desc'];
            $ad_name = $row['ad_name'];
            $ad_mobile = $row['ad_mobile'];
            $ad_type = $row['ad_type'];
            
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
                        <label class="col-sm-2 col-form-label text-dark">Advertisers Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $ad_name; ?>" name="advName" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Advertisers Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $ad_mobile; ?>" name="advMobile" required>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Adv Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="advCat" required>
                                <?php echo get_option_list('adtype','adType_id','adType_name');?>
                              </select>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Advertisers Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="date" value="<?php echo $ad_date; ?>" >
                        </div>
                      </div>
                       
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Product Description</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" rows="3"  name="desc" id="textarea1" data-status-message="#counter1"><?php echo $ad_desc; ?></textarea>
                            <div id="counter1" class="text-left"></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" name="update">Update Advertisement</button>
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
  if(isset($_POST['update'])){
      $advName = $_POST['advName'];
      $advMobile = $_POST['advMobile'];
      $advCat = $_POST['advCat'];
      $date = $_POST['date'];
      $desc = $_POST['desc'];
      
      
      
  
     $insert_news = "update advertise set 
      ad_date = '$date',
      ad_desc = '$desc',
      ad_name = '$advName',
      ad_mobile = '$advMobile',
      ad_type = '$advCat'
      where ad_id = '$edit_id'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
          echo"<script>alert('Welcome, You have Updated your Advertisement !')</script>";
            echo"<script>window.open('ad.php','_self')</script>";
     
            }
    }

?>
