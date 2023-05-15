<?php include("conn.php"); ?>
<?php
// ref = https://www.w3schools.com/php/php_mysql_select.asp
// ref 2 = https://www.youtube.com/watch?v=gCo6JqGMi30&ab_channel=DaniKrossing
ob_start();
session_start();
?>
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
            .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
            }

            .profile-button {
                background: rgb(99, 39, 120);
                box-shadow: none;
                border: none
            }

            .profile-button:hover {
                background: #682773
            }

            .profile-button:focus {
                background: #682773;
                box-shadow: none
            }

            .profile-button:active {
                background: #682773;
                box-shadow: none
            }

            .back:hover {
                color: #682773;
                cursor: pointer
            }

            .labels {
                font-size: 11px
            }

            .add-experience:hover {
                background: #BA68C8;
                color: #fff;
                cursor: pointer;
                border: solid 1px #BA68C8
            }
        </style>
    </head>
    <body>
    <!-- Header -->
    <div id="header"></div>
    <?php
    //display user personal details
    if (isset($_SESSION["user_email"])) {
        echo "
        <div class='container rounded bg-secondary mt-5 mb-5'>
        <div class='row' style='margin-top: 200px'>
            <div class='col-md-4 border-right'>
                <div class='d-flex flex-column align-items-center text-center p-3 py-5'>
                    <img class='rounded-circle mt-5' width='150px' src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'>
                    <span class='font-weight-bold'></span>
                    <span class='text-light'><p>". $_SESSION["user_email"] ."</p></span>
                </div>
            </div>
            <div class='col-md-7 border-right'>
                <div class='p-3 py-5'>
                    <div class='d-flex justify-content-between align-items-center mb-2'>
                        <h4 class='text-right text-light fs-2'> Edit Profile Settings</h4>
                    </div>
                    <div class='row mt-10'>
                    <form action='my-account-update.php' method='POST'>
                        <div class='col-md-19' style='text-align: left;'>
                        <label class='labels text-light fs-5'>Name</label>
                        <input type='text' class='form-control' placeholder='". $_SESSION["user_name"] ."' value='' name='u_name'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                        <label class='labels text-light fs-5'>Address</label>
                        <input type='text' class='form-control' placeholder='". $_SESSION["user_add"] ."' value='' name='u_add'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                        <label class='labels text-light fs-5'>Phone Number</label>
                        <input type='tel' class='form-control' placeholder='". $_SESSION["user_phnum"] ."' value='' name='u_phnum'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                        <label class='labels text-light fs-5'>New Password</label>
                        <input type='password' class='form-control' placeholder='***********' name='u_pw'>
                        </div>
                        
                    </div>
                    <div class='mt-5 text-center'>
                    <button class='btn btn-light profile-button' type='submit' name='save-profile-btn' style='margin-right: -180px;'>Save Profile Changes</button>
                    <button class='btn btn-light profile-button' type='reset' name='discard-changes-btn' style='margin-left: -180px;'>Disard Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        ";
    }
    else if(isset($_SESSION["user_id"])) {
        echo "
        <div class='container rounded bg-secondary mt-5 mb-5'>
        <div class='row' style='margin-top: 200px'>
            <div class='col-md-4 border-right'>
                <div class='d-flex flex-column align-items-center text-center p-3 py-5'>
                    <img class='rounded-circle mt-5' width='150px' src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'>
                    <span class='font-weight-bold'></span>
                    <span class='text-light'><p>". $_SESSION["user_id"] ."</p></span>
                </div>
            </div>
            <div class='col-md-7 border-right'>
                <div class='p-3 py-5'>
                    <div class='d-flex justify-content-between align-items-center mb-2'>
                        <h4 class='text-right text-light fs-2'> Edit Profile Settings</h4>
                    </div>
                    <div class='row mt-10'>
                    <form action='my-account-update.php' method='POST'>
                        <div class='col-md-19' style='text-align: left;'>
                        <label class='labels text-light fs-5'>Name</label>
                        <input type='text' class='form-control' placeholder='". $_SESSION["user_name"] ."' value='' name='u_name'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                        <label class='labels text-light fs-5'>Phone Number</label>
                        <input type='tel' class='form-control' placeholder='". $_SESSION["user_phnum"] ."' value='' name='u_phnum'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                        <label class='labels text-light fs-5'>New Password</label>
                        <input type='password' class='form-control' placeholder='***********' name='u_pw'>
                        </div>
                        
                    </div>
                    <div class='mt-5 text-center'>
                    <button class='btn btn-light profile-button' type='submit' name='save-btn' style='margin-right: -180px;'>Save Profile Changes</button>
                    <button class='btn btn-light profile-button' type='reset' name='discard-changes-btn' style='margin-left: -180px;'>Disard Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        ";
    }

    else {
        echo"<script>
            alert('You need to sign in first to access this page.');
            window.location.href='registration_panel.php';
            </script>";
    };
    ?>
    </body>
    <!-- Footer -->
    <div id="footer"></div>
</html>
