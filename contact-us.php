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
        <style>
            input[type="text"],input[type=email],textarea{
                background-color: #eee;
                border: none;
                padding: 12px 10px;
                margin: 8px 0;
                width: 600px;
		    }
            form {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                padding: 10px;
                margin-left: -50px;
                height: 100%;
                transform: translateX(70px);
            }
            button {
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
                float:center;
            }
            .section{
                float: center;
                margin-bottom: 30px;
                width: 700px;
            }
            .label{
                float: center;
                margin-left: -50px;
            }

            .background {
            width: 100%;
            height: 880px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(image/login-background.png);
            background-size: cover;
            background-position: center center;
            background-color: black;
            position: absolute;
        }
        </style>
    </head>
    <body>
    <!-- Include Background -->
    <div class="background"></div>
    <!-- Header -->
    <div id="header"></div>
    <!-- Main Content -->
    <div class="content-area">
      <div>
        <div>
            <img src="image/transparent 1.png" width=300px style="margin-left:-40px; margin-top:-40px; filter: brightness(180%);">
            <p class="sora fs-2 fw-bold text-white">Contact Us</p>
            <p class="sora fs-4 text-white">Email: paws_heaven@gmail.com<br>
            Contact Number: 0192881777</p>
            <!-- Contact Us Form -->
                <form action="#" method="POST">
                <div class="section">
		            <div class="label">
                    <input type="text" placeholder="Name" name="contact_name" required="required"/>
                    </div>
                </div>
                <div class="section">
		            <div class="label">
                    <input type="email" placeholder="Email" name="contact_email" required="required"/>
                    </div>
                </div>
                <div class="section">
		            <div class="label">
                    <textarea placeholder="Message" name="message" required></textarea>
                    </div>
                </div>
                <div class="section">
		            <div class="label">
                    <button type="submit" name="Submit">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
      </div>
    </div>
    </body>
    <!-- Footer -->
    <div id="footer" style="position: relative; margin-top: 20px;"></div>
</html>

<?php
    if(isset($_POST["Submit"])){
        $contact_name=$_POST["contact_name"];
        $contact_email=$_POST["contact_email"];
        $message=$_POST["message"];
        //connect to database
        include("conn.php");
        //insert data into database
        $sql="INSERT INTO message (Name, Email, Message)
        VALUES
        ('$_POST[contact_name]','$_POST[contact_email]','$_POST[message]')";
        if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
        }
        else {
        echo '<script>alert("Message has been sent!");
        window.location.href = "index.php";
        </script>';
        }
        //close connection
        mysqli_close($con);
    }
?>
