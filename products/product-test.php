<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Paws Heaven Product Page</title>

    <!-- Common Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Import CSS Stylesheet -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
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

</head>
<body>

<!-- Header -->
<div id="header"></div>
<div class="content-area" style="margin-top: -300px; padding: 250px">

    <div class="card">
        <!-- Navigational Bar -->
        <nav class="productNav">
            <svg class="arrow" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,115.4 331.3,96 160,256 331.3,416 352,396.7 201.5,256 " stroke="#727272"/></svg>
            Back
            <svg class="heart" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" stroke="#727272" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9  c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256,124.8  c-20-26-51-41.8-84.8-41.8C112.1,83,64,131.3,64,190.7c0,27.9,10.6,54.4,29.9,74.6L245.1,418l10.9,11l10.9-11l148.3-149.8  c21-20.3,32.8-47.9,32.8-77.5C448,131.3,399.9,83,340.8,83L340.8,83z" stroke="#727272"/></svg>
        </nav>

        <!-- Product Photo -->
        <div class="photo">
            <img src="image/whiskas-adult-ocean-fish.jpg">
        </div>

        <!-- Product Info -->
        <div class="description">
            <!-- Product Name -->
            <h2>Meow Food</h2>
            <!-- Product Manufacturer -->
            <h4>Meow Food Sdn Bhd</h4>
            <!-- Product Price -->
            <h1>RM 10 . 00</h1>
            <!-- Product Description -->
            <p>Meow food is full of nutrition and good for your meow.</p>
            <!-- Purchase Quantity -->
            <div class="quantity">
                <button class="plus-btn" type="button" name="button">
                    +
                </button>
                <input type="text" name="name" value="1">
                <button class="minus-btn" type="button" name="button">
                    -
                </button>
            </div>
            <!-- //Purchase Quantity -->

            <!-- Add to Cart Button -->
            <button class="addToCart-btn" type="#">Add to Cart</button>
        </div>
        <!-- //Product Info -->
        
        <!-- Product Review -->
        
        <h2 class="reviewTitle">Our Customer's Review</h2>
        
        <!-- First Review Table -->
        <table class="review">
            <tr>
                <td class="nameDisplay">First Name</td>
            </tr>
            <tr>
                <td class="reviewDisplay">Meow is Happy</td>
            </tr>
        </table>

        <!-- Second Review Table -->
        <table class="review">
            <tr>
                <td class="nameDisplay">2nd Name</td>
            </tr>
            <tr>
                <td class="reviewDisplay">Meow is very very very very very very very Happyyyyyyy</td>
            </tr>
        </table>
        <!-- //Product Review -->
        
    </div>
</div>
</body>

<!-- Footer -->
<div id="footer"></div>
</html>