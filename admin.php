<?php

//Header

include("includes/header.php");

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