<?php

$gallery = "SELECT * FROM gallery";
$gallery_run = mysqli_query($con,$gallery);
$row_gallery = mysqli_num_rows($gallery_run);

$student = "SELECT * FROM student";
$student_run = mysqli_query($con,$student);
$row_student = mysqli_num_rows($student_run);

$advertise = "SELECT * FROM advertise";
$advertise_run = mysqli_query($con,$advertise);
$row_advertise = mysqli_num_rows($advertise_run);

$review = "SELECT * FROM review";
$review_run = mysqli_query($con,$review);
$row_review = mysqli_num_rows($review_run);

$courses = "SELECT * FROM courses";
$courses_run = mysqli_query($con,$courses);
$row_courses = mysqli_num_rows($courses_run);

$register = "SELECT * FROM register";
$register_run = mysqli_query($con,$register);
$row_register = mysqli_num_rows($register_run);

$adtype = "SELECT * FROM adtype";
$adtype_run = mysqli_query($con,$adtype);
$row_adtype = mysqli_num_rows($adtype_run);

$category = "SELECT * FROM category";
$category_run = mysqli_query($con,$category);
$row_category = mysqli_num_rows($category_run);

$fee = "SELECT * FROM fee";
$fee_run = mysqli_query($con,$fee);
$row_fee = mysqli_num_rows($fee_run);

$expenses = "SELECT * FROM expenses";
$fee_expenses = mysqli_query($con,$expenses);
$row_expenses = mysqli_num_rows($fee_expenses);

$msg = "SELECT * FROM msg";
$fee_msg = mysqli_query($con,$msg);
$row_msg = mysqli_num_rows($fee_msg);
?>

<div class="list-group">
  <a href="index.php" class="list-group-item list-group-item-action active"> <i class="fa fa-tachometer" aria-hidden="true"></i>
 Dashboard</a>
  
  <a href="gallery.php" class="list-group-item list-group-item-action"> <i class="fa fa-camera " aria-hidden="true"></i> Gallery <button type="button" class="btn btn-primary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_gallery;?></span></button></a>
    <a href="student.php" class="list-group-item list-group-item-action"> <i class="fa fa-user" aria-hidden="true"></i> Students <button type="button" class="btn btn-danger pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_student;?></span></button></a>
    <a href="ad.php" class="list-group-item list-group-item-action"> <i class="fa fa-handshake-o" aria-hidden="true"></i> Advertisement <button type="button" class="btn btn-warning pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_advertise;?></span></button></a>
    <a href="review.php" class="list-group-item list-group-item-action"> <i class="fa fa-star" aria-hidden="true"></i> Reviews <button type="button" class="btn btn-primary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_review;?></span></button></a>
    <a href="course.php" class="list-group-item list-group-item-action"> <i class="fa fa-life-ring" aria-hidden="true"></i> Batches <button type="button" class="btn btn-dark pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_courses;?></span></button></a>
     <a href="register.php" class="list-group-item list-group-item-action"> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> Registration <button type="button" class="btn btn-secondary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_register;?></span></button></a>
    <a href="adType.php" class="list-group-item list-group-item-action"> <i class="fa fa-bars" aria-hidden="true"></i> Ad Type <button type="button" class="btn btn-primary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_adtype;?></span></button></a>
    
    <a href="fee.php" class="list-group-item list-group-item-action"> <i class="fa fa-money" aria-hidden="true"></i> Fee <button type="button" class="btn btn-warning pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_fee;?></span></button></a>
    
    <a href="category.php" class="list-group-item list-group-item-action"> <i class="fa fa-sort" aria-hidden="true"></i> Category <button type="button" class="btn btn-danger pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_category;?></span></button></a>
    
    <a href="expenses.php" class="list-group-item list-group-item-action"> <i class="fa fa-money" aria-hidden="true"></i> Expenses <button type="button" class="btn btn-primary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_expenses;?></span></button></a>
    
    <a href="exam.php" class="list-group-item list-group-item-action"> <i class="fa fa-question" aria-hidden="true"></i> Exam <button type="button" class="btn btn-primary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_expenses;?></span></button></a>
    
    <a href="msg.php" class="list-group-item list-group-item-action"> <i class="fa fa-envelope" aria-hidden="true"></i> Messages <button type="button" class="btn btn-primary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_msg;?></span></button></a>
    
    <a href="msgtoclasses.php" class="list-group-item list-group-item-action"> <i class="fa fa-window-close-o" aria-hidden="true"></i> Complaints <button type="button" class="btn btn-primary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_msg;?></span></button></a>
    
    <a href="backup.php" class="list-group-item list-group-item-action"> <i class="fa fa-database" aria-hidden="true"></i> Backup <button type="button" class="btn btn-primary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_msg;?></span></button></a>
    
   
</div>