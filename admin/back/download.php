<?php
include('db_backup_library.php');
$dbbackup = new db_backup;
$dbbackup->connect("localhost","root","","apex");
$dbbackup->backup();
$dbbackup->download();

?>