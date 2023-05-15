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

        input[type=text], input[type=date], input[type=email], input[type=tel], textarea, select {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        font-size:15pt;
        }

        input[type=text]:focus{
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

    $Supplier_ID = $_GET['Supplier_ID'];
    $sql = mysqli_query($con, "SELECT * FROM supplier WHERE Supplier_ID = '$Supplier_ID'");
    while ($row = mysqli_fetch_array($sql)){

?>

    <!-- form -->
    <form action="edit-supplier-process.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="Supplier_ID" value="<?php print $row['Supplier_ID'] ?>">
        <div id="container">
        <h2>Edit Supplier</h2>
            <div class="section">
                <div class="label">
                    Supplier Name
                </div>
                <div class="field">
                    <input type="text" name="supplierName" required  value="<?php echo $row["Supplier_Name"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    Contact Number 1
                </div>
                <div class="field">
                    <input type="text" name="Supplier_Contact1" required value="<?php echo $row["Contact_Number1"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    Contact Number 2
                </div>
                <div class="field">
                    <input type="text" name="Supplier_Contact2" value="<?php echo $row["Contact_Number2"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    Street
                </div>
                <div class="field">
                    <input type="text" name="street" required  value="<?php echo $row["Street"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    City
                </div>
                <div class="field">
                    <input type="text" name="city" required  value="<?php echo $row["City"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    Zipcode
                </div>
                <div class="field">
                    <input type="text" name="zipcode" required  value="<?php echo $row["Zipcode"] ?>">
                </div>
            </div>
            <div class="section">
                <div class="label">
                    State
                </div>
                <div class="field">
                    <input type="text" name="state" required  value="<?php echo $row["State"] ?>">
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
    $Supplier_Name = $_POST["supplierName"];
    $Supplier_Contact1 = $_POST['Supplier_Contact1'];
    $Supplier_Contact2 = $_POST['Supplier_Contact2'];
    $Street = $_POST["street"];
    $City = $_POST["city"];
    $Zipcode = $_POST["zipcode"];
    $State = $_POST["state"];
    $Supplier_ID = $_POST['Supplier_ID'];
}
?>