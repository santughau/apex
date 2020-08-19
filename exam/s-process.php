<?php require_once('inc/top.php') ?>
<?php
  session_start();
$mobile = $_SESSION['user_email'];
$user_id = $_SESSION['user_id'];
?>
<?php
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
    
}
if(isset($_SESSION['q'])){
    $q_id = $_SESSION['q'];
}

if($_POST){
        $number = $_POST['number'];
        $exam_id = $_POST['exam_id'];
        
        $selected_choice = $_POST['choice'];
        $next = $number+1;
    
        $query_t = "SELECT * FROM questions WHERE exam_id = '$exam_id'";
        $result_t = mysqli_query($con,$query_t);
        $total = mysqli_num_rows($result_t);
       
    
    $query = "SELECT * FROM questions WHERE  question_number = $q_id ";
    
    $result = mysqli_query($con,$query);
    $q = mysqli_fetch_array($result);
    $correct_choice= $q['ans']; 
    if($correct_choice == $selected_choice){
        $_SESSION['score']++;
    }
    
    $_SESSION['exam_id'] = $exam_id;
    
    if($number == $total){
        header("Location:s.php");
        exit();
    }
    
    
    else{
       
        
        header("Location:s-question.php?n=".$next."&exam_id=".$exam_id);

    }
    
    }
$_SESSION['user_email'] = $mobile;
$_SESSION['user_id'] = $user_id;
?>
