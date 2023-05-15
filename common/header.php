<?php include("../conn.php"); ?>
<?php
// ref = https://www.w3schools.com/php/php_mysql_select.asp
// ref 2 = https://www.youtube.com/watch?v=gCo6JqGMi30&ab_channel=DaniKrossing
ob_start();
session_start();
if (!isset($_SESSION["user_email"])) {
  $user_data = "";

}
else {
  $user_result = mysqli_query($con, "SELECT Email, Member_Name, Contact_Number FROM member");
  $user_data = mysqli_fetch_assoc($user_result);
}
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
        
  </head>
  <body>
      <div>
        <header>
          <div>
            <div class="logo">
              <a href="index.php">Paws Heaven</a>
            </div>
          </div>
          <div>
            <nav class="nav-top">
              <ul>
              <li><a href="contact-us.php" class="nav-top-text">Contact Us</a> |</li>
              <li><a href="termscondition.php" class="nav-top-text">T&C</a> |</li>
              <li><a href="about-us.php" class="nav-top-text">About Us</a> |</li>
              
              <?php

              if (isset($_SESSION["user_email"])) {
                echo "
                <li><a href='#' class='nav-top-text'>Profile</a> |
                <ul>
                <li><a href='my-account.php'>My account</a></li>
                <li><a href='cart.php'>Cart</a></li>
                <li><a href='purchase-history.php'>Purchase History</a></li>
                <li><a href='https://www.skynet.com.my/track'>Order Status</a></li>
                <li><a href='logout.php'>Logout</a></li>
                </ul>
                </li>
                ";
              }
              else if (isset($_SESSION["user_id"])) {
                echo "
                <li><a href='#' class='nav-top-text'>Profile</a> |
                <ul>
                <li><a href='my-account.php'>My account</a></li>
                <li><a href='logout.php'>Logout</a></li>
                </ul>
                </li>
                ";
              }
              else {
                echo "<li><a href='registration_panel.php' class='nav-top-text'>Sign In</a> |</li>";
              }
      
              ?>
              </ul>
            </nav>
          </div>
        </div>
        <div>
          <h2>TTTT</h2>
        </div>
        <div class="navigation">
          <nav class="nav-bot" style="margin-top: -2px;">
            <ul>
              <li>| <a href="dog.php" class="nav-bot-text">Dogs ▾</a>|
              <ul>
                <li><a href="dog-food.php">Food</a></li>
                <li><a href="dog-toys.php">Toys</a></li>
                <li><a href="dog-hygiene.php">Hygiene</a></li>
                <li><a href="dog-vitamins.php">Vitamins</a></li>
                <li><a href="dog-cage.php">Cage & Others</a></li>
              </ul>
              </li>
              <li><a href="cat.php" class="nav-bot-text">Cats ▾</a>|
                <ul>
                  <li><a href="cat-food.php">Food</a></li>
                  <li><a href="cat-toys.php">Toys</a></li>
                  <li><a href="cat-hygiene.php">Hygiene</a></li>
                  <li><a href="cat-vitamins.php">Vitamins</a></li>
                  <li><a href="cat-cage.php">Cage & Others</a></li>
                </ul>
                </li>
              </li>
              <li><a href="packages.php" class="nav-bot-text">Packages</a>|</li>
              <li><a href="paws-deals.php" class="nav-bot-text">Paws Deals</a>|</li>
              <li><a href="pet-advice.php" class="nav-bot-text">Paws Advice</a>|</li>
              <?php

              if (isset($_SESSION["user_id"])) {
                echo "
                <li><a href='admin-dashboard.php' class='nav-bot-text'>Admin</a>|</li>
                ";
              }
      
              ?>
            </ul>
          </nav>
        </div>
      </header>
  </body>
</html>