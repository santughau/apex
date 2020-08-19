<?php
session_start();
$page_title = "";
$page_key = "";
$page_desc = "";
$page_desc = "";
?>
<?php require_once('inc/top.php') ;

?>

<?php if(!isset($_SESSION['user_email'])){
    header("location:index.php");
}
else{
  if(isset($_SESSION['user_email'])){
       $user_id = $_SESSION['user_id'];
       $mobile = $_SESSION['user_email'];
       $name = ucfirst($_SESSION['user_name']);
       $district = $_SESSION['user_dist'];
       $last_login = $_SESSION['last_login'];
       $register_date = $_SESSION['register_date'];
      $class = $_SESSION['class'];
      
  }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php require_once('inc/nav.php') ;?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive" style="padding-top:20px;">
            <h3 class="text-center text-white bg-primary">My Profile</h3><br>
            <hr>
        </div>        
        <div class="col-md-8">
            <?php
                $user_id = $_GET['u_id'];
                $select = "SELECT * FROM users WHERE user_id='$user_id'";
                $run = mysqli_query($con,$select);
                $row = mysqli_fetch_array($run);

                $id= $row['user_id'];
                $image= $row['user_image'];
                $name= ucfirst($row['user_name']);
                $country= $row['user_country'];
                $gender= $row['user_gender'];
                $last_login= $row['last_login'];
                $register_date= $row['register_date'];
                $birthday_date= $row['user_b_day'];
                $email= $row['user_email'];
                $class= $row['class'];
                $user_mobile= $row['user_mobile'];
                $user_pass= $row['user_pass'];

                if($gender=='male'){
                    $msg= "Send him a message";
                }
                else{
                    $msg= "Send her a message";
                }
                ?>
            <table class="table table-bordered table-condensed ">
                <tbody>
                    <tr class="info">
                        <th class="bg-dark text-white">Name</th>
                        <th><?php echo $name;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Gender</th>
                        <th><?php echo $gender;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Country</th>
                        <th><?php echo $country;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Birthday</th>
                        <th><?php echo $birthday_date;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">E-mail</th>
                        <th><?php echo $email;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Class</th>
                        <th><?php echo $class;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Mobile</th>
                        <th><?php echo $user_mobile;?></th>
                    </tr>
                    <tr class="info">
                        <th class="bg-dark text-white">Password</th>
                        <th><?php echo $user_pass;?></th>
                    </tr>
                </tbody>
            </table>
            <hr>
            <a href="home.php">
                <button class="btn btn-primary navbar-right" style="margin-bottom:10px;">Back to Home Page</button></a>
        </div>
        <div class="col-md-4">
            <img src="images/user/<?php echo $image; ?>" class="img-fluid img-thumbnail" style="height:200px;">
        </div>
        <br><br>
        <hr>
        <div class="col-md-12">
            
        </div>
    </div>
    <div class="container-fluid bg-dark">
        <div class="row " style="padding-top:20px;">
            <?php include('inc/footer.php');?>
        </div>
    </div>
</div>

<?php } ?>