<?php require_once('inc/db.php') ?>

<?php
    /*-------------------Function for Slider-----------------*/

/*--------------------End OF Slider-----------------------------------*/

/*--------------------Get Option List---------------------------------*/
function get_option_list($table,$col_id,$col_value){
  global $con;
    $get_option = "SELECT * FROM $table ORDER BY $col_value ASC";
    $run_option = mysqli_query($con,$get_option);
     while ($row_option = mysqli_fetch_array($run_option)){
		$option_id = $row_option[$col_id];
		$option_title = $row_option[$col_value];
		echo "<option value='$option_id' >$option_title</option>";
		
		}
   }
/* Use Of Get Slider
<?php echo get_option_list('categories','id','category');?>
*/
/*--------------------End OF Option List-------------------------------*/

/*--------------------Get Check Box List---------------------------------*/

/* 
---Inline Check Box---------------------
<div class='form-check form-check-inline'>
     <label class='form-check-label'>
             <input class='form-check-input' type='checkbox' name='$name' value='$checkbox_id'> $checkbox_value
    </label>
</div>



<label class='checkbox-inline'>
    <input type='checkbox'  value='$checkbox_id' name='$name'> $checkbox_value
</label>
---Inline Check Box--------------------
----------Use Of Get Checkbox----------
 <?php echo get_checkbox_list('users','id','first_name','course')?>
*/
/*--------------------End OF Check Box List-------------------------------*/
/*--------------------Get User IP Address-------------------------------*/

function getIp() {

    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }


    return $ip;

}
/*--------------------End Of User IP Address-------------------------------*/


    
?>


