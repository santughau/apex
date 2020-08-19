<?php
session_start();
 
$page_title = "Home Page";
$page_key = "";
$page_desc = "";
$page_desc = "";
require_once('inc/top.php') ;?>

<?php if(!isset($_SESSION['mobile'])){
    header("location:index.php");
}
else{
  if(isset($_SESSION['mobile'])){
        $id = $_SESSION['id'];
       $name = $_SESSION['name'];
       $image = ucfirst($_SESSION['image']);
       $mobile = $_SESSION['mobile'];
      
  }
    
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php require_once('inc/nav.php') ;?>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div align="right">
                <a href="home.php" class="btn btn-outline-primary">Home Page</a>
                <hr>
            </div>
            <h2 class="text-center text-white bg-primary">Send Messages</h2>
            <hr>
        </div>
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Please Write Your Message below</label>
                    <textarea class="form-control" name="msgToClass"  rows="3" style="border:1px solid black; padding-left:15px;"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table table-bordered " id="table2excel">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $result = "SELECT * FROM msgtoclasses WHERE studentId = '$id' ORDER BY id DESC ";
                            $run_result = mysqli_query($con, $result);
                            $ia=0;
                            while($row_result = mysqli_fetch_array($run_result)){
                                $date = $row_result['date'];
                                $msgToClass = $row_result['msgToClass'];
                            ?>
                    <tr>
                        <td><?php echo $date;?></td>
                        <td><?php echo $msgToClass;?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container-fluid bg-dark">
        <div class="row " style="padding-top:20px; margin-top:20px;">
            <hr> <?php include('inc/footer.php');?>
        </div>
    </div>
</div>

<?php } 
?>
</body>

</html>
<script>
        $(document).ready(function() {
            $('#table2excel').DataTable();
        });
    </script>
<?php 
    if(isset($_POST['submit'])){
      $msgToClass = $_POST['msgToClass'];
            
      $insert_news = "INSERT INTO msgToClasses (studentId,msgToClass,date) VALUES ('$id','$msgToClass',NOW())";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
                  
	   echo"<script>alert('Welcome, You have added New Query ! Admin will contact u soon.')</script>";
	   echo"<script>window.open('query.php','_self')</script>";
        }
  } 
?>