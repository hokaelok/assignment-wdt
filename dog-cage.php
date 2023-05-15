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
            window.location.href = "https://playvalorant.com/en-us/";
        }
    </script>

    <!-- Styling -->
    <style>
    .parentbox {
        display: flex;
        flex-wrap: wrap;
    }

    .childbox {
        /*
        flex: flex-grow flex-shrink flex-basis;
        flex-grow 	A number specifying how much the item will grow relative to the rest of the flexible items
        flex-shrink 	A number specifying how much the item will shrink relative to the rest of the flexible items
        flex-basis 	The length of the item. Legal values: "auto", "inherit", or a number followed by "%", "px", "em" or any other length unit
        */
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
<div id="header"></div>
<div class="a-divider"></div>
<div class="content-area" style="margin-top: -300px; padding: 250px; padding-bottom: 10px">
        <div>
        <h2 class="sora center fs-1 fw-bolder">Dog Cage</h2>
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
                if ($row['Category']=="Cage" && $row['Type_of_Animal']=="Dog"){
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
            }
                mysqli_close($con);//to close the database connection
        ?>
        </div>

</div>

</body>

    <!-- Footer -->
    <div id="footer"></div>
</html>