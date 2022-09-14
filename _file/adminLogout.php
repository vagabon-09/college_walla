<?php
$logout;
require'../_file/_db-connect.php';
session_start();
session_destroy();
header('location: /college_walla/Admin/college_walla_admin_login?logout=true')

?>