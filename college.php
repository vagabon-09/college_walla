<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="College Walla" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/college.css" type="text/css">
    <link rel="stylesheet" href="css/compare.css" type="text/css">
    <link rel="stylesheet" href="css/college.css" type="text/css">
    <link rel="stylesheet" href="css/query.css" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- <base href="http://localhost/college_walla/" target="_self"> -->
</head>


<body>


    <!-- header call  -->
    <?php include '_file/_header.php'; ?>
    <!-- header call  -->




    <!-- give rating  -->
    <!-- <div class="rating-system">

        <div class="give-rating">

            <div class="rate-please">
                <h3>Please Rate This college</h3>
            </div>
            <div class="college-rate">
                <div class="rate-all placement">
                    <h4>Placement:</h4>
                    <div class="placemnt-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
                <div class="rate-all campus">
                    <h4>Campus Life:</h4>
                    <div class="placemnt-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
                <div class="rate-all calture">
                    <h4>College Calture:</h4>
                    <div class="placemnt-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
                <div class="rate-all best-branch">
                    <h4>Best Branch:</h4>
                    <div class="placemnt-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
        </div>

    </div> -->
    <!-- give rating end here  -->


    <?php
    $slug_url = $_GET['pid'];
    echo $slug_url;
    $college_sql = "SELECT * FROM `college-details` WHERE `slug_url` = '/$slug_url'";
    $college_result = mysqli_query($connect, $college_sql);
    $college_row = mysqli_num_rows($college_result);

    if ($college_row > 0) {
        while ($college_assoc = mysqli_fetch_assoc($college_result)) {
            $title = $college_assoc['college-name'];
            $postid = $college_assoc['college-id'];

            echo '
            
            <title>' . $college_assoc['college-name'] . '</title>
            <div class="container">
              <div class="college-content">
                  <div class="background-container">
                      <div class="college-image">
                          <img class="img-college " src="img/' . $college_assoc['college_img'] . '" alt="college-name">
                      </div>
                  </div>
                  <div class="college-rate-name"> </div>
                  <div class="rate-name">
          
                      <div class="college-name">
                     <h1> ' . $college_assoc['college-name'] . '</h1>
                      </div>
                      <div class="college-rate">
                          <div class="rate-2">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                          </div>
                          <div class="review-number">
                              <span>41/50</span>
                          </div>
                          <div class="rate-btn">
                              <a href=""><i class="fa fa-edit"></i></a>
                          </div>
                      </div>
                      <div class="share-post">
                          <a href="#"><i class="fab fa-facebook"></i></a>
                          <a href="#"><i class="fab fa-whatsapp"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                          <a href="#"><i class="fas fa-share-alt"></i></a>
                      </div>
                  </div>
          
                  <div class="college-contetn">
                  ' . $college_assoc['college-content'] . '
                  </div>
          
              </div>';
    ?>


            <div class="college-query">


                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // $postid = $_GET['pid'];
                    $query_title = $_POST['query_title'];
                    $query_title = str_replace("<", "&lt;", "$query_title");
                    $query_title = str_replace(">", "&gt;", "$query_title");


                    $query_explain = $_POST['query_explain'];
                    $query_explain = str_replace("<", "&lt;", "$query_explain");
                    $query_explain = str_replace(">", "&gt;", "$query_explain");

                    $send_login_user_id = $_POST['login_user_id'];


                    // adding new 
                    $query_title = $_POST['query_title'];
                    $slug_url = strtolower($query_title);
                    $slug_url = '/' . str_replace(" ", "-", $slug_url);
                    $slug_url =  str_replace("?", "", $slug_url);


                    $query_send = "INSERT INTO `query` ( `query_post_id`, `query_title`, `query_content`,  `login_user_id`,`slug_url`) VALUES ('$postid', '$query_title', '$query_explain', '$send_login_user_id',  '$slug_url') ";//somoe thing new was added
                    $query_send_result = mysqli_query($connect, $query_send);

                    if (!$query_send_result) {
                        echo 'Sorry Your query not submited';
                    } else {
                        echo 'Your query submited';
                    }
                }

                ?>




                <?php
                if (isset($_SESSION['logdin']) && $_SESSION['logdin'] == true) {
                    echo '<div class="query-name">
                    <h2>PUT YOUR QUERY</h2>
                </div>
                    
                    <div class="post-query">
                    <form class="form" action="" method="POST">
                        <label for="query">What is your query?</label>
                        <input type="text" placeholder="How is this college?" name="query_title"required>
                        <input input type="hidden" type="text" name="login_user_id"required value="' . $_SESSION['login_user_id'] . '">
                       

                        <div class="text-input">
                            <label for="explain">Explain Your Query</label>
                            <textarea id="explain" placeholder="Explain your Query for answer purposes..." name="query_explain" required></textarea>
                        </div>
                        <input class="submit" type="submit" value="Submit">

                    </form>
                 </div>';
                } else {
                    echo '  <div class="alert login" id="warning">
                    <div class="left">
                        <i class="fas fa-exclamation-triangle"></i>
                        <p>please <span>login</span>  first to post your query. </p>
                    </div>
                </div>';
                }

                ?>

        <?php
            echo '<div class="query">
             <h2>All QUERIES</h2>
             </div>';
            //  this is my college id 
            // echo $postid;
            $query_sql = "SELECT * FROM `query` WHERE `query_post_id`='$postid' ORDER BY query_id DESC";
            $query_result = mysqli_query($connect, $query_sql);
            $query_row = mysqli_num_rows($query_result);
            if ($query_row > 0) {
                while ($query_assoc = mysqli_fetch_assoc($query_result)) {


                    echo '
          
                  <a class="post-query-show post-query-a" href="query?qid=' . $query_assoc['query_id'] . '">
                      <div class="post-query-show-box">
                          <div class="queries">
                              <div class="profile-query">
                                  <img src="img/profile-2.jpg" alt="profile">
                              </div>
                              <div class="query-show">
                                  <div class="query-title-explain">
                                      <div class="query-title">
                                          <h2>' . $query_assoc['query_title'] . '</h2>
                                      </div>
                                      <div class="query-explain">
                                          <span>' . $query_assoc['query_content'] . '</span>
                                      </div>
                                  </div>
          
                              </div>
                          </div>
                      </div>
                  </a>

          
          
          
          
          
                 ';
                }
            }
            //             echo ' <div class="know-more">
            //             <h4>Read More...</h4>
            //         </div>
            //     </div>
            //    </div>';
        }
    }





        ?>








        <script src="js/header.js"></script>
        <script src="js/footer.js"></script>
</body>

</html>