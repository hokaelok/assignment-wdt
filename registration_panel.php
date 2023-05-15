<!DOCTYPE html>
<html>
    <head>
        <title>Paws Heaven</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script>
            $(function(){ 
                $("#header").load("common/header.php");
                $("#footer").load("common/footer.php");
            });
        
        </script>

    <!-- website title -->
    <title>Paws Heaven Member Register</title>
    <style>
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

        * {
	    box-sizing: border-box;
        }

        body {
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 90vh;
            margin: 20px 0 20px;
        }
	
	    #return {
            position: absolute;
            top: 5%;
            left: 1%;
            cursor: pointer;
            border: none;
            background-color: white;
            color: #dfa6c7;
        }

        #returnBtn {
            position: absolute;
            top: 5%;
            left: 1%;
            cursor: pointer;
            border: none;
            background-color: #dfa6c7;
            color: white;
        }
	    
        .container h1 {
            font-weight: bold;
            margin: 0 0 0 50;
        }

        .container h2 {
            text-align: center;
        }

        .overlay p {
            font-size: 25px;
            font-weight: 100;
            line-height: 50px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        .sign-in-area a {
            color: #333;
            font-size: 20px;
            text-decoration: none;
            margin: 15px 0;
        }

        .container button {
            border-radius: 20px;
            border: 1px solid rgb(226, 187, 226);
            background-color:rgb(219, 191, 221);
            color: #FFFFFF;
            font-size: 20px;
            font-weight: bold;
            padding: 12px 45px;
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

        .container button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        .container form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        .container input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
            font-size:20px;
        }

        .container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 1000px;
            max-width: 100%;
            min-height: 700px;
        }

        .register-form {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-area {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-area {
            transform: translateX(100%);
        }

        .sign-up-area {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-area {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {
            0%, 49.99% {
                opacity: 0;
                z-index: 1;
            }
            
            50%, 100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-area {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-area{
            transform: translateX(-100%);
        }

        .overlay {
            background: #e9b2cd;
            background: -webkit-linear-gradient(to right, #dfa6c7, #ec92b8);
            background: linear-gradient(to right,#dfa6c7, #dfa6c7);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }
    </style>
</head>

<body>
    <div class="background"></div>
    <div class="container" id="container">

        <!-- Sign Up Form -->
        <div class="register-form sign-up-area">
            <form action="signup.php" method="POST">
                <h1>Create Account</h1><br>
                <!-- Request Name -->
                <input type="text" placeholder="Name" name="SignUp_name"  required/>
                <!-- Request Mobile Number -->
                <input type="text" placeholder="Mobile Number" name="SignUp_phoneNum" required/>
                <!-- Request Address -->
                <input type="text" placeholder="Address" name="SignUp_address" required/>
                <!-- Request Email -->
                <input type="email" placeholder="Email" name="SignUp_email" required/>
                <!-- Request Password -->
                <input type="password" placeholder="Password" name="SignUp_password" required/><br>
                <!-- Submit Button -->
                <button type="submit" name="SignUp_button">Sign Up</button>
            </form>
        </div>

        <!-- Sign In Form -->
        <div class="register-form sign-in-area">
	    <a href="index.php">
                <button id="return"> < Back </button>
            </a>
            <form action="login.php" method="POST">
                <h1>Sign in</h1>
                <!-- Request Email -->
                <input type="email" placeholder="Email" name="SignIn_email" required/>
                <!-- Request Password -->
                <input type="password" placeholder="Password" name="SignIn_password" required/>
                <!-- Link for Forgot Password -->
                <a href="admin-login-panel.php">Admin Login</a>
                <!-- Submit Button -->
                <button type="submit" name="SignIn_button">Sign In</button>
            </form>
        </div>

        <!-- Overlay Panel -->
        <div class="overlay-area">
            <div class="overlay">

                <!-- Overlay Left Panel -->
                <div class="overlay-panel overlay-left">
		    <a href="index.php">
                        <button id="returnBtn"> < Back </button>
                    </a>
                    <h1>Welcome Back!</h1>
                    <p>Login now and keep your fur buddy happy : )</p>
                    <!-- Overlay Transition Button -->
                    <button class="ghost" id="signIn">Sign In</button>
                </div>

                <!-- Overlay Right Panel -->
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Buddy!</h1>
                    <p>Enter your personal details and start journey with us to keep your pet happy!</p>
                    <!-- Overlay Transition Button -->
                    <button class="ghost" id="signUp">Sign Up</button>

                </div>
            </div>
        </div>
    </div>

    <!-- JS file -->
    <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
        </script>

</body>
</html>

<?php 
    if(isset($_POST["SignUp_button"])){
        $SignUp_name=$_POST["SignUp_name"];
		$SignUp_phoneNum=$_POST["SignUp_phoneNum"];
		$SignUp_email=$_POST["SignUp_email"];
		$SignUp_address=$_POST["SignUp_address"];
		$SignUp_password=$_POST["SignUp_password"];
		}
     else if(isset($_POST["SignIn_button"])){
        $SignIn_email=$_POST["SignIn_email"];
        $SignIn_password=$_POST["SignIn_password"];
        }
?>
