<?php
//start session
session_start();
//unregister session
session_unset();
//destroy session
session_destroy();

echo"<script>
        alert('Logout successfully.');
    </script>";

//go to index
header("location: index.php");
exit();
