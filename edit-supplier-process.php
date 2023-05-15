<?php
ob_start();
session_start();
include "conn.php";
if (isset($_POST["submitBtn"])) {
    $Supplier_ID = $_POST['Supplier_ID'];
    $Supplier_Name = $_POST["supplierName"];
    $Supplier_Contact1 = $_POST['Supplier_Contact1'];
    $Supplier_Contact2 = $_POST['Supplier_Contact2'];
    $Street = $_POST["street"];
    $City = $_POST["city"];
    $Zipcode = $_POST["zipcode"];
    $State = $_POST["state"];

    $mysql_run= mysqli_query($con,"UPDATE supplier SET
    Supplier_Name = '$Supplier_Name',
    Street = '$Street',
    City = '$City',
    Zipcode = '$Zipcode',
    State = '$State',
    Contact_Number1='$Supplier_Contact1',
    Contact_Number2='$Supplier_Contact2'
    WHERE Supplier_ID = '$Supplier_ID'");
    // if succesful
    print "<script>alert('Supplier Information Updated!'); 
    window.location.href='manage-supplier.php';
    </script>";
    
}
?>