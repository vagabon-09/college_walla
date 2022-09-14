<?php
include '_db-connect.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $add_college_title=strtoupper($_POST['college_name']);
    $add_college_content=$_POST['college_content'];
    $add_college_photo=$_FILES['college_image'];
    $slug_url=strtolower($add_college_title);
    $slug_url='/'.str_replace(" ","-",$slug_url);

    echo $add_college_title;
    echo  $add_college_content;
    echo $slug_url;


    $add_image_name=$_FILES['college_image']['name'];
    $add_image_tmp=$_FILES['college_image']['tmp_name'];
    $folder="../img/".$add_image_name;
  
    $add_college_details_sql="INSERT INTO `college-details`(`college-name`, `college-content`, `college_img`,`slug_url`) VALUES ('$add_college_title',' $add_college_content','$add_image_name','$slug_url')";
    $add_college_details_result=mysqli_query($connect,$add_college_details_sql);

    if ($add_college_details_result) {
       header('location: /college_walla/Admin/index');
    }else {
        echo'Your data is not submited';
        header('location: /college_walla/Admin/index');
    }


    if (move_uploaded_file( $add_image_tmp, $folder)) {
       echo'success fully uploaded';
       header('location: /college_walla/Admin/index');
    }
    else {
        echo'there have some problem';
        header('location: /college_walla/Admin/index');
    }


}

?>