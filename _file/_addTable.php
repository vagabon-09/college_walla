<?php
include '_db-connect.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $table_compare_name=strtoupper($_POST['college_name_post']);
    $table_compare_title=$_POST['college_title_post'];
    $table_compare_disc=$_POST['college_disc_post'];

    $table_sql="INSERT INTO `comparetable`(`compare_table_collage`, `compare_table_title`, `compare_table_disc`) VALUES ('$table_compare_name','$table_compare_title','$table_compare_disc')";

    $table_result=mysqli_query($connect,$table_sql);
    if ($table_result) {
        header('location: /college_walla/Admin/index');
    }else {
        echo'There have some issue';
    }

}
