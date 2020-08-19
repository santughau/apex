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
        <div class="col-md-8">
            <h2 class="text-center bg-primary text-white"> Results</h2>
            <hr>
            <div class="list-group">
                
                <a href="http://www.braindevelopmentindia.com/result.html" target="_blank" class="list-group-item list-group-item-action">BDS Exam Result</a>
                <a href="https://puppss.mscescholarshipexam.in/" target="_blank" class="list-group-item list-group-item-action">Scholorship Exam</a>
                <a href="http://mahresult.nic.in/ssc2018/ssc2018.htm" target="_blank" class="list-group-item list-group-item-action">SSC Board Exam Result 2018</a>
               
            </div>

        </div>
        <div class="col-md-4">
            <img src="images/ad/013.jpg" class="img-fluid">
        </div>
    </div>
    <hr>
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