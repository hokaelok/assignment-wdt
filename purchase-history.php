<?php
include("conn.php"); 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Paws Heaven</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script>
            $(function(){ 
                $("#header").load("common/header.php");
                $("#footer").load("common/footer.php");
            });

        </script>
    </head>
    <body>
    <!-- Ref - https://www.w3schools.com/php/php_mysql_select.asp -->
    <!-- Top display -->
    <div id="header"></div>
    <div class="content-area align-items-center">  <!-- content area -->
        <h2 style="text-align: center;">Purchase History</h2>

        <!-- Table details -->
        <div class="container rounded">  <!-- table start -->
        <div class="row bg-dark mt-5 d-flex align-items-center" style="align-items: center; padding: 15px 0px">
            <div class="col-md-5 text-light fs-5 fw-bold sora" style="text-align: left">Product Name</div>
            <div class="col-md text-light fs-5 fw-bold sora" style="text-align: right">Quantity</div>
            <div class="col-md text-light fs-5 fw-bold sora" style="text-align: right">Transaction Date</div>
            <div class="col-md text-light fs-5 fw-bold sora" style="text-align: right">Order ID</div>
        </div>
        <!-- Order items Items -->
        <?php 
            //connect database
            include ("conn.php");
            //get data from database
            if(isset($_SESSION["user_email"])){
                $email = $_SESSION["user_email"];
                $sql_run=mysqli_query($con, "SELECT * FROM orders WHERE Email = '$email'");
                while ($row=mysqli_fetch_assoc($sql_run)) {
                    $Product_ID=$row['Product_ID'];
                    $Quantity=$row['Quantity'];
                    $Purchase_Date=$row['Purchase_Date'];
                    $Order_ID=$row['Order_ID'];
                    $mysql_run=mysqli_query($con, "SELECT * FROM product WHERE Product_ID='$Product_ID'");
                    while ($row=mysqli_fetch_assoc($mysql_run)) {
                        $Product_Name=$row["Product_Name"];
                echo '
                <div class="row bg-secondary align-items-center" style="align-items: center; padding: 7px 0px">
                    <div class="col-md-5 text-light" style="text-align: left">'.$Product_Name.'</div>
                    <div class="col-md text-light" style="text-align: right">'.$Quantity.'</div>
                    <div class="col-md text-light" style="text-align: right">'.$Purchase_Date.'</div>
                    <div class="col-md text-light" style="text-align: right">'.$Order_ID.'</div>
                    <div class="w-100"></div>
                </div>';
                    }
                }
            }
            else{
                echo"<script>
                alert('You need to sign in first to access this page.');
                window.location.href='registration_panel.php';
                </script>";
            }
        ?>
    <!-- If no order Items -->

        </div> <!-- close entire table-->
    </div> <!-- close entire content area-->
    </body>
    <div id="footer"></div>
</html>
