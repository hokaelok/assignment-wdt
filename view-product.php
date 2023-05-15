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
    <title>Paws Heaven View Product</title>

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
        .viewProduct {
            width: 95%;
            margin: auto;
            border: 1px solid black;
            background-color: blanchedalmond;
        }

        .viewProduct td, 
        .viewProduct th {
            border: 1px solid black;
            min-width: 90px;
        }
        .new-product-container {
            text-align: right;
            padding-right: 50px;
        }
    </style>
</head>
<body>
<!-- Header -->
<div id="header"></div>
<!-- Main Content -->
<div class="content-area">
<!-- title -->
<h2>Products</h2>
    <hr>

    <!-- add new product button -->
    <div class="new-product-container">
        <a href="add-new-product.php">
            Add New Product
        </a>
    </div>

    <hr>
    <!-- table header -->
    <table class="viewProduct">
        <tr>
            <th>Product Image</th>
            <th width="250px">Product Name</th>
            <th>Brand</th>
            <th>Type of Animal</th>
            <th>Category</th>
            <!-- <th width="450px">Description</th> -->
            <th>Price</th>
            <th>Quantity</th>
            <th>Product Status</th>
            <th>Supplier Name</th>
            <th>Staff Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
            // get product info from product table
            $sql = mysqli_query($con, "SELECT * FROM product");
            while($row = mysqli_fetch_array($sql)) {
                $Product_ID = $row["Product_ID"];
                $Product_Name = $row['Product_Name'];
                $Brand = $row['Brand'];
                $Type_of_Animal = $row['Type_of_Animal'];
                $Category = $row['Category'];
                $Description = $row['Description'];
                $Price = $row['Price'];
                $Quantity = $row['Quantity'];
                $Product_Status = $row['Product_Status'];
                $Supplier_ID = $row['Supplier_ID'];
                $Staff_ID = $row['Staff_ID'];

                // get product info from product table
                $sql_run = mysqli_query($con, "SELECT * FROM product WHERE Product_ID = '$Product_ID';");
                while ($row = mysqli_fetch_assoc($sql_run)) {
                    $Product_Image = $row['Product_Image'];
                    $Product_Name = $row['Product_Name'];

                    // get supplier info from supplier table
                    $sql_run = mysqli_query($con, "SELECT * FROM supplier WHERE Supplier_ID = '$Supplier_ID';");
                    while ($row = mysqli_fetch_assoc($sql_run)) {
                        $Supplier_Name = $row['Supplier_Name'];

                        // get staff info from staff table
                        $sql_run = mysqli_query($con, "SELECT * FROM staff WHERE Staff_ID = '$Staff_ID';");
                        while ($row = mysqli_fetch_assoc($sql_run)) {
                            $Staff_Name = $row['Staff_Name'];
            ?>
                
            <tr>
                <?php
                print '
                <td>
                    <img class="productImage" src="data:image/jpg;base64,'.base64_encode($Product_Image).'" width="100px" />
                </td>';
                ?>
                <td><?php print $Product_Name ?></td>
                <td><?php print $Brand ?></td>
                <td><?php print $Type_of_Animal ?></td>
                <td><?php print $Category ?></td>
                <td><?php print $Price ?></td>
                <td><?php print $Quantity ?></td>
                <td><?php print $Product_Status ?></td>
                <td><?php print $Supplier_Name ?></td>
                <td><?php print $Staff_Name ?></td>
                <?php
                print '
                <td>
                    <a href="edit-product.php?Product_ID='.$Product_ID.'">
                        Edit
                    </a>
                </td> '; ?>
                <?php
                print '
                <td>
                    <a href="delete-product.php?Product_ID='.$Product_ID.'">
                        Delete
                    </a>
                </td> '; ?>
            </tr>
                
        <?php       } 
                }
            }
        }
        ?>
        
    </table>


</div>
</body>
<!-- Footer -->
<div id="footer"></div>
</html>