<?php
include '_file/_db-connect.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CollegeWalla - search your college</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/college.css" type="text/css">
  <link rel="stylesheet" href="css/compare.css" type="text/css">
  <link rel="stylesheet" href="css/college.css" type="text/css">
  <link rel="stylesheet" href="css/query.css" type="text/css">
  <link rel="stylesheet" href="css/alert.css" type="text/css">
  <link rel="stylesheet" href="css/search.css" type="text/css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  
  <base href="http://localhost/college_walla/" target="_self">
</head>

<body onload="slider()">
  <!-- call header  -->
  <?php include '_file/_header.php'; ?>
  <!-- call header  -->

  <!-- <div class="draggable-search">
    <input type="text" class="input " placeholder="search here">
    <a href="#" class="draggable-search-icon"><i class="fas fa-search"></i></a>
  </div> -->

  <!-- <div class="search-bar">
    <input type="text" class="textbox" placeholder="type here..." />
    <a class="search-btn" href="#">
      
      </div> -->

  <div class="content">

    <?php
    if (isset($_GET['clg'])) {
      echo '<style>
      .popup{
        display:block;
      }
      </style>';
    }





    // singup success 
    if (isset($_GET['singupsuccess']) && $_GET['singupsuccess'] == true) {
      echo '<div class="alert" id="success">
    <div class="left">
      <p>Your account is successfuly created. please remamber your user id </p>
    </div>

    <div class="right">
      <span class="close_btn"><i class="fas fa-times x"></i></span>
    </div>
    </div>';
    }
    // login success 
    if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == true) {
      echo '<div class="alert" id="success">
    <div class="left">
      <p>Success! You successfuly login. Now you can post query. </p>
    </div>

    <div class="right">
      <span class="close_btn"><i class="fas fa-times x"></i></span>
    </div>
    </div>';
    }
    //logout succes
    if (isset($_GET['logoutsuccess']) && $_GET['logoutsuccess'] == true) {
      echo '<div class="alert faild" id="success">
    <div class="left">
      <p>Success! You success fully logouted. </p>
    </div>

    <div class="right">
      <span class="close_btn"><i class="fas fa-times x"></i></span>
    </div>
    </div>';
    }

    //login not success
    if (isset($_GET['loginfaild']) && $_GET['loginfaild'] == true) {
      echo '<div class="alert faild" id="success">
      <div class="left">
      <p>Sorry! This user name dose not exist. </p>
      </div>

      <div class="right">
      <span class="close_btn"><i class="fas fa-times x"></i></span>
      </div>
      </div>';
    }

    //login password not march
    if (isset($_GET['loginfaild']) && $_GET['loginfaild'] == true) {
      echo '<div class="alert faild" id="success">
      <div class="left">
      <p>Sorry! Your Enterd wrong password. </p>
      </div>

      <div class="right">
      <span class="close_btn"><i class="fas fa-times x"></i></span>
      </div>
      </div>';
    }

    //login user name  exist
    if (isset($_GET['unmext']) && $_GET['unmext'] == true) {
      echo '<div class="alert" id="warning">
      <div class="left">
      <p>Warning! Your enterd user name already exist. </p>
      </div>

      <div class="right">
      <span class="close_btn"><i class="fas fa-times x"></i></span>
      </div>
      </div>';
    }
    //login email exist
    if (isset($_GET['emlexst']) && $_GET['emlexst'] == true) {
      echo '<div class="alert" id="warning">
      <div class="left">
      <p>Warning! Your enterd email already exist. Try with another user name. </p>
      </div>

      <div class="right">
      <span class="close_btn"><i class="fas fa-times x"></i></span>
      </div>
      </div>';
    }
    //login password not match
    if (isset($_GET['pntmatch']) && $_GET['pntmatch'] == true) {
      echo '<div class="alert" id="warning">
      <div class="left">
      <p>Opps! Your enterd passwords are not matched. </p>
      </div>

      <div class="right">
      <span class="close_btn"><i class="fas fa-times x"></i></span>
      </div>
      </div>';
    }
    //Singup not success
    if (isset($_GET['nsbmt']) && $_GET['nsbmt'] == true) {
      echo '<div class="alert" id="faild">
      <div class="left">
      <p>Sorry! There have somthing wrong. Please try againg after some time </p>
      </div>

      <div class="right">
      <span class="close_btn"><i class="fas fa-times x"></i></span>
      </div>
      </div>';
    }

    ?>






    <!-- slider  -->
    <div class="banner">
      <div class="slider">
        <img src="img/collage-1.jpg" id="slideimg" alt="College_Walla">
      </div>
      <div class="overlera">

        <div class="slider-content">
          <h1>DISCOVER COLLEGES </h1>
          <h3 class="typewrite " data-period="2000" data-type='[ "Hi welcome!.", "Know about your colleges.", "Finde best colleges in india", "compare your favorute colleges","and get andmision into best", "Know about your college informetion from that college student" ]'>
          </h3>
          <div>
            <button class="button" type="button">EXPLORE</button>

            <a href="compare"><button class="button button-2" type="button">COMPARE</button></a>
          </div>
        </div>

      </div>
    </div>
    <!-- slider  -->











    <div class="heading">
      <h2>TOP COLLEGES </h2>
    </div>
    <div class="college-cards">

      <div class="cards">



        <?php
        $post_limit = 9;
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $ofset = ($page - 1) * $post_limit;




        $home_sql = "SELECT * FROM `college-details` ORDER BY `college-id` DESC LIMIT $ofset , $post_limit";
        $home_result = mysqli_query($connect, $home_sql);
        $home_row = mysqli_num_rows($home_result);

        if ($home_row > 0) {

          while ($home_fetch = mysqli_fetch_assoc($home_result)) {
            $postid = $home_fetch['college-id'];
            $slug=$home_fetch['slug_url'];
            echo '<a class="card-a" href="http://localhost/college_walla' . $slug . '">
        <div class="card card-1">
          <div class="img">
            <img src="img/' . $home_fetch['college_img'] . '" alt="' . $home_fetch['college_img'] . '">
          </div>
          <div class="card-content">
            <h4>' . substr($home_fetch["college-name"],0,33). '...</h4>

           ' . substr($home_fetch["college-content"], 0, 130) . '
            <div class="rating-info">
              <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
              </div>
              <div class="rate">
                <p><b>' . $postid . '/15</b></p>
              </div>
            </div>
          </div>
        </div>
        </a>';
          }
        }

        ?>


      </div>

      <div class="pagination-container">
        <?php


        $pagination_sql = "SELECT * FROM `college-details`";
        $pagination_result = mysqli_query($connect, $pagination_sql) or die("Sorry there have some problem");
        if (mysqli_num_rows($pagination_result) > 0) {
          //  echo'Yes there have some rows';
          $total_data = mysqli_num_rows($pagination_result);

          $total_pages = ceil($total_data / $post_limit);

          echo '<div class="pagination">';

          if ($page > 1) {
            echo '<a href="/college_walla/index?page=' . ($page - 1) . '">&laquo;</a>';
          }
          for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
              $active = "active";
            } else {
              $active = "";
            }
            echo '<a class="' . $active . '" href="/college_walla/index?page=' . $i . '">' . $i . '</a>';
          }

          if ($total_pages > $page) {
            echo '<a href="/college_walla/index?page=' . ($page + 1) . '">&raquo;</a>';
          }
          echo '</div>';
        }
        ?>










      </div>




    </div>

    <div class="why-us">
      <span class="question-mrk">?</span>
      <h2>WHY COLLEGE WALLA ?</h2>
      <div class="why-us-content">
        <span> </span>

      </div>

    </div>
  </div>







  <div id="about-us" class="about-us">
    <div class="about-h">
      <h2>ABOUT US</h2>
    </div>
    <div class="profile owl-carousel">

      <?php

      $about_sql = "SELECT * FROM `about-us`";
      $about_result = mysqli_query($connect, $about_sql);
      $about_row = mysqli_num_rows($about_result);

      if ($about_row > 0) {
        while ($about_fetch = mysqli_fetch_assoc($about_result)) {
          echo ' <div class="profile-card">

          <div class="img">
            <img src="' . $about_fetch["about-image"] . '" alt="p">
          </div>
  
          <div class="about-me">
            <h3>' . $about_fetch["about-name"] . '</h3>
            <div class="pfl-cntnt">
              <span>' . substr($about_fetch["about-details"], 0, 150) . '</span>
            </div>
          </div>
  
          <div class="follow">
            <a class="fb follow-icon" href="' . $about_fetch["facebook"] . '"><i class="fab fa-facebook-square"></i></a>
            <a class="insta follow-icon" href="' . $about_fetch["insta"] . '"><i class="fab fa-instagram-square"></i></a>
            <a class="lnkdn follow-icon" href=" href="' . $about_fetch["lnkdn"] . '""><i class="fab fa-linkedin"></i></a>
          </div>
  
        </div>';
        }
      }




      ?>








    </div>



  </div>


  <!-- //Contact is started from here  -->
  <div class="contact-container" id="contact-container">
    <h1>Connect With Us </h1>
    <p>We could love to respond to your queries and help you succeed. <br> Feel free to get in touch with us.</p>
    <div class="Inner-box">

      <div class="Contact-box">
        <div class="Contact-left">
          <h3>Send your request</h3>




          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $contact_name = $_POST['contact_name'];
            $contact_phone = $_POST['contact_phone'];
            $contact_email = $_POST['contact_email'];
            $contact_about = $_POST['contact_subject'];
            $contact_messege = $_POST['contact_messege'];

            $contact_sql = "INSERT INTO `contact_us`( `contact_name`, `contact_phone`, `contact_email`, `contact_about`, `contact_messge`) VALUES (' $contact_name','$contact_phone',' $contact_email',' $contact_about ','$contact_messege')";
            $contact_result = mysqli_query($connect, $contact_sql);

            if ($contact_result) {
              echo '<div id="success">Thank you for contacting , as soon as posible we will replay</div>';
            } else {
              echo '<div id="faild">Your submission is not complete please try again</div>';
            }
          }

          ?>

          <form action="index#contact-container" method="POST">
            <div class="input-row">
              <div class="input-group">
                <label>Name</label>
                <input type="text" name="contact_name" placeholder="Anupam Singh" required>
              </div>
              <div class="input-group">
                <label>Phone</label>
                <input type="tel" name="contact_phone" placeholder="+91 1234567890" minlength="10" maxlength="10">
              </div>
              <div class="input-group">
                <label>Email</label>
                <input type="email" name="contact_email" placeholder="xyz@email.com" required>
              </div>
              <div class="input-group">
                <label>Subject</label>
                <input type="text" name="contact_subject" placeholder="About">
              </div>

            </div>
            <div class="input-group">
              <label>Message</label>
              <textarea rows="5" name="contact_messege" placeholder="Your message Here" required></textarea>
            </div>
            <button class="contact-botton" type="submit">Send</button>

          </form>



        </div>
        <div class="Contact-right">
          <h3>Reach us</h3>

          <table class="contact-table">
            <tr>
              <td>Phone</td>
              <td> 9973227445, 9775947315, 8509265016, 6289824013, 6204282339</td>

            </tr>
            <tr>
              <td>Email</td>
              <td> </td>

            </tr>

            <tr>
              <td>Address</td>
              <td>Barrackpore - Kalyani Expy, Block A5, Block A, Kalyani, West Bengal 741235</td>

            </tr>
          </table>

        </div>

      </div>
    </div>
  </div>
  <!-- //Contact is Ending here  -->






  <!-- footer box started from here  -->
  <div class="footer-box">
    <div class="footer-credit">
      <p>Copyright &#169; 2021 Reserved by &#x265B;<a href="index.html">Tech Phantoms</a> </p>
    </div>
    <div class="top-btn">
      <a href="#"><i class="fas fa-arrow-up"></i></a>
    </div>
  </div>
  <!-- footer box ended  here  -->


  <script src="js/header.js"></script>
  <script src="js/footer.js"></script>

</body>

</html>