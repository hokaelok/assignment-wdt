<?php
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
    </head>
    <body>
    <div id="header"></div>
    <div class="content-area">
    <h2>Content</h2>
    </div>
    </body>
    <div id="footer"></div>
</html>
