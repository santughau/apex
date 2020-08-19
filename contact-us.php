<?php 
$page_title = "Home Pages";
$page_key = "";
$page_desc = "";
include('inc/top.php');
?>
<!-- Start from here-->
<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
                <?php include('inc/navbar.php');?>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
			<div class="col-md-4">
			    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Responsive -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-4151366218309776"
                 data-ad-slot="5270114532"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
              <h2 class="text-secondary">Register Your Name</h2><hr>
            <form action="" method="post">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-dark">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Enter Your Name" name="name" style="border: 1px solid black; padding-left:5px;">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-dark">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="Enter your Email" name="email" style="border: 1px solid black; padding-left:5px;">
                    </div>
                  </div>
                 <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-dark">Mobile</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Enter your Mobile" name="mobile" style="border: 1px solid black; padding-left:5px;">
                    </div>
                  </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-dark">Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Enter your Address" name="address" style="border: 1px solid black; padding-left:5px;">
                    </div>
                  </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-dark">Class</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="qualification" style="border: 1px solid black; padding-left:5px;">
                        <option value="1">Class 1</option>
                        <option value="2">Class 2</option>
                        <option value="3">Class 3</option>
                        <option value="4">Class 4</option>
                        <option value="5">Class 5</option>
                        <option value="6">Class 6</option>
                        <option value="7">Class 7</option>
                        <option value="8">Class 8</option>
                        <option value="9">Class 9</option>
                        <option value="10">Class 10</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                    </div>
                  </div>
                
                </form><hr>
               
    <h4 class="text-center text-secondary">Find Us on Google Map</h4>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyASSRYOZpuH65YKf2Kyu3ZQV9n2rzOlzn8'></script><div style='overflow:hidden;height:400px;width:100%;'><div id='gmap_canvas' style='height:400px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://indiatvnow.com/'>TV Soap from India</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=771adbb8393dc2f28fd01595020073d70b7c595e'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:18,center:new google.maps.LatLng(19.186000635285797,77.29656096061818),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(19.186000635285797,77.29656096061818)});infowindow = new google.maps.InfoWindow({content:'<strong>Nanded</strong><br>Apex Academy<br>431605 Nanded<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
      </div>
            <div class="col-md-5 table-responsive">
                <table class="table table-bordered display" id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Class</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Course Fee</th>
                          <th scope="col">Batch Starts</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                   $course = "SELECT * FROM courses ";
                    $runCourse = mysqli_query($con, $course);
                            $ia=0;
                            while($rowCourse = mysqli_fetch_array($runCourse)){
                                $course_id = $rowCourse['course_id'];
                                $course_name = $rowCourse['course_name'];
                                $course_duration = $rowCourse['course_duration'];
                                $course_fee = $rowCourse['course_fee'];
                                $course_start = $rowCourse['course_start'];
                                
                                 $ia=$ia+1;
                ?> 
                        <tr>
                          <th scope="row"><?php echo $ia;?></th>
                          <td> Class <?php echo $course_name; ?></td>
                          <td><?php echo ucfirst($course_duration); ?></td>
                          <td><?php echo $course_fee; ?></td>
                          <td><?php echo $course_start; ?></td>
                        </tr>
                     <?php } ?>   
                      </tbody>
                    </table><br>
                <button type="button" class="btn btn-warning offset-md-4" id="but">Export to Excel</button>
            </div>
            <div class="col-md-3">
                <h4 >Address </h4>
                <address>
                     Apex Acadamy<br>
                    Near Pharande Honda Showroom<br>
                    Deep Nagar,Dist : Nanded<br>
                    Phone : 02462261622 <br>
                    Mobile : 7498204214 <br>
                </address><hr>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Responsive -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-4151366218309776"
                     data-ad-slot="5270114532"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <img class="img-fluid" src="images/ad/013.jpg">
            </div>
        </div><hr>
    
<!--------------------Footer---------------------------------->
    <div class="container-fluid">

        <div class="row bg-dark" style="padding-top:20px;">

            <?php include('inc/footer.php');?>

        </div>
    </div>
<!--------------------Footer---------------------------------->
</div>
</body>
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
    filename: "vinaycomputers.xls" //do not include extension
  }); 
});
</script>

<?php
  if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $address = $_POST['address'];
      $qualification = $_POST['qualification'];
     
      
      $insert_news = "INSERT INTO register (regName,regEmail,regMobile,regAddress,regQua,date) VALUES ('$name','$email','$mobile','$address','$qualification',NOW())";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
          
	   echo"<script>alert('Welcome, You have added Your Profile, We will Contact you shortly !')</script>";
	   echo"<script>window.open('contact-us.php','_self')</script>";
        }
  } 
    
?>



	

