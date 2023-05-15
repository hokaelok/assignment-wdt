<?php
//connect database
include ("conn.php");
ob_start();
session_start();
//get Product_ID
$productID = $_GET['Product_ID'];

//delete the data from database
$sql ="DELETE FROM product WHERE Product_ID='$productID'";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
    echo "<script>
            alert('Product had been deleted.');
            window.location.href='view-product.php';
            </script>";
    }

// close database connection
mysqli_close($con);
?>