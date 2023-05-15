<!DOCTYPE html>
<html>

<head>
    <!-- common meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-withd, initial-scale=1">

    <!-- css styling -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to right, plum , rgb(206, 189, 206));
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 200px;
        }

        div {
            margin-top: 170px;
        }

        h1 {
            font-family: 'Lobster', cursive;
            color: pink
        }

        img {
            height: 310px;
            border-radius: 160px;
        }

    </style>

</head>

<body>
    <!-- Announcement -->
    <div>
        <h1 style="color: white; font-family: poppins">
            Transaction success! Thanks for purchasing on Paws Heaven!
        </h1>
        <h1 style="color: white; font-family: poppins">
            You could view the order in Purchase History. Tracking number will be sent to your email
        </h1>
        <img src="image/happydoggy.jpg">
    </div>

    <script>
        // Redirect customer to Sign In Page after specific duration

        var seconds = 5;
        setInterval(function() {
        seconds --;
        if (seconds == 0) {
            window.location = "index.php";
        }
        },1000)

    </script>
</body>

</html>