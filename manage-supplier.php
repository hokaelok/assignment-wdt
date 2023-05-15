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
    <title>Paws Heaven Viw Supplier</title>

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
        .new-supplier-container {
            text-align: right;
            padding-right: 50px;
        }

        .viewSupplier {
            width: 95%;
            margin: auto;
            border: 1px solid black;
            background-color: blanchedalmond;
        }

        .viewSupplier td, 
        .viewSupplier th {
            border: 1px solid black;
            min-width: 90px;
        }
    </style>
</head>
<body>
<!-- Header -->
<div id="header"></div>
<!-- Main Content -->
<div class="content-area">
    
    <h2>Suppliers</h2>
    <hr>

    <div class="new-supplier-container">
        <a href="add-new-supplier.php">
            Add New Supplier
        </a>
    </div>

    <hr>

    <!-- table header -->
    <table class="viewSupplier">
        <tr>
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Street</th>
            <th>City</th>
            <th>Zipcode</th>
            <th>State</th>
            <th>Contact Number 1</th>
            <th>Contact Number 2</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
        <?php
            // get supplier info from supplier table
            $sql = mysqli_query($con, "SELECT * FROM supplier");
            while($row = mysqli_fetch_array($sql)) {
                $Supplier_ID = $row["Supplier_ID"];
                $Supplier_Name = $row['Supplier_Name'];
                $Contact_Number1 = $row['Contact_Number1'];
                $Contact_Number2 = $row['Contact_Number2'];
                $Street = $row['Street'];
                $City = $row['City'];
                $Zipcode = $row['Zipcode'];
                $State = $row['State'];

        ?>

        <tr>
            <td><?php print $Supplier_ID ?></td>
            <td><?php print $Supplier_Name ?></td>
            <td><?php print $Street ?></td>
            <td><?php print $City ?></td>
            <td><?php print $Zipcode ?></td>
            <td><?php print $State ?></td>
            <td><?php print $Contact_Number1 ?></td>
            <td><?php print $Contact_Number2 ?></td>
            <?php
                print '
                <td>
                    <a href="edit-supplier.php?Supplier_ID='.$Supplier_ID.'">
                        Edit
                    </a>
                </td>
                <td>
                    <a href="delete-supplier.php?Supplier_ID='.$Supplier_ID.'">
                        Delete
                    </a>
                </td> '; ?>
        </tr>

        <?php 
                }
        ?>

    </table>


</div>
</body>
<!-- Footer -->
<div id="footer"></div>
</html>