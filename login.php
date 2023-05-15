<?PHP 
    //connect to database
    include('conn.php');
    $SignIn_email=$_POST["SignIn_email"];
    $SignIn_password=$_POST["SignIn_password"];
    //compare staff id and password entered with the data in database
    $sql=mysqli_query($con,"select Email, Password FROM member WHERE Email='$SignIn_email' AND Password='$SignIn_password' limit 1");

    //if the data entered correct
    if(mysqli_num_rows($sql)==1)
    {
        //retrieve data from database
        $data=mysqli_fetch_array($sql);

        //get user data
        $user=$data['Email'];

        //start session with the personal details
        session_start();
        $user_data_result = mysqli_query($con, "SELECT * FROM member WHERE Email='$user' limit 1");
        $user_data = mysqli_fetch_array($user_data_result);
        $_SESSION["user_email"] = $user_data['Email'];
        $_SESSION["user_name"] = $user_data['Member_Name'];
        $_SESSION["user_pw"] = $user_data['Password'];
        $_SESSION["user_phnum"] = $user_data['Contact_Number'];
        $_SESSION["user_add"] = $user_data['Address'];

        //go to index
        header("location: index.php");
        exit();
    }
    else
    {
        ////move to registration panel
        echo"<script>
            alert('Failed to login.');
            window.location.href='registration_panel.php';
            </script>";
    }
?>
