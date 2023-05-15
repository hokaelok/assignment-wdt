<?php
ob_start();
session_start();

//connect database
include ("conn.php");
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Paws Heaven View Customers</title>

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
        .viewMessage {
            width: 95%;
            margin: auto;
            border: 1px solid black;
            background-color: blanchedalmond;
        }

        .viewMessage td, 
        .viewMessage th {
            border: 1px solid black;
            min-width: 90px;
        }
    </style>

</head>
<body>

<!-- Header --> 
<div id="header"></div>

<!-- Main Content Area -->
<div class="content-area">
    <h2>Customer Messages</h2>
    <hr>
    <!-- table header -->
    <table class="viewMessage">
        <tr>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>

        <?php

        // get order info from orders table
            $sql = mysqli_query($con, "SELECT * FROM message ORDER BY Message_ID desc");
            while($row = mysqli_fetch_array($sql)) {
                $Customer_Name = $row["Name"];
                $Email = $row['Email'];
                $Message = $row['Message'];

        ?>

        <tr>
            <td><?php print $Customer_Name ?></td>
            <td><?php print $Email ?></td>
            <td><?php print $Message ?></td>
        </tr>

        <?php } 
        ?>

    </table>

</div>
</body>
<!-- Footer -->
<div id="footer"></div>
</html>