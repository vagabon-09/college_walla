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
    <link rel="stylesheet" href="css/search.css" type="text/css">
    <base href="http://localhost/college_walla/" target="_self">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</head>

<body>
    <div class="container">
        <?php include '_file/_header.php'; ?>

        <div class="search-result">
            <div class="search-container">
                <div class="search-heading">
                    <h2>Your Search results </h2>
                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $search_text = $_GET['search_college_modal'];
                    $search_sql = "SELECT * FROM `college-details` WHERE MATCH(`college-name`, `college-content`) AGAINST('$search_text')";
                    $search_result = mysqli_query($connect, $search_sql);
                    $search_row = mysqli_num_rows($search_result);
                    if ($search_row > 0) {

                        while ($search_assoc = mysqli_fetch_assoc($search_result)) {
                            $str = trim($search_assoc['slug_url'], "/");

                            echo '<a class="search_content_a" href="/college_walla/college?pid='.$str.'"><div class="results">
                            <div class="result-title">
                                <h4>'.$search_assoc['college-name'].'</h4>
                            </div>
                            <div class="result-details"><span>'.substr($search_assoc['college-content'],0,150).'</span></div>
                        </div></a>';
                        }
                    } else {
                        echo 'Sorry there have no search result';
                    }
                }



                ?>


            </div>
        </div>

    </div>
    <script src="js/header.js"></script>
    <script src="js/footer.js"></script>
</body>

</html>