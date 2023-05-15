<?php
include ("conn.php");
ob_start();
session_start();
?>
<!-- ref:https://code-projects.org/online-shopping-system-in-php-with-source-code/ -->
<!DOCTYPE html>
<html>
<head>
    <!-- title -->
    <title>Paws Heaven</title>

    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Import jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <script>
        $(function(){ 
            $("#header").load("common/header.php");
            $("#footer").load("common/footer.php");
        });

    </script>

    <style>
    .container-fluid {
        display: flex;
        padding: 15px;
        margin: auto;
    }

    .row-checkout {
        width: 100%;
    }

    .col-25 {
        width: 30%;
        float: left;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .col-75 {
        width: 70%;
    }

    .container-checkout {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        display: block;
        float: left;
    }

    .icon-container {
        float:left;
        font-size: 24px;
    }

    .card-checkout-btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .onl-checkout-btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .card-checkout-btn:hover {
        background-color: #45a049;
    }

    .onl-checkout-btn:hover {
        background-color: #45a049;
    }

    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .col-25 {
            margin-bottom: 20px;
        }
    }

    .checkoutHolder {
        transform: translateY(-850px);
        border: 1px solid black;
        float: right;
        width: 350px;
    }

    .checkoutTitleColumn,
    .checkoutList,
    .checkoutPrice {
        display: flex;
        text-align: center;
    }

    .checkoutList {
        border-bottom: 1px solid black;
        padding: 10px 0px;
    }

    .checkoutTitleColumn {
        height: 50px;
        padding-top: 10px;
        font-size: 13pt;
        font-weight: bold;
        border-bottom: 1px solid grey;
    }

    .productNameTitle,
    .productName {
        width: 175px;
    }

    .productQuantityTitle,
    .productQuantity {
        width: 75px;
    }

    .productPriceTitle,
    .productPrice {
        width: 100px;
    }

    .checkoutPrice {
        border-top: 1px solid grey;
        border-bottom: 1px solid grey;
    }

    .checkoutPrice div {
        width: 50%;
        height: 50px;
        padding-top: 10px;
        font-size: 20pt;
        font-weight: bold;
    }
    </style>

</head>

<body>

<!-- Header -->
<div id="header"></div>

<!-- Checkout Form -->
<div class="content-area">

    <!-- container-fluid -->
    <div class="container-fluid">

        <!-- row-checkout -->
        
        <?php
        $payment_select=$_POST["payment_select"];
        //if the payment is using card then display the form
        if($payment_select=="debit"||$payment_select=="credit"){
            if(isset($_SESSION["user_email"])){
                $sql = "SELECT * FROM member WHERE Email='$_SESSION[user_email]'";
                $query = mysqli_query($con,$sql);
                $row=mysqli_fetch_array($query);
        echo'
            <div class="col-75">

                <div class="container-checkout">
                    
                    <form id="checkout_form" action="card-checkout-process.php"" method="POST" class="was-validated">

                        <div class="row-checkout">
                        
                            <div class="col-50">
                                <h3>Shipping Address</h3>
                                <label for="name">Full Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="'.$_SESSION["user_name"].'" required>
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" name="email" value="'.$_SESSION["user_email"].'" required>
                                <label for="address">Address</label>
                                <input type="text" id="adr" class="form-control" name="address" value="'.$_SESSION["user_add"].'" required>
                                <label for="phnum">Phone Number</label>
                                <input type="text" id="phn" class="form-control" name="phnum" value="'.$_SESSION["user_phnum"].'" required>
                            </div>
                        
                            <hr>

                            <div class="col-50">
                                <h3>Payment</h3>
                                <label for="fname">Accepted Cards</label>
                                <br>
                                <div class="icon-container">
                                    <img class="fa fa-cc-visa" src="image/visa.png">
                                    <img class="fa fa-cc-mastercard" src="image/mastercard.png" width="45px">
                                </div>
                                <br><br>
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" class="form-control" required>
                                
                                <div class="form-group" id="card-number-field">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="xxxx-xxxx-xxxx-xxxx" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
                                <label for="expdate">Exp Date</label>
                                <input type="text" id="expdate" name="expdate" class="form-control" placeholder="xx/xx" pattern="[0-9]{2}/[0-9]{2}"required>
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" name="cvv" id="cvv" placeholder="xxx" pattern="[0-9]{3}" required>
                                </div>
                            </div>
                            
                        </div>

                        <input type="submit" name="card-checkout-btn" id="submit" value="Continue to checkout" class="card-checkout-btn">
                    </form>
                    
                </div>
            </div>
            ';
            }
            else{
                echo"<script>window.location.href = 'cart.php'</script>";
            }

        }
        //if the payment is online banking then display the form
        else if($payment_select=="online"){
            if(isset($_SESSION["user_email"])){
                $sql = "SELECT * FROM member WHERE Email='$_SESSION[user_email]'";
                $query = mysqli_query($con,$sql);
                $row=mysqli_fetch_array($query);
            echo'
            <div class="col-75">
                <div class="container-checkout">
                    <form id="checkout_form" action="online-checkout-process.php" method="POST" class="was-validated">

                        <div class="row-checkout">
                        
                            <div class="col-50">
                                <h3>Shipping Address</h3>
                                <label for="name">Full Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="'.$_SESSION["user_name"].'" required>
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" name="email" value="'.$_SESSION["user_email"].'" required>
                                <label for="address">Address</label>
                                <input type="text" id="adr" class="form-control" name="address" value="'.$_SESSION["user_add"].'" required>
                                <label for="phnum">Phone Number</label>
                                <input type="text" id="phn" class="form-control" name="phnum" value="'.$_SESSION["user_phnum"].'" required>
                            </div>

                            <hr>

                            <div class="col-50">
                                <h3>Payment</h3>
                                <p>Please transer to Maybank 1522918271890 reference with your account name.</p>
                                
                                <label for="bname">Bank Name</label>
                                <input type="text" id="bname" name="bankname" class="form-control" required>
                                
                                <label for="account">Bank Account Owner Name</label>
                                <input type="text" class="form-control" id="account" name="account" required>
                            
                                <label for="ref">Receipt Code</label>
                                <input type="text" id="ref" name="ref" class="form-control" required>
                            
                            </div>
                        </div>
                        <input type="submit" id="submit" value="Continue to checkout" class="onl-checkout-btn" name="onl-checkout-btn">
                    </form>
                </div>
            </div>
            ';}
            else{
                echo"<script>window.location.href = 'cart.php'</script>";
            }    
            }  
                
        ?>
        <!-- //row-checkout -->

        <!-- List of product buy -->
        <div class="col-25">
            <div class="container-checkout">
                

                <!-- title -->
                <div class="checkoutTitleColumn">
                    <div class="productNameTitle">
                        Product Title
                    </div>
                    <div class="productQuantityTitle">
                        Qty
                    </div>
                    <div class="productPriceTitle">
                        Amount
                    </div>
                </div>

                <?php
                //get the data from database and display items in cart
                if (isset($_SESSION["user_email"])) {
                    $Email=$_SESSION["user_email"];
                    $mysql_run = mysqli_query($con, "SELECT * FROM shopping_cart WHERE Email='$Email'");
                    while ($row=mysqli_fetch_assoc($mysql_run)) {
                        $Product_ID = $row["Product_ID"];
                        $Quantity = $row["Quantity"];
                        $Price = $row["Price"];
                        $amount=($Price * $Quantity);
                        $sql_run = mysqli_query($con, "SELECT * FROM product WHERE Product_ID = '$Product_ID'");
                        while ($row = mysqli_fetch_assoc($sql_run)) {
                            $Product_Name=$row['Product_Name'];
                    echo'
                        <!-- product purchase -->
                        <div class="checkoutList">
                            <div class="productName">
                                '.$Product_Name.'
                            </div>
                            <div class="productQuantity">
                                '.$Quantity.'
                            </div>
                            <div class="productPrice">
                                '.$amount.'
                            </div>
                        </div>
                        ';
                        }
                    }?>
                    <?php
                    //calculate total price
                    if (isset($_SESSION["user_email"])) {
                        $Email=$_SESSION["user_email"];
                    $run=mysqli_query($con, "SELECT Email, SUM(Quantity*Price) As Total_Payment FROM shopping_cart WHERE Email='$Email'");
                    while ($row=mysqli_fetch_assoc($run)) {
                        $Total_Payment=$row['Total_Payment'];  
                        $Total=round($Total_Payment, 2);
                    echo '
                    <!-- checkout price -->
                    <div class="checkoutPrice">
                        <div class="checkoutPriceTitle">
                            Total :
                        </div>
                        <div class="checkoutTotalPrice">    
                        '.$Total.'
                        </div>
                    </div>
                </div>
                '; 
                    }
                }
                }
                ?>
                
            </div>
        </div>
        <!-- //List of product buy -->

    </div>
    <!-- //container-fluid -->              
</div>
</body>

<!-- Footer -->
<div id="footer"></div>
</html>

<?php 
    if(isset($_POST["card-checkout-btn"])){
        $name=$_POST["name"];
		$Email=$_SESSION["user_email"];
		$address=$_POST["address"];
        $cardNumber=$_POST["cardNumber"];
	    }
    else if(isset($_POST["onl-checkout-btn"])){
        $name=$_POST["name"];
		$Email=$_SESSION["user_email"];
		$address=$_POST["address"];
        $ref=$_POST["ref"];
    }
?>