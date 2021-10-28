<?php

//Header

include("includes/header.php");

//End current session

session_destroy();

//Empty cart

$ip_add = getUserIP();
$query = "DELETE FROM cart WHERE ip_add='$ip_add'";
$run_query = mysqli_query($con, $query);

//Display the logout message and load the homepage

echo "
    <script>
        alert('You have been logged out!')
        window.open('index.php', '_self')
    </script>
";

?>