<?php
session_start();
require '../_file/_db-connect.php';

if (isset($_SESSION['admin_login']) && $_SESSION['admin_login'] = true) {
  header('location:index');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $adminemail = $_POST['admin_email'];
  $adminPass = $_POST['admin_password'];


  // search in data base 
  $admin_email_sql = "SELECT * FROM `admin` WHERE `admin_email`='$adminemail'";
  $admin_email_result = mysqli_query($connect, $admin_email_sql);
  $admin_email_row = mysqli_num_rows($admin_email_result);
  if ($admin_email_row > 0) {
    // echo ' yes admin email is avilable';
    $admin_assoc = mysqli_fetch_assoc($admin_email_result);
    $admin_data_password = $admin_assoc['admin_password'];
    if ($adminPass == $admin_data_password) {
      //  echo'password matched';
      $_SESSION['admin_login'] = true;
      $_SESSION['admin_name'] = $admin_assoc['admin_name'];
      header('location: index');
    } else {
      echo 'Password dose not matched';
    }
  } else {
    echo ' Sorry this email dose not exist';
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Cllege Walla - Admins panel</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

  <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" class="form-control" name="admin_email" placeholder="Email-id" autofocus required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="admin_password" placeholder="Password" required>
        </div>

        <!-- <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label> -->


        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

        <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->

      </div>
    </form>
    <div class="text-right">
      <!-- <div class="credits">
          
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
         
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div> -->
    </div>
  </div>


</body>

</html>