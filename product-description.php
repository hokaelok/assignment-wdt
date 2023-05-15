<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Paws Heaven</title>

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
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,300,500,700);

        .productContainer {
            margin: auto;
            box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
            transition: all 0.3s;
            width: 75%;
            font-family: "Raleway";
        }

        .productContainer:hover {
            box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        }

        .productNavContainer {
            border-bottom: 1px solid grey;
            width: 100%;
            height: 40px;
        }

        #returnBtn {
            font-size: large;
            margin-left: 10px;
            margin-top: 5px;
            float: left;
            border: none;
            background-color: white;
        }

        #returnBtn:hover {
            cursor: pointer;
        }

        .productDescriptionContainer {
            display: flex;
            height: flex;
            border-bottom: 1px solid grey;
        }

        .productImageContainer {
            width: 600px;
            height: flex;
            border-right: 1px solid grey;
            float: left;
        }

        .productImageContainer img {
            margin: 50px 30px 30px 30px;
            width: 250px;
            height: 350px;
        }

        .productInfo {
            float: right;
            width: 100%;
        }

        .productName { 
            height: 80px;
            text-align: left;
            padding: 20px;
            font-weight: bold;
            font-size: 18pt;
        }

        .productManufacturer {
            padding-left: 20px;
            padding-bottom: 20px;
            text-align: left;
            font-size: 16pt;
            border-bottom: 1px solid grey;;
        }

        .productPrice {
            font-size: 20pt;
            font-weight: bold;
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid grey;
        }

        .productPrice p:first-child {
            float: left;
            font-size: 16pt;
            font-weight: normal;
            padding-right: 20px;
        }

        .productPrice p:last-child {
            float: right;
            padding-right: 65%;
            font-size: 16pt;
            font-weight: normal;
        }

        .productDescription {
            text-align: left;
            padding: 20px;
            height: flex;
            border-bottom: 1px solid grey;
        }

        #addtocartBTN {
            border: 2px solid black;
            background-color: white;
            width: 150px;
        }

        #addtocartBTN:hover {
            cursor: pointer;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        }

        .reviewTitle {
            padding: 20px;
            font-size: 30pt;
            font-weight: bold;
        }

        .reviewHolder {
            padding-left:230px;
            padding-right:140px;
            text-align: left;
            
        }

        .Names {
            padding-bottom: 5px;
            align-items: center;
        }

        .Reviews {
            height: flex;
            width: 1400px;
            border: 1px solid black;
        }

        .rev {
            height: flex;
            width: 1320px;
            border: 1px solid black;
        }

        #revbtn {
            border: 2px solid black;
            background-color: white;
            width: 80px;
        }

        #revbtn:hover {
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

    <!-- Card -->
    <div class="productContainer">
        <!-- Navigational Bar -->
        <div class="productNavContainer">
            <a href="index.php">
                <button id="returnBtn"> < Back </button>
            </a>
        </div>
        <!-- //Navigational Bar -->
        <?php 
            //connect database
            include ("conn.php");
            $Product_ID=$_GET['Product_ID'];
            //get data from database
            $mysql_run=mysqli_query($con, "SELECT * FROM product WHERE Product_ID = '$Product_ID';");
            while ($row=mysqli_fetch_assoc($mysql_run)) {
                $Product_Image=$row["Product_Image"];
                $Product_Name=$row["Product_Name"];
                $Price=$row["Price"];
                $Supplier_ID=$row["Supplier_ID"];
                $Description=$row["Description"];
                $sql_run=mysqli_query($con, "SELECT * FROM supplier WHERE Supplier_ID = '$Supplier_ID';");
                while ($row=mysqli_fetch_assoc($sql_run)) {
                    $Supplier_Name=$row["Supplier_Name"];
                
                            echo '
                            <!-- Product Description -->
                            <div class="productDescriptionContainer">
                                <!-- product image -->
                                <div class="productImageContainer">
                                <img src="data:image/jpg;base64,'.base64_encode($Product_Image).'" />
                                </div>
                                <!-- product info -->
                                <div class="productInfo">
                                    <!-- product name -->
                                    <div class="productName">
                                        '.$Product_Name.'
                                    </div>
                                    <!-- product manufacturer -->
                                    <div class="productManufacturer">
                                        '.$Supplier_Name.' 
                                    </div>
                                    <!-- product price -->
                                    <div class="productPrice">
                                        <p>RM </p>
                                        '.$Price.' 
                                        <p> / unit</p>
                                    </div>
                                    <!-- product description -->
                                    <div class="productDescription">
                                        '.$Description.' 
                                    </div>
                                    
                                    <!-- add to cart button -->
                                    <div class="addtocartContainer">
                                        <a href="add-to-cart.php?Product_ID='.$Product_ID.'">
                                            <button id="addtocartBTN">
                                                ADD TO CART
                                            </button>
                                        </a>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //Product Description -->
                        <!-- Customer Review -->
                        <div class="cusReviewContainer">
                            <!-- review title -->
                            <div class="reviewTitle">
                                Review
                            </div>
                            </div>
                        <div class="reviewHolder">
                            <form action="review.php" method="POST">
                                <input type="text" style="display:none" value="'.$Product_ID.'"  name="product_id">
                                <input type="text" class="rev" placeholder="Write Review Here." value="" name="review" required>
                                <button type="submit" id="revbtn" name"revbtn">Submit</button>
                            </form>
                        </div>
                        <br>';
                        if(isset($_POST['revbtn'])){
                            $Product_ID=$_POST['product_id'];
                            $review=$_POST['review'];
                        }
                    }
                    }
                        $count="SELECT Product_ID, COUNT(Product_ID) FROM feedback WHERE Product_ID = '$Product_ID' GROUP BY NOT NULL";
                        if ($result=mysqli_query($con,$count))  {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);	 
                        } 
                        if ($rowcount<=0){
                            echo ' 
                            <div class="reviewHolder">
                                <div class="Names">
                                    No Review
                                </div>
                            </div>
                            ';
                        }
                        else{
                            $sql=mysqli_query($con, "SELECT * FROM feedback WHERE Product_ID = '$Product_ID';");
                            while ($row=mysqli_fetch_assoc($sql)) {
                            $Email=$row["Email"];
                            $Review=$row["Review"];
                            $run=mysqli_query($con, "SELECT * FROM member WHERE Email = '$Email';");
                            while ($row=mysqli_fetch_assoc($run)) {
                            $Member_Name=$row["Member_Name"];
                                echo'
                                    <!-- reviews -->
                                    <div class="reviewHolder">
                                        <div class="Names">
                                            '.$Member_Name.' 
                                            <div class="Reviews">
                                                '.$Review.' 
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                ';
                            }
                            }
                        }
                        
                    ?>    
                        <!-- //Customer Review -->

                    <!-- //Card -->

                    </div>
                </div>
<!-- //Main Content Area -->

</body>

<!-- Footer -->
<div id="footer"></div>
</html>
