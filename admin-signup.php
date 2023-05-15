<?php
    include("conn.php");
    $Staff_ID=$_POST["Staff_ID"];
    $Staff_Name=$_POST["Staff_Name"];
    $SignUp_password=$_POST["SignUp_password"];
    $Position=$_POST["Position"];
    $phnum=$_POST["phnum"];
    //check is the data available in database
    $result=mysqli_query($con,"SELECT * FROM staff WHERE Staff_ID='$Staff_ID' limit 1");
    //if the data available then display account exist alert
    if(mysqli_num_rows($result)==1){
        echo "<script>
        alert('Account exists.');
        window.location.href = 'signup-admin-panel.php';
        </script>";
        //close connection
        mysqli_close($con);
    }
    else{
        //if the data not exist then add the data into database
        $sql="INSERT INTO staff (Staff_ID, Staff_Name, Password, Position, Contact_Number)
        VALUES
        ('$_POST[Staff_ID]','$_POST[Staff_Name]','$_POST[SignUp_password]','$_POST[Position]','$_POST[phnum]')";
        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
            }
            else {
            session_start();
            echo '<script>
            window.location.href = "dumbass_page.php";
            </script>';
            }
        }
        //close connection
        mysqli_close($con);
?>