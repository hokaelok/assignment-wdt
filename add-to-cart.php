<?php
//connect to database
include("conn.php"); 
// start session
ob_start();
session_start();
    //get product id from previous page
    $Product_ID = $_GET["Product_ID"];
    //get price from database
    $mysql_run=mysqli_query($con, "SELECT Price FROM product WHERE Product_ID = '$Product_ID';");
    while ($row=mysqli_fetch_assoc($mysql_run)) {
       $Price=$row["Price"];
    if(isset($_SESSION["user_email"])){

        $email = $_SESSION["user_email"];
        //check is the product already in user shopping cart
        $sql = "SELECT * FROM shopping_cart WHERE Product_ID = '$Product_ID' AND Email = '$email'";
        $run_query = mysqli_query($con,$sql);
        $count = mysqli_num_rows($run_query);
        //if the product exist then increase quantity of the product by 1
        if($count > 0){
            $sql_run=mysqli_query($con, "SELECT Quantity FROM shopping_cart WHERE Product_ID = '$Product_ID' AND Email = '$email'");
            while ($row=mysqli_fetch_assoc($sql_run)) {
                $Quantity=$row['Quantity'];
                $NewQuantity=$Quantity+1;
            $update= "UPDATE shopping_cart SET Quantity='$NewQuantity' WHERE Product_ID = '$Product_ID' AND Email = '$email'";
            $sql2 = mysqli_query($con, $update);
            echo "<script>
            alert('Product is already in the cart.');
            window.location.href='index.php';
            </script>";
            }
        } 
        else {
            //if the product not exist then insert the data into database
            $sql = "INSERT INTO shopping_cart
            (Email,Product_ID, Quantity, Price) 
            VALUES ('$email','$Product_ID','1','$Price')";
            if(mysqli_query($con,$sql)){
                echo "<script>
                    alert('Product is added in the cart.');
                    window.location.href='index.php';
                    </script>";
                exit();
            }
        }	
    }	
    else {
        echo"<script>
            alert('You need to sign in first to access this page.');
            window.location.href='registration_panel.php';
            </script>";
    }
};
?>	