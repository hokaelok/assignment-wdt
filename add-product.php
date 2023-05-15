<?php
    include("conn.php");
    ob_start();
    session_start();
    $Product_Name = $_POST['Product_Name'];
    $Brand = $_POST['Brand'];
    $Type_of_Animal = $_POST['Type_of_Animal'];
    $Category = $_POST['Category'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $Quantity = $_POST['Quantity'];
    $status = $_POST['status'];
    $Supplier_Name = $_POST['Supplier_Name'];
    $Staff_ID = $_POST['Staff_ID'];
    $IMG=$_FILES['IMG']['tmp_name'];
    $img = file_get_contents($IMG);
    //check is the data available in database
    $result=mysqli_query($con,"SELECT * FROM product WHERE Product_Name ='$Product_Name' limit 1");
    //if the data available then display account exist alert
    if(mysqli_num_rows($result)==1){
        echo "<script>
        alert('Product exists.');
        window.location.href = 'view-product.php';
        </script>";
        //close connection
        mysqli_close($con);
    }
    else{
    //if the data not exist then add the data into database
        $mysql_run=mysqli_query($con, "SELECT * FROM supplier WHERE Supplier_Name = '$Supplier_Name';");
        if(mysqli_num_rows($mysql_run)==1){
            while ($row=mysqli_fetch_assoc($mysql_run)) {
            $Supplier_ID=$row["Supplier_ID"];
            $sql="INSERT INTO product (Product_Name, Brand, Type_of_Animal, Category, Description, Price, Quantity, Product_Status, Supplier_ID, Staff_ID, Product_Image)
            VALUES
            ('$_POST[Product_Name]','$_POST[Brand]','$_POST[Type_of_Animal]','$_POST[Category]','$_POST[Description]','$_POST[Price]','$_POST[Quantity]','$_POST[status]','$Supplier_ID','$Staff_ID',?)";
            //insert the image into database
            $stmt = mysqli_prepare($con,$sql);
            mysqli_stmt_bind_param($stmt,"s",$img);
            mysqli_stmt_execute($stmt);
            $check = mysqli_stmt_affected_rows($stmt);
            if($check == 1){ echo '<script>
                alert("Product had been added.");
                window.location.href="view-product.php";</script>'; 
            }
            }
        }
        else{
            echo '<script>
                alert("The supplier is not exists.");
                window.location.href="manage-supplier.php";
                </script>';
        }
    }
        //close connection  
        mysqli_close($con);
?>