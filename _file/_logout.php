<?php  
$logoutsuccess=true;
include '_db-connect.php';
session_start();
session_destroy();
echo'You logouted';
header('location: /college_walla/index?logoutsuccess=true');
