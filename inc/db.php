<?php
    $db['db_host']= 'localhost';
    $db['db_user']= 'apex_root';
    $db['db_pass']= 'orange_2611';
    $db['db_name']= 'apex_root';
    

    foreach($db as $key => $value){
        define(strtoupper($key),$value);
    }

    $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    
    
?>
