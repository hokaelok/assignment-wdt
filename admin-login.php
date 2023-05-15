<?php
    //connect to database
    include('conn.php');
    $Staff_ID=$_POST["Staff_ID"];
    $SignIn_password=$_POST["SignIn_password"];
    //compare staff id and password entered with the data in database
    $sql=mysqli_query($con,"SELECT Staff_ID, Password FROM staff WHERE Staff_ID='$Staff_ID' AND Password='$SignIn_password' limit 1");
    
    //if the data entered correct
    if(mysqli_num_rows($sql)==1)
    {   
        //retrieve data from database
        $data=mysqli_fetch_array($sql);

        //get user data
        $user=$data['Staff_ID'];
        
        //start session with the personal details
        session_start();
        $user_data_result = mysqli_query($con, "SELECT * FROM staff WHERE Staff_ID='$user' limit 1");
        $user_data = mysqli_fetch_array($user_data_result);
        $_SESSION["user_id"] = $user_data['Staff_ID'];
        $_SESSION["user_name"] = $user_data['Staff_Name'];
        $_SESSION["user_pw"] = $user_data['Password'];
        $_SESSION["user_position"] = $user_data['Position'];
        $_SESSION["user_phnum"] = $user_data['Contact_Number'];      

        //go to index
        header("location: index.php");
        exit();
    }
    else
    {   
        //move to admin login page
        echo"<script>
            alert('Failed to login.');
            window.location.href='admin-login.php';
            </script>";
    }
?>