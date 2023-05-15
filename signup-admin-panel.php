<!DOCTYPE html>
<html lang="en">
<head>
    <!-- common meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-withd, initial-scale=1">

    <!-- import css file -->
    <link rel="stylesheet" href="css/admin-login.css">

    <!-- import javascript file -->

    <!-- website title -->
    <title>Paws Heaven Admin Signin</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        .background {
            width: 100%;
            height: 120%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url(image/login-background.png);
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
            background-color: black;
            position: fixed;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: bold;
            margin: 0 0 0 50;
        }

        #return {
            position: absolute;
            top: 10px;
            left: 10px;
            cursor: pointer;
            border: none;
            background-color: white;
            color: #dfa6c7;
            padding:5px;
            margin-top:5px;
            font-size:10px;
        }

        .container button {
            border-radius: 20px;
            border: 1px solid rgb(226, 187, 226);
            background-color: rgb(219, 191, 221);
            color: #FFFFFF;
            font-size: 13px;
            font-weight: bold;
            padding: 10px 45px;
            margin-top: 15px;
            letter-spacing: 3px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        .container button:active {
            transform: scale(0.95);
        }

        .container button:focus {
            outline: none;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 30px;
            height: 100%;
            transform: translateX(70px);
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 80%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 50%;
            height: 75%;
            max-width: 100%;
        }

        .register-form {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-up-area {
            left: 0;
            width: 80%;
            z-index: 2;
        }
</style>
</head>

<body>
    <div class="background"></div>
    <div class="container" id="container">
        
        <!-- Sign Up Form -->
        <div class="register-form sign-up-area">
        <a href="admin-dashboard.php">
            <button id="return"> < Back </button>
        </a>
            <form action="admin-signup.php" method="POST">
                <h1>Sign Up New Admin</h1>
                <!-- Request Staff ID -->
                <input type="text" placeholder="Staff_ID" name="Staff_ID" required/>
                <!-- Request Staff Name -->
                <input type="text" placeholder="Staff_Name" name="Staff_Name" required/>
                <!-- Request Password -->
                <input type="password" placeholder="Password" name="SignUp_password" required/>
                <!-- Request Position -->
                <input type="text" placeholder="Position" name="Position" required/>
                <!-- Request Phone Number -->
                <input type="text" placeholder="Contact Number" name="phnum" required/>
                <!-- Submit Button -->
                <button type="submit" name="SignUp_button">Sign Up</button>
            </form>
        </div>
        <!-- //Sign Up Form -->
    </div>

</body>
</html>

<?php 
    if(isset($_POST["SignUp_button"])){
        $Staff_ID=$_POST["Staff_ID"];
        $Staff_Name=$_POST["Staff_Name"];
        $SignUp_password=$_POST["SignUp_password"];
        $Position=$_POST["Position"];
        $phnum=$_POST["phnum"];
        }
?>