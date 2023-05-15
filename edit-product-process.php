<?php
ob_start();
session_start();
include "conn.php";
if (isset($_POST["submitBtn"])) {
    $Product_ID = $_POST['Product_ID'];
    $Product_Name = $_POST["Product_Name"];
    $Brand = $_POST["Brand"];
    $Type_of_Animal = $_POST["Type_of_Animal"];
    $Category = $_POST["Category"];
    $Description = $_POST["Description"];
    $Price = $_POST["Price"];
    $Quantity = $_POST["Quantity"];

    $mysql_run= mysqli_query($con,"UPDATE product SET
    Product_Name = '$Product_Name',
    Brand = '$Brand',
    Type_of_Animal = '$Type_of_Animal',
    Category = '$Category',
    Description = '$Description',
    Price = '$Price',
    Quantity = '$Quantity'
    WHERE Product_ID = '$Product_ID'");
    // if succesful
    print "<script>alert('Product Information Updated!'); window.location.href='view-product.php';</script>";
    
}
?>