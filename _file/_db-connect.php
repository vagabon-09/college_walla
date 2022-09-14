<?php 
$servername = "localhost";
$username = "root";
$password="";
$database="collegewalla";
$connect=mysqli_connect($servername,$username,$password,$database);

if (!$connect) {
    echo"Data Base is not connected";
}
// else {
//     echo"Sucessfully Connected";
// }

?>