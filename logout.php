<?php

//Header

include("includes/header.php");

//User logout functionality

if(isset($_SESSION['customer_email'])){

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
}

//Admin logout functionality

if(isset($_SESSION['admin_email'])){

    //End current session

    session_destroy();

    //Display a message and redirect the admin to the homepage

    echo "
        <script>
            alert('You have been logged out successfully!');
            window.open('index.php', '_self');
        </script>
    ";
}

?>