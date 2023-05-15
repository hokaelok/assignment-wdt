<?php
ob_start();
session_start();

//connect database
include ("conn.php");
?>

<!-- quantity fix -->
<!-- flexible
ID > Name refer to product decript -->
<!-- total price count > sum   formula  zhi ji lai -->

<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Paws Heaven Cart</title>

    <!-- Common Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Import CSS Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="cart-trail.css" rel="stylesheet">

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
        .parentBox {
            height: auto;
        }

        .childBox {
            border: 1px solid black;
            height: 250px;
            margin-bottom: 10px;
        }

        .productImageHolder {
            border-right: 1px solid grey;
            float: left;
            width: 350px;
            height: 100%;
            margin-left: 30px;
            padding-top: 5px;
            padding-right: 35px;
        }

        .productPurchase {
            border-right: 1px solid grey;
            float: left;
            width: 40%;
            height: 100%;
            padding: 20px;
        }

        .productName {
            border-bottom: 1px solid grey;
            padding-top: 25px;
            height: 50%;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .priceTitle {
            float: left;
            text-align: left;
            width: 50%;
        }

        .productPriceHolder {
            margin-bottom: 10px;
        }

        .productPrice {
            float: left;
            width: 50%;
        }

        .quantityTitle {
            float: left;
            text-align: left;
            width: 50%;
        }

        .productQuantity {
            float: left;
            width: 50%;
        }

        .totalPriceHolder {
            float: right;
            width: 24%;
            height: 70%;
        }

        .totalPriceTitle {
            float: left;
            width: 40%;
            text-align: left;
            margin-top: 20%;
            margin-bottom: 50px;
            font-size: 20pt;
        }

        .totalPrice {
            margin-top: 20%;
        }


        #removeBTN {
            border: 2px solid red;
            color: red;
            background-color: white;
            width: 100px;
        }

        #removeBTN:hover {
            box-shadow: 0 5px 10px 0 rgba(255, 0, 0, 0.671),0 6px 20px 0 rgba(255, 0, 0, 0.19);
        }

        .checkoutPriceHolder {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            height: 50px;
            margin-top: 20px;
        }

        .checkoutTitle {
            float: left;
        }

        .checkoutPrice {
            float: right;
            width: 300px;
            margin-right: 20px;
            
        }

        .paymentmethod{
            float: right;
            margin-top: 10px;
            margin-right: 90px;
            width:80px;
        }

        #checkoutBTN {
            float: right;
            margin-top: 10px;
            margin-right: 30px;
            width: 120px;
            height: 40px;
            border: 1px solid black;
            background-color: white;
        }

        #checkoutBTN:hover {
            cursor: pointer;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        }

        #qtybtn {
            border: 1px solid black;
            background-color: white;
            width: 40px;
        }

        #qtybtn:hover {
            cursor: pointer;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        }
    </style>

</head>
<body>

<!-- Header --> 
<div id="header"></div>

<!-- Main Content Area -->
<div class="content-area">

    <div>
        <h2 class="sora center fs-1 fw-bolder">My Shopping Cart</h2>
    <br>
    <hr>

    <?php
    if(isset($_SESSION["user_email"])){
        $Email = $_SESSION["user_email"];
    //get data from database
    $mysql_run = mysqli_query($con, "SELECT * FROM shopping_cart WHERE Email='$Email'");
    while ($row=mysqli_fetch_assoc($mysql_run)) {
        $Product_ID = $row["Product_ID"];
        $Quantity = $row["Quantity"];
        $Price = $row["Price"];
        $sql_run = mysqli_query($con, "SELECT * FROM product WHERE Product_ID = '$Product_ID';");
        while ($row = mysqli_fetch_assoc($sql_run)) {
            $Product_Image=$row['Product_Image'];
            $Product_Name=$row['Product_Name'];
        //display data
        echo
        '<div class="parentBox">
            <div class="childBox">
                <!-- Product Image -->
                <div class="productImageHolder">
                    <img class="productImage" src="data:image/jpg;base64,'.base64_encode($Product_Image).'" width="200px" height="240px"/>
                </div>

                <!-- Product Purchase Info -->
                <div class="productPurchase">

                    <!-- product name -->
                    <div class="productName">
                    <a href="product-description.php?Product_ID='.$Product_ID.'">
                            <h4>'.$Product_Name.'</h4>
                        </a>
                    </div>

                    <!-- product price -->
                    <div class="productPriceHolder">
                        <div class="priceTitle">
                            <h4>Price/unit : </h4>
                        </div>
                        <div class="productPrice">
                            <h4>RM '.$Price.'</h4>
                        </div>
                        <br>
                    </div>

                    <!-- product quantity -->
                    <div class="productQuantityHolder">
                        <div class="quantityTitle">
                            <h4>Quantity : </h4>
                        </div>
                        <div class="productQuantity">
                        <form action="qty-update.php" method="POST">
                            <input type="text" style="display:none" value="'.$Product_ID.'"  name="product_id">
                            <input type="number" style="width: 80px" step="any" value="'. $Quantity .'" min="1" name="quantity">
                            <button type="submit" id="qtybtn" name"qtybtn"><img src="image/update.jpg" width="30px"></button>
                        </form>
                        </div>
                    </div>
                </div>

                <!-- Total Price Container-->
                <div class="totalPriceHolder">
                    <!-- total price -->
                    <div class="totalPriceTitle">
                        <h4>Total: </h4>
                    </div>
                    <div class="totalPrice">
                        <h4>RM '. $totalPrice = ($Price * $Quantity) .'</h4>
                    </div>
                </div>

                <!-- remove button -->
                <a href="remove.php?Product_ID='.$Product_ID.'">
                    <button id="removeBTN">
                        <b>Remove</b>
                    </button>
                </a>
            </div>
        </div>';
        }
    }
        //calculate total price and display
        $run=mysqli_query($con, "SELECT Email, SUM(Price*Quantity) As Total_Payment FROM shopping_cart HAVING SUM(Price*Quantity)=(SELECT MAX(Total_Payment) FROM (SELECT SUM(Price*Quantity) As Total_Payment FROM shopping_cart WHERE Email='$Email') AS Total_Payment)");
        while ($row=mysqli_fetch_assoc($run)) {
            $Total_Payment=$row['Total_Payment'];  
        echo'
        <div class="checkoutPriceHolder">
            <div class="checkoutPrice"> 
                <h3>Total : RM '.round($Total_Payment, 2).'</h3>
            </div>
        </div>
        ';
        }
    }
    // close database connection
    ?>
    <!-- checkout button -->
    <form action="checkout.php" method="POST">
        <button id="checkoutBTN" type="submit" name="checkout">
            Check Out
        </button>
        <!-- Choose Payment Method -->
        <div class="paymentmethod">
            <select name="payment_select" required="required">
                <option value="">Payment Method</option>
                <option value="online">Online Banking</option>
                <option value="debit">Debit Card</option>
                <option value="credit">Credit Card</option>
            </select>
        </div>
    </form>

</div>
</body>
<!-- Footer -->
<div id="footer"></div>
</html>

<?php 
    if(isset($_POST["checkout"])){
        $payment_select=$_POST["payment_select"];
    }
    else if(isset($_POST['qtybtn'])){
        $Product_ID=$_POST['product_id'];
        $quantity=$_POST['quantity'];
    }
?>