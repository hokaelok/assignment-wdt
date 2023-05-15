<?php
ob_start();
session_start();
include "conn.php";
    $Product_ID=$_POST['product_id'];
    $quantity=$_POST['quantity'];
    if(isset($_SESSION["user_email"])){
        $email = $_SESSION["user_email"];
        $sql= "UPDATE shopping_cart SET Quantity='$quantity' WHERE Product_ID = '$Product_ID' AND Email= '$email'";
        if(mysqli_query($con,$sql)){
            echo "<script>
            alert('Quantity had been successfully updated.');
            window.location.href='cart.php';
            </script>";
        }
    }