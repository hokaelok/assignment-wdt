<?php
//Connect to database
$con=mysqli_connect("localhost","root", "" ,"paws_heaven","3306");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>