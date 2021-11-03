<?php

//Header

include("includes/header.php");

//Redirects the user to the admin login page if he's not logged in as an admin

if(!isset($_SESSION['admin_email'])){
    echo "
        <script>
            alert('You need to log in as an admin to access this page!');
            window.open('admin_login.php', '_self');
        </script>
    ";
}

?>

<!-- Admin Page -->

<div id="wrapper">
    <?php

        //Navbar
    
        include("admin_area/includes/admin_sidebar.php");
    
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <?php 
            
            if(isset($_GET['dashboard'])){
                include("admin_area/dashboard.php");
            }
            
            ?>
        </div>
    </div>
</div>

<?php

//Footer

include("admin_area/includes/admin_footer.php");

?>