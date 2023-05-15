<?php
ob_start();
session_start();
include "conn.php";
?>

<!-- 0:18:30 -->

<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Paws Heaven Add New Product</title>

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
        .section {
        margin-bottom: 15px;
        width:100%;
        }

        .label {
        text-align: left;
        margin-right: 10px;
        }

        .field {
        width:100%;
        }

        * {
        box-sizing: border-box;
        }

        #container {
        padding: 16px;
        background-color: lightgrey;
        width:800px;
        margin:0 auto;
        }

        input[type=text], input[type=file], input[type=password], input[type=date], input[type=email], input[type=tel], textarea, select {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        font-size:15pt;
        }

        input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        input[type='radio'] { 
        transform: scale(2); 
        }

        .btn {
        background-color: #555555;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 49%;
        opacity: 0.9;
        display: inline;
        }

        .btn:hover {
        opacity: 1;
        }

        .button {
            background-color: #e7e7e7;
            color: black;
            border: 2px solid #e7e7e7;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius:7px;
        }

        .button:hover {
            background-color: white;
        }
    </style>

</head>
<body>

<!-- Header -->
<div id="header"></div>

<!-- Main Content Area -->
<div class="content-area">
<?php 

    $Product_ID = $_GET['Product_ID'];
    $sql = mysqli_query($con, "SELECT * FROM product WHERE Product_ID = '$Product_ID'");
    while ($row = mysqli_fetch_array($sql))
    {

?>

    <!-- form -->
    <form action="edit-product-process.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="Product_ID" value="<?php echo $row['Product_ID'] ?>">
        <div id="container">
        <h2>Edit Product</h2>
            <div class="section">
                <div class="label">
                    Product Image
                </div>
                <div class="field">
                <?php echo'<img src="data:image/jpg;base64,'.base64_encode($row['Product_Image']).'" width="200px" height="240px"/>'?>
                </div>
            </div>
            <div class="section">
                <div class="label">
                    Product Name
                </div>
                <div class="field">
                    <input type="text" name="Product_Name" required  value="<?php echo $row["Product_Name"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    Brand
                </div>
                <div class="field">
                    <input type="text" name="Brand" required  value="<?php echo $row["Brand"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    Type of Animal
                </div>
                <div class="field" style="padding-top:10px;">
                    <input type="radio" name="Type_of_Animal" 
                    <?php 
                        if ($row["Type_of_Animal"] == "Dog") {
                            print 'checked="checked"';
                        }
                    ?>
                    value="Dog" required> &nbsp;&nbsp;Dog &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="Type_of_Animal" 
                    <?php 
                        if ($row["Type_of_Animal"] == "Cat") {
                            print 'checked="checked"';
                        }
                    ?>
                    value="Cat" required> &nbsp;&nbsp;Cat 
                </div>
            </div>
            <div class="section">
                <div class="label">
                    Category
                </div>
                <div class="field">
                    <select name="Category" required>

                        <option value="">Please select</option>

                        <option value="Food"
                        <?php
                            if ($row['Category'] == "Food") {?>
                            selected="selected"

                        <?php  } ?>
                        >Food</option>

                        <option value="Toy" 
                        <?php
                            if ($row['Category'] == "Toy") {?>
                            selected="selected"

                        <?php  } ?>
                        >Toy</option>

                        <option value="Hygiene"
                        <?php
                            if ($row['Category'] == "Hygiene") {?>
                            selected="selected"

                        <?php  } ?>
                        >Hygiene</option>

                        <option value="Vitamin" 
                        <?php
                            if ($row['Category'] == "Vitamin") {?>
                            selected="selected"

                        <?php  } ?>
                        >Vitamin</option>

                        <option value="Discount"
                        <?php
                            if ($row['Category'] == "Discount") {?>
                            selected="selected"

                        <?php  } ?>
                        >Discount</option>

                        <option value="Package"
                        <?php
                            if ($row['Category'] == "Package") {?>
                            selected="selected"

                        <?php  } ?>
                        >Package</option>
                        </select>
                    </div>
            </div>
            <div class="section">
                <div class="label">
                    Description
                </div>
                <div class="field" style="padding-top:10px;">
                    <textarea name="Description" id="" cols="30" rows="3" required>
                        <?php echo $row["Description"] ?>
                    </textarea>
                </div>
            </div>
            <div class="section" style="padding-top:15px;">
                <div class="label">
                    Price
                </div>
                <div class="field">
                    <input type="float" name="Price" required  value="<?php echo $row["Price"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    Quantity
                </div>
                <div class="field">
                    <input type="number" name="Quantity" required  value="<?php echo $row["Quantity"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    &nbsp;
                </div>
                <div class="field">
                    <button type="submit" class="btn" name="submitBtn">Submit</button>
                    <button type="reset" class="btn">Reset</button>
                </div>
            </div>
        </div>
    </form>


</div>

</body>
<!-- Footer -->
<div id="footer"></div>
</html>

<?php
    }
    mysqli_close($con);
?>

<?php
if (isset($_POST["submitBtn"])) {
    $Product_Name = $_POST["Product_Name"];
    $Brand = $_POST["Brand"];
    $Type_of_Animal = $_POST["Type_of_Animal"];
    $Category = $_POST["Category"];
    $Description = $_POST["Description"];
    $Price = $_POST["Price"];
    $Quantity = $_POST["Quantity"];
    $Product_ID = $_POST['Product_ID'];
}
?>