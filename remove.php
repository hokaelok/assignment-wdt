<?php
//connect database
include ("conn.php");
ob_start();
session_start();
//get Product_ID
$productID = $_GET['Product_ID'];
if(isset($_SESSION["user_email"])){

    $email =$_SESSION["user_email"];
//delete the data from database
$sql ="DELETE FROM shopping_cart WHERE Product_ID = '$productID' AND Email='$email'";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
    echo "<script>
            alert('Product had been remove from shopping cart.');
            window.location.href='cart.php';
            </script>";
    }
}
// close database connection
mysqli_close($con);
?>