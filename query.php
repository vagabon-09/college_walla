<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <base href="http://localhost/college_walla/" target="_self">
</head>

<body>
    <!-- header call  -->
    <?php include '_file/_header.php'; ?>
    <!-- header call  -->
    <div class="container">
        <div class="query-in-ans">
            <div class="page-title-name-query">
                <?php
                $query_id = $_GET['qid'];
                $query_sql = "SELECT * FROM `query` WHERE `query_id`='$query_id'";
                $query_result = mysqli_query($connect, $query_sql);
                $query_row = mysqli_num_rows($query_result);
                if ($query_row > 0) {
                    while ($query_assoc = mysqli_fetch_assoc($query_result)) {
                        $logdin_user_id = $query_assoc['login_user_id'];
                        $logdin_user_sql = "SELECT * FROM `user` WHERE `user_id`='$logdin_user_id'";
                        $logdin_user_result = mysqli_query($connect, $logdin_user_sql);
                        $logdin_user_assoc = mysqli_fetch_assoc($logdin_user_result);



                        echo ' <div class="query-for-ans">
                        <div class="query-title">
                            <h2>' . $query_assoc['query_title'] . '</h2>
                            <h6><span>Posted by</span> ' . $logdin_user_assoc['user_name'] . '</h6>
                        </div>
                        <div class="query-explain">
                            <span>' . $query_assoc['query_content'] . '</span>
                        </div>
                    </div>';
                    }
                }

                ?>




            </div>


            <?php
            $query_id = $_GET['qid'];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $query_responsed = $_POST['query_responsed'];
                $query_responsed = str_replace("<", "&lt;", "$query_responsed");
                $query_responsed = str_replace(">", "&gt;", "$query_responsed");



                $query_user_id = $_POST['login_user_id'];
                $query_ans_sql = "INSERT INTO `replay_query`(`query_id`, `replay_content`,`query_user_id`) VALUES ('$query_id','$query_responsed','$query_user_id')";
                $query_result = mysqli_query($connect, $query_ans_sql);
                if ($query_result) {
                    // echo 'Yes your qury is posted';
                } else {
                    echo '<div class = posted_query>sorry there have some issue</div>';
                }
            }
       



            ?>
            <div class="post-query-ans">
                <div class="inner-form">


                    <?php
                    if (isset($_SESSION['logdin']) && $_SESSION['logdin'] == true) {
                        echo ' <form class="query-form" action="query?qid=' . $query_id . '" method="POST">
                  <label class="query-ans-by-user" for="query-ans-by-user">Responsed this query</label>
                  <textarea name="query_responsed" id="query-ans-input" cols="10" rows="5" placeholder="Yes this college is good / bad" required></textarea>
                  <input class="query-submit-btn" type="submit" value="Submit">
                  <input name="login_user_id" type="hidden" value="' . $_SESSION['login_user_id'] . '">
                     </form>';
                    } else {
                        echo '<div class="alert login" id="warning">
                        <div class="left">
                            <i class="fas fa-exclamation-triangle"></i>
                            <p>please <span>login</span>  first to Answer this. </p>
                        </div>
                    </div>';
                    }

                    ?>


                </div>
            </div>






            <div class="query-heading">
                <h3>Discussions</h3>
            </div>
            <div class="queries-ans-box">

                <?php
                $qid = $_GET['qid'];
                // echo $qid;
                $replay_sql = "SELECT * FROM `replay_query` WHERE `query_id`='$qid' ORDER BY replay_id DESC";
                $replay_result = mysqli_query($connect, $replay_sql);
                $replay_row = mysqli_num_rows($replay_result);
                // echo $replay_row;
                if ($replay_row > 0) {
                    while ($replay_assoc = mysqli_fetch_assoc($replay_result)) {
                        $logdin_user_id = $replay_assoc['query_user_id'];
                      



                        $logdin_user_sql = "SELECT * FROM `user` WHERE `user_id`='$logdin_user_id'";
                        $logdin_user_result = mysqli_query($connect, $logdin_user_sql);
                        $logdin_user_assoc = mysqli_fetch_assoc($logdin_user_result);

                        echo '<div class="query-ans-box">
                        <div class="center-image">
                            <div class="queryans-profile">
                                <img src="img/profile-2.jpg" alt="profile">
                            </div>
                        </div>
    
                        <div class="response">
                            <div class="query-title">
                                <div class="responsed-name"><span>-posted by <b>' . $logdin_user_assoc['user_name'] . '</b></span> <span>-posted on
                                        <b>' . $replay_assoc['replay_date'] . '</b></span></div>
                                <div class="solve-query">
                                    <span>' . $replay_assoc['replay_content'] . '</span>
                                </div>
    
                            </div>
    
    
    
                        </div>
    
                    </div>';
                    }
                }



                ?>









            </div>


        </div>

        <!-- <div class="read-more">
            <a class="read-more-a" href="#">Read More..</a>
        </div> -->

    </div>
    <script src="js/header.js"></script>
    <script src="js/footer.js"></script>
</body>

</html>