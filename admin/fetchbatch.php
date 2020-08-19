<?php 
require_once('inc/db.php');
$output = '';
$sql = "SELECT * FROM courses WHERE class = '".$_POST["id"]."' ORDER BY course_id DESC";
$result = mysqli_query($con,$sql);
while($row= mysqli_fetch_array($result)){
    $output .= '<option value="'.$row["course_id"].'">'.$row["course_name"].'</option>';
}
echo $output;
?>