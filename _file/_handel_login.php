<?php
$loginsuccess=false;
$loginfaild=false;
$logpsnm=false;
include '_db-connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $login_id=$_POST['user_name_id'];
    $login_password=$_POST['user_password'];
    $login_sql="SELECT * FROM `user` WHERE `user_name_id` = '$login_id'";
    $login_result=mysqli_query($connect,$login_sql);
    $login_row=mysqli_num_rows($login_result);
   if ($login_row == 1) {
       $login_assoc=mysqli_fetch_assoc($login_result);
       $login_user_id=$login_assoc['user_id'];
       $password_varify= password_verify($login_password,$login_assoc['user_password']);
        //    echo $password_varify;
       if ($password_varify) {
           echo'Password is varified';
           $_SESSION['logdin'] = true;
           $_SESSION['user_name_id']=$login_assoc['user_name_id'];
           $_SESSION['user_name']=$login_assoc['user_name'];
           $_SESSION['user_password']=$login_id;
           $_SESSION['login_user_id']=$login_user_id;
           $loginsuccess=true;
           header('location: /college_walla/index?loginsuccess=true');
       }
       else {
        header('location: /college_walla/index?logpsnm=true');
       }
   }else {
    header('location: /college_walla/index?loginfaild=true');
   }

}




?>