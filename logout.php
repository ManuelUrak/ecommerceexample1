<?php

//Current session

session_start();

//End current session

session_destroy();

//Display the logout message and load the homepage

echo "
    <script>
        alert('You have been logged out!')
        window.open('index.php', '_self')
    </script>
";

?>