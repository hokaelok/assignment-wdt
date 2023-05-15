<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Paws Heaven</title>

    <!-- Common Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Import CSS stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Import jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Header & Footer Loader -->
    <script>
        $(function(){ 
            $("#header").load("common/header.php");
            $("#footer").load("common/footer.php");
        });
    
        function redicrect() {
            window.location.href = "index.php";
        }
    </script>

    <!-- Styling -->
    <style>
    .banner-area {
        width: 100%;
        height: 450px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.4)), url(image/about-us.jpg);
        -webkit-background-size: cover;
        background-size: cover;
        background-position: center center;
        padding-bottom: 10px;
        margin-top: 110px;
        background-color: black;
    }

    .banner-area h2 {
        padding-top: 8%;
        font-size: 70px;
        filter: brightness(2000%);
        color: white;
    }

    .parentbox {
        display: flex;
        flex-wrap: wrap;
    }

    .childbox {
        flex: 0 0 300px;
        margin: 25px;
        height: 450px;
        background-color: white;
        border-radius: 10px;
        border: #d4d4d4 solid 2px;
        padding: 10px;
    }

    .childbox hr {
        margin: 5px;
    }

    .childbox:hover {
        box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    }

    .productName {
        height: 55px;
    }

    .productName:hover {
        font: black; 
    }

    .productPrice {
        height: 30px;
        margin-top: 20px;
    }

    .addtocartBTN {
        border: 1px solid black;
        background-color: white;
        width: 150px;
        height: 40px;
        text-align: center;
        
    }

    .addtocartBTN:hover {
        cursor: pointer;
        background-color: grey;
        transition: background-color 0.5s ease-in; 
    }
    </style>

</head>
<body>
<!-- Header -->
<div id="header"></div>
<!-- Include Banner -->
<div class="banner-area">
    <h2 class="poppins fw-bolder">Welcome to PawsHeaven</h2>
    <h3 class="poppins fs-2 fw-bolder text-white" stlye="color: white;">Largest Online Pet Store in Malaysia</h3>
</div>
<div class="a-divider"></div>
<!-- Main Content -->
<div class="content-area" style="margin-top: -300px; padding: 250px; padding-bottom: 10px">
        <div>
        <h2 class="sora center fs-1 fw-bolder">Popular Products</h2>
        <br>
        <hr>
        </div>
        <div class="parentbox">
        <?php 
            //connect database
            include ("conn.php"); 
            //get data from database
            $mysql_run=mysqli_query($con, "SELECT * FROM product;");
            while ($row=mysqli_fetch_assoc($mysql_run)) {
                $Product_ID=$row['Product_ID'];
                $data ='<div class="childbox" onclick="redirect()">
                <img src="data:image/jpg;base64,'.base64_encode($row['Product_Image']).'" width="200px" height="240px"/>
                
                <hr>

                <div class="productName">
                    <a href="product-description.php?Product_ID='.$Product_ID.'">
                    <h5>'.$row['Product_Name'].'</h5></a>
                </div>

                <div class="productPrice">
                    RM '.$row['Price'].'<br>
                </div>

                <a href="add-to-cart.php?Product_ID='.$Product_ID.'">
                    <button class="addtocartBTN">Add To Cart</button>
                </a>
                </div>
                
                ';
                //display data
                echo $data;
                
                } 
                mysqli_close($con);//to close the database connection
        ?>
        </div>

</div>

</body>

    <!-- Footer -->
    <div id="footer"></div>
</html>