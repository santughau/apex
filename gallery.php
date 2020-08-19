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
        <div class="col-md-12">
            <div class="row">
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
                <?php
                    $record_per_page = 8;
                    $page = '';
                    if (isset($_GET["page"]))
                    {
                        $page = $_GET["page"];
                    }
                    else 
                    {
                        $page = 1;	
                    }
                    $start_from = ($page-1)*$record_per_page;
                   $gallery = "SELECT * FROM gallery ORDER BY gallery_id DESC LIMIT $start_from, $record_per_page";
                    $run_gallery = mysqli_query($con, $gallery);
                            $i=0;
                            while($row_gallery = mysqli_fetch_array($run_gallery)){
                                $gallery_id = $row_gallery['gallery_id'];
                                $gallery_title = $row_gallery['gallery_title'];
                                $gallery_image = $row_gallery['gallery_image'];
                                
                ?>
                <div class="col-md-3">
                    <img src="images/gallery/<?php echo $gallery_image;?>" class="img-fluid shadow-light" width="350px" style="height:250px;">
                    <hr>
                    <h5 class="text-center"><?php echo $gallery_title;?></h5>
                    <hr>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="pagination pagination-circle border-0">
                        <?php
                                 $page_query = "SELECT * FROM gallery ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='page-item ".($page==$i ? 'active':'')."'><a class='page-link ".($page==$i ? 'deep-orange':'deep-orange-text')."' href='gallery.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>



                    </ul>
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
                </div>
            </div>
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