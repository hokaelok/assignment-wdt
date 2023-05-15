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
        <title>Paws Heaven Admin Dashboard</title>
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
        <style>
            .Features{
                display: flex;
                flex-wrap: wrap;
            }
            .function{
                flex: 0 0 300px;
                margin: 35px;
                height: 80px;
                background-color: white;
                border-radius: 10px;
                border: #d4d4d4 solid 2px;
                padding: 10px;
            }
            .function hr {
                margin: 5px;
            }

            .function:hover {
                box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            }
        </style>
    </head>
    <body>
    <!-- Header -->
    <div id="header"></div>
    <!-- Main Content -->
    <div class="content-area">
        <h2>Admin Dashboard</h2>
        <hr>
        <div class="Features">
        <div class="function">
        <img src="image/Manage-Product.png" width="60px"> 
        <a href="view-product.php">Manage Products</a>
        </div>
        
        <div class="function">
        <img src="image/supplier.png" width="60px"> 
        <a href="manage-supplier.php">Manage Supplier</a>
        </div>
        
        <div class="function">
        <img src="image/order.png" width="50px"> 
        <a href="view-customer-order.php">View Orders</a>
        </div>
        
        <div class="function">
        <img src="image/message.png" width="50px"> 
        <a href="view-customer-message.php">View Customer Message</a>
        </div>

        <?php
        if (isset($_SESSION["user_id"])) {
            $id = $_SESSION["user_id"];
        $mysql_run=mysqli_query($con, "SELECT Position FROM staff WHERE Staff_ID = '$id';");
        while ($row=mysqli_fetch_assoc($mysql_run)) {
            $Position=$row['Position'];
            if($Position=="Manager"){
        echo "
        <div class='function'>
        <img src='image/signup.png' width='50px'> 
        <a href='signup-admin-panel.php'>Sign Up New Admin</a>
        </div>
        ";
            }
        }
        }
        ?>
        
    </div>
    </body>
    <!-- Footer -->
    <div id="footer"></div>
</html>
