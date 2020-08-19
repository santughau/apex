<?php
if(isset($_SESSION['user_email'])){
       $user_id = $_SESSION['user_id'];
       $mobile = $_SESSION['user_email'];
       $name = ucfirst($_SESSION['user_name']);
       $user_image = $_SESSION['user_image'];
  }
        $query_t = "SELECT * FROM result WHERE user_id = '$user_id'";
        $result_t = mysqli_query($con,$query_t);
        $total_exam = mysqli_num_rows($result_t);
        $mark = 0;
        while($row_exam = mysqli_fetch_array($result_t)){
             $m = $row_exam['percent'];
            $mark= $mark + $m / $total_exam;
        }
?>
<div class="card card-testimonial text-center">
  <div class="card-header orange darken-4 ">
    <img src="images/user/<?php echo $user_image;?>" alt="<?php echo $name;?>-online-exam">
  </div>
  <div class="card-body">
    <h4 class="card-title mt-5 mb-0"><?php echo $name;?></h4>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <p class="mb-0">My Exam</p>
            <small class="text-muted"><?php echo $total_exam;?></small>
        </div>
        <div class="col-lg-6">
            <p class="mb-0">Exam Avg</p>
            <small class="text-muted"><?php echo ceil($mark);?> %</small>
        </div>
    </div><hr>
      <div class="row">
        <div class="col-lg-6">
            <p class="mb-0"><a href="edit_profile.php?u_id=<?php echo $user_id;?>">Edit Me</a></p>
        </div>
        <div class="col-lg-6">
            <p class="mb-0"><a href="logout.php" class="text-danger"><a href="logout.php" class="text-danger">LogOut</a></p>
        </div>
    </div>
  </div>
</div>