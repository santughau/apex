<?php
    ob_start();
    session_start();
    header('Location:../admin.php');
    session_destroy();
?>