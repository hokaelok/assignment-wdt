<?php
    include("conn.php");
    ob_start();
    session_start();

    $Supplier_ID = $_POST['Supplier_ID'];
    $Supplier_Name = $_POST['Supplier_Name'];
    $Supplier_Contact1 = $_POST['Supplier_Contact1'];
    $Supplier_Contact2 = $_POST['Supplier_Contact2'];
    $Street = $_POST['Street'];
    $City = $_POST['City'];
    $Zipcode = $_POST['Zipcode'];
    $State = $_POST['State'];

    // check is the data available in database
    $result=mysqli_query($con,"SELECT * FROM supplier WHERE Supplier_ID ='$Supplier_ID' OR Supplier_Name='$Supplier_Name' limit 1");

    // if the data available then display account exist alert
    if(mysqli_num_rows($result)==1){
        echo "<script>
        alert('Supplier exists.');
        window.location.href = 'manage-supplier.php';
        </script>";
        // close connection
        mysqli_close($con);
    }
    else{
    // if the data not exist then add the data into database
    $sql="INSERT INTO supplier (Supplier_ID, Supplier_Name, Street, City, Zipcode, State, Contact_Number1, Contact_Number2)
    VALUES
    ('$Supplier_ID','$Supplier_Name','$Street','$City','$Zipcode','$State', '$Supplier_Contact1', '$Supplier_Contact2')";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
        }
        else {
            echo '<script>
            alert("Supplier had been added.");
            window.location.href="manage-supplier.php";;
            </script>';
        }
    }
    //close connection  
    mysqli_close($con);
?>