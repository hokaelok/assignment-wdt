<?php
ob_start();
session_start();
include "conn.php";
    $Product_ID=$_POST['product_id'];
    $review=$_POST['review'];
    if(isset($_SESSION["user_email"])){
        $email = $_SESSION["user_email"];
        $sql= "SELECT * FROM orders WHERE Product_ID = '$Product_ID' AND Email= '$email'";
        $run_query = mysqli_query($con,$sql);
        if(mysqli_num_rows($run_query) > 0){
            $run=mysqli_query($con, "SELECT Order_ID FROM orders WHERE Product_ID = '$Product_ID' AND Email= '$email'");
            while ($row=mysqli_fetch_assoc($run)) {
                $order_id=$row['Order_ID'];
                $sql = "INSERT INTO feedback
                (Order_ID,Email,Product_ID,Review) 
                VALUES ('$order_id','$email','$Product_ID','$review')";
                if(mysqli_query($con,$sql)){
                    echo "<script>
                    alert('Review had been successfully added.');
                    window.history.back();
                    </script>";
                }
            }
        }
        else{
            echo "<script>
            alert('You are not able to leave review as you never buy the product.');
            window.history.back();
            </script>";
        }
    }
    else{
        echo"<script>
        alert('You need to sign in first.');
        window.location.href='registration_panel.php';
        </script>";
    }
?>