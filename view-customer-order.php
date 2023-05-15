<?php
// connect to database
include('conn.php');
// start session
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Paws Heaven View Customer Order</title>

    <!-- Common Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Import CSS Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Import jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Display Header & Footer -->
    <script>
        $(function(){ 
            $("#header").load("common/header.php");
            $("#footer").load("common/footer.php");
        });

    </script>
    <style>
        .viewOrder {
            width: 95%;
            margin: auto;
            border: 1px solid black;
            background-color: blanchedalmond;
        }

        .viewOrder td, 
        .viewOrder th {
            border: 1px solid black;
            min-width: 90px;
        }
    </style>
</head>
<body>
<!-- Header -->
<div id="header"></div>
<!-- Main Content -->
<div class="content-area">
    <h2>Orders</h2>
    <hr>
    <!-- table header -->
    <table class="viewOrder">
        <tr>
            <th>Order ID</th>
            <th>Customer Email</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Purchase Date</th>
            <th>Shipping Address</th>
            <th>Card Number</th>
            <th>Receipt Code</th>
        </tr>
        
        <?php  
            // get order info from orders table
            $sql = mysqli_query($con, "SELECT * FROM orders ORDER BY Order_ID  desc");
            while($row = mysqli_fetch_array($sql)) {
                $Order_ID = $row["Order_ID"];
                $Customer_Email = $row["Email"];
                $Product_ID = $row['Product_ID'];
                $Quantity = $row['Quantity'];
                $Price = $row['Price'];
                $Purchase_Date = $row['Purchase_Date'];
                $Shipping_Address = $row['Shipping_Address'];
                $Card_Number = $row['Card_Number'];
                $Receipt_Code = $row['Receipt_Code'];
        
                // get product info from product table
                $sql_run = mysqli_query($con, "SELECT * FROM product WHERE Product_ID = '$Product_ID'");
                while ($row = mysqli_fetch_assoc($sql_run)) {
                    $Product_Name = $row['Product_Name'];
        ?>

        <tr>
            <td><?php print $Order_ID ?></td>
            <td><?php print $Customer_Email ?></td>
            <td><?php print $Product_Name ?></td>
            <td><?php print $Quantity ?></td>
            <td><?php print $Price ?></td>
            <td><?php print $Purchase_Date ?></td>
            <td><?php print $Shipping_Address ?></td>
            <td><?php print $Card_Number ?></td>
            <td><?php print $Receipt_Code ?></td>
        </tr>

        <?php } 
            }
        ?>

    </table>


</div>
</body>
<!-- Footer -->
<div id="footer"></div>
</html>