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
            font-size:18px;
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
            height: 100%;
            transform: translateX(70px);
            
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 60%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 50%;
            height: 50%;
            max-width: 100%;
        }

        .register-form {
            position: absolute;
            top: 10px;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-area {
            left: 160px;
            width: 50%;
            z-index: 2;
        }
</style>
</head>

<body>
    <div class="background"></div>
    <div class="container" id="container">
    <a href="index.php">
            <button id="return"> < Back </button>
        </a>
        <!-- Sign In Form -->
        <div class="register-form sign-in-area">
        
            <form action="admin-login.php" method="POST">
                <h1>Hey Admin! Sign in now!</h1>
                <!-- Request Email -->
                <input type="text" placeholder="Staff_ID" name="Staff_ID" required/>
                <!-- Request Password -->
                <input type="password" placeholder="Password" name="SignIn_password" required/>
                <!-- Submit Button -->
                <button type="submit" name="SignIn_button">Sign In</button>
            </form>
        </div>
        <!-- //Sign In Form -->
    </div>

</body>
</html>

<?php 
    if(isset($_POST["SignIn_button"])){
        $Staff_ID=$_POST["Staff_ID"];
        $SignIn_password=$_POST["SignIn_password"];
        }
?>