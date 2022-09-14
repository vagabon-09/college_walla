<?php include '_file/_db-connect.php';
$clg=false;
session_start();
if (!isset($_SESSION['logdin']) && (!$_SESSION['logdin']==true)) {
    header('location:index?clg=true');
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare Colleges</title>
    <meta name="description" content="Compare colleges , compare colleges 100% free , and get admission in to the best colleges">
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
    <!-- header-call -->
    <?php include '_file/_header.php'; ?>
    <!-- header-call -->
    <div class="container">
        <div class="top-background"></div>
        <div class="top-down-lear">
            <div class="top-float">








                <form action="" class="search-bar-compare" method="POST">

                    <input name="search_1" class="search-compare search-compare-1" type="search" placeholder="College 1" title="Please type college 1" required>
                    <span class="or">And</span>
                    <input name="search_2" class="search-compare search-compare-2" type="search" placeholder="College 2" required>
                    <input class="compare_submit" type="submit" value="&#x1F50D;" title="Please type college 1">

                </form>

                <form action="" class="mobile-compare" method="POST">
                    <div class="mobile-input first-input"><input type="search" name="search_1" id="" placeholder="College 1">
                    </div>
                    <div class="and-mobile">And</div>
                    <div class="mobile-input seconde-input">
                        <input type="search" name="search_2" id="" placeholder="College 2">
                    </div>
                    <div class="search"><input type="submit" value="Compare"></div>


                </form>

                <div class="auto-text">
                    <span>Confused to choose college. Search here ,</span>
                     <span>*Please Search colleges with their full name.</span>
                </div>
            </div>
        </div>
        <div class="headline-text">
            <h3>Compare Result</h3>
        </div>
        <div class="compare-colleges-container">
            <div class="compare-colleges">



                <div class="college-1 college-details">


                    <?php
                    
                    //This code for first college details

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $compare_search_1 = $_POST['search_1'];
                        $compare_search_sql_1 = "SELECT * FROM `college-details` WHERE `college-name`='$compare_search_1'";
                        $compare_search_result_1 = mysqli_query($connect, $compare_search_sql_1);
                        $compare_search_row_1 = mysqli_num_rows($compare_search_result_1);
                        if ($compare_search_row_1 > 0) {
                            while ($compare_search_assoc_1 = mysqli_fetch_assoc($compare_search_result_1)) {

                                $compare_college_name_1 = $compare_search_assoc_1['college-name'];
                                $compare_college_content_1 = $compare_search_assoc_1['college-content'];
                                $comapare_college_id_1 = $compare_search_assoc_1['college-id'];
                                $comapare_college_slug_url_1 = $compare_search_assoc_1['slug_url'];
                                $Compare_know_more_1 = trim($comapare_college_slug_url_1,"/");
                                echo '
                                <div class="college-name-details">
                                    <h2> ' . $compare_college_name_1 . '</h2>
                                </div>
                                <div class="college-content-card">
                                    <span> ' . substr($compare_college_content_1, 0, 350) . '</span>
                                    <p><a class="compare_link_1 compare_link" href="/college?pid=' . $Compare_know_more_1 . '"> Know More </a></p>
                                </div>';
                            }
                        } else {
                            echo '<div class="no-content-alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Sorry we have no data about this college.</span>
                        </div>';
                        }
                    } else {
                        echo '<div class="no-content-alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Please search college.</span>
                    </div>';
                    }


                    ?>








                    <?php



//This code is for first table

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $college_name = $_POST['search_1'];
                        $compare_table_sql = "SELECT * FROM `comparetable` WHERE `compare_table_collage`='$college_name'";
                        $compare_table_result = mysqli_query($connect, $compare_table_sql);
                        $compare_table_row = mysqli_num_rows($compare_table_result);
                        if ($compare_table_row > 0) {
                            echo ' <div class="data-table">
                            <table>
                                <tr>
                                    <th>Most Searches</th>
                                    <th>Data From Users</th>
                                </tr>';
                            while ($compare_table_assoc = mysqli_fetch_assoc($compare_table_result)) {
                                echo '     
                                        <tr>
                                      <td>' . $compare_table_assoc['compare_table_title'] . '</td>
                                      <td>' . $compare_table_assoc['compare_table_disc'] . '</td>
                                      </tr>';
                            }
                        } else {
                            echo '<div class="no-content-alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Data Table does not avilable.</span>
                        </div>';
                        }
                    }


                    ?>






                    </table>
                </div>

            </div>

            <div class="and">&#9889</div>

            <div class="college-2 college-details">

                <?php


        //This code for second college content

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $compare_search_2 = $_POST['search_2'];
                    $compare_search_sql_2 = "SELECT * FROM `college-details` WHERE `college-name`='$compare_search_2'";
                    $compare_search_result_2 = mysqli_query($connect, $compare_search_sql_2);
                    $compare_search_row_2 = mysqli_num_rows($compare_search_result_2);
                    if ($compare_search_row_2 > 0) {
                        while ($compare_search_assoc_2 = mysqli_fetch_assoc($compare_search_result_2)) {

                            $compare_college_name_2 = $compare_search_assoc_2['college-name'];
                            $compare_college_content_2 = $compare_search_assoc_2['college-content'];
                            $comapare_college_id_2 = $compare_search_assoc_2['college-id'];
                            $comapare_college_slug_url_2 = $compare_search_assoc_2['slug_url'];
                            $knowMoreUrl = trim($comapare_college_slug_url_2,"/");
                            echo '<div class="college-name-details">
                                <h2>' . $compare_college_name_2 . '</h2>
                            </div>

                            <div class="college-content-card">
                                <span>' . substr($compare_college_content_2, 0, 350) . '</span>
                                <p><a class="compare_link_1 compare_link" href="/college?pid=' .    $knowMoreUrl . '"> Know More </a></p>
                            </div>';
                        }
                    } else {
                        echo '<div class="no-content-alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Sorry we have no data about this college.</span>
                    </div>';
                    }
                } else {
                    echo '    <div class="no-content-alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Please search college.</span>
                    </div>';
                }


                ?>





                <?php



            //This code for seconde table

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $college_name = $_POST['search_2'];
                    $compare_table_sql = "SELECT * FROM `comparetable` WHERE `compare_table_collage`='$college_name'";
                    $compare_table_result = mysqli_query($connect, $compare_table_sql);
                    $compare_table_row = mysqli_num_rows($compare_table_result);
                    if ($compare_table_row > 0) {
                        echo ' <div class="data-table">
                     <table>
                        <tr>
                       <th>Most Searches</th>
                      <th>Data From Users</th>
                     </tr>';
                        while ($compare_table_assoc = mysqli_fetch_assoc($compare_table_result)) {
                            echo '     
                       <tr>
                      <td>' . $compare_table_assoc['compare_table_title'] . '</td>
                      <td>' . $compare_table_assoc['compare_table_disc'] . '</td>
                     </tr>';
                        }
                    }else {
                        echo'<div class="no-content-alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Data Table does not avilable.</span>
                    </div>';
                    }
                }


                ?>

            </div>
        </div>
    </div>
    </div>
    <script src="js/header.js"></script>
    <script src="js/footer.js"></script>
</body>

</html>