  <?php include '_file/_db-connect.php';

  session_start();




  ?>


  <!-- search modal popup started -->

  <?php
  echo '<div  class="modal-search">
  <div class="modal-search-bar">
    <form action="/college_walla/search" class="search-pc-modal" method="GET">
      <input type="search" name="search_college_modal" id="search_college_modal" placeholder="Search here..">

      <button class="modal-search-icon" type="submit"><i class="fa fa-search search-pc-icon"></i></button>

    </form>
  </div>
</div>';



  ?>

  <!-- search modal popup  ended here-->

  <!-- Modal is started  -->
  <?php require '_singup.php' ?>

  <!-- Modal is Ended -->








  <input type="checkbox" id="check">

  <!--header area start-->
  <header>
    <label for="check">
      <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
      <h3>College <span>Walla</span></h3>
    </div>
    <div class="right_area">

      <!-- <div class="logut-alert">
        <span>Logout</span>
      </div> -->
      <?php

      if (isset($_SESSION['logdin']) &&  $_SESSION['logdin'] == true) {
        //logout Button
        echo ' <a href="_file/_logout" class="logout_btn" id="logout"> <i class="fa fa-sign-out-alt"></i></a>';
      } else {
          //Login Button
        echo '<a  class="logout_btn login" id="login"> <i class="fas fa-user-plus"></i></a>';
      }

      ?>
      <a class="logout_btn " id="search"> <i class="fa fa-search"></i></a>

      <!-- <div class="logut-alert">
        <span>Sing out</span>
      </div> -->
    </div>
  </header>

  <!--header area end-->
  <!--mobile navigation bar start-->
  <div class="mobile_nav">
    <div class="nav_bar">
      <img src="img/profile.png" class="mobile_profile_image" alt="">
      <i class="fa fa-bars nav_btn mobile-nav"></i>
    </div>
    <form class="mobile_nav_items" action="/college_walla/search" method="get">
      <div class="search-box-mobile">
        <input type="text" name="search_college_modal" id="search-input" placeholder="Search here..">
        <input type="submit" class="fa fa-search mobile-search">
      </div>
      <a href="index"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="compare"><i class="fas fa-university"></i><span>Compere</span></a>
      <!-- <a href="#"><i class="fas fa-user-circle"></i><span>Account</span></a> -->
      <a href="index#contact-container"><i class="fas fa-headset"></i><span>Contact</span></a>
      <a href="index#about-us"><i class="fas fa-info-circle"></i><span>About</span></a>
      <!-- <a href="#"><i class="fas fa-file-alt"></i><span>Terms</span></a>
      <a href="#"><i class="fas fa-exclamation-triangle"></i><span>Privacy</span></a> -->
    </form>

  </div>
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">
      <img src="img/profile.png" class="profile_image" alt="profile">
      <h4>
        <?php
        if (isset($_SESSION['logdin']) && $_SESSION['logdin'] = true) {
          echo $_SESSION['user_name'];
        } else {
          echo 'Guest';
        }
        ?>

      </h4>
    </div>
    <a href="index"><i class="fas fa-home"></i><span>Home</span></a>
    <a href="compare"><i class="fas fa-university"></i><span>Compere</span></a>
    <a href="#"><i class="fas fa-user-circle"></i><span>Account</span></a>
    <a href="index#contact-container"><i class="fas fa-headset"></i><span>Contact</span></a>
    <!-- <a href="home#about-us"><i class="fas fa-info-circle"></i><span>About</span></a> -->
    <!-- <a href="#"><i class="fas fa-file-alt"></i><span>Terms</span></a>
    <a href="#"><i class="fas fa-exclamation-triangle"></i><span>Privacy</span></a> -->
  </div>
  <!--sidebar end-->