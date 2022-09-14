<?php
$emlexst = false;
$nsbmt = false;
$pntmatch = false;
$unmext = false;
$singupsuccess = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '_db-connect.php';
    //replace user id
    $singup_user_id = $_POST['user_name_id'];
    $singup_user_id = str_replace("<", "&lt;", "$singup_user_id");
    $singup_user_id = str_replace(">", "&gt;", "$singup_user_id");

    //replace user name
    $singup_name = $_POST['singup-name'];
    $singup_name = str_replace("<", "&lt;", "$singup_name");
    $singup_name = str_replace(">", "&gt;", "$singup_name");

    //replace singup email
    $singup_email = $_POST['singup-email'];
    $singup_password = $_POST['singup-password'];
    $singup_password = str_replace("<", "&lt;", "$singup_password");
    $singup_password = str_replace(">", "&gt;", "$singup_password");
    
    //replace singup password   
    $singup_renter_password = $_POST['singup-renter-password'];
    $singup_renter_password = str_replace("<", "&lt;", "$singup_renter_password");
    $singup_renter_password = str_replace(">", "&gt;", "$singup_renter_password");

    //search data from user using user name id
    $exist_singup_user = "SELECT * FROM `user` WHERE `user_name_id`='$singup_user_id'";
    $singup_query = mysqli_query($connect, $exist_singup_user);
    $singup_row = mysqli_num_rows($singup_query);

    //search data from sing up email   
    $exist_singup_email = "SELECT * FROM `user` WHERE `user_name_id`='$singup_email'";
    $singup_email_query = mysqli_query($connect, $exist_singup_email);
    $singup_email_row = mysqli_num_rows($singup_email_query);
    

    if ($singup_row > 0) {
        // echo "This user name is already exist";

        $unmext = true;
        header("location:/college_walla/index?unmext=true");
    } else {
        if ($singup_email_row > 0) {
            $emlexst = true;
            header("location:/college_walla/index?emlexst=true");
        } else {
            if ($singup_password == $singup_renter_password) {
                //HASHING PASSWORD
                $singup_password = password_hash($singup_password, PASSWORD_DEFAULT);
                $singup_sql = "INSERT INTO `user`(`user_name_id`, `user_name`, `user_email`, `user_password`) VALUES ('$singup_user_id','$singup_name','$singup_email','$singup_password')";
                $singup_result = mysqli_query($connect, $singup_sql);
                if ($singup_result) {
                    $singupsuccess = true;
                    header("location:/college_walla/index?singupsuccess=true");
                } else {
                    $nsbmt = true;
                    header("location:/college_walla/index?nsbmt=true;");
                }
            } else {
                $pntmatch = true;
                header("location:/college_walla/index?pntmatch=true");
            }
        }
    }
}
