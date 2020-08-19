<?php
$products = "SELECT * FROM department";
$products_run = mysqli_query($con,$products);
$row_department = mysqli_num_rows($products_run);

$exam = "SELECT * FROM exam";
$exam_run = mysqli_query($con,$exam);
$row_exam = mysqli_num_rows($exam_run);

$users = "SELECT * FROM users";
$users_run = mysqli_query($con,$users);
$row_users = mysqli_num_rows($users_run);

$questions = "SELECT * FROM questions";
$questions_run = mysqli_query($con,$questions);
$row_questions = mysqli_num_rows($questions_run);




?>

<div class="list-group" id="ssd">
  <a href="index.php" class="list-group-item list-group-item-action active"> <i class="fa fa-tachometer" aria-hidden="true"></i>
 Dashboard</a>
  <a href="category.php" class="list-group-item list-group-item-action"> <i class="fa fa-cart-plus" aria-hidden="true"></i> category <button type="button" class="btn btn-secondary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_department; ?></span></button></a>
    <a href="addexam.php" class="list-group-item list-group-item-action"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Exam <button type="button" class="btn btn-secondary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_exam; ?></span></button></a>
    <a href="user.php" class="list-group-item list-group-item-action"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Users <button type="button" class="btn btn-secondary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_users; ?></span></button></a>
    <a href="addquestion.php" class="list-group-item list-group-item-action"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Question <button type="button" class="btn btn-secondary pull-right btn-sm">
   <span class="badge badge-light text-secondary"><?php echo $row_questions; ?></span></button></a>
    
  
   
</div>