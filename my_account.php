<!-- Header and Navbar -->

<?php

    $page = "account";

    include("includes/header.php");
    include("includes/navigation.php")

?>
<div id="content">
    <div class="container">

        <!-- Breadcrumbs -->

        <?php 
        
            include("includes/breadcrumbs.php");
        
        ?>
        <div class="col-md-3">

            <!-- Sidebar -->

            <?php 
            
                include("includes/account_sidebar.php");
            
            ?>
        </div>

        <!-- My Account Page -->

        <div class="col-md-9">
            <div class="box">
                <?php
                
                    switch($_GET){
                        case isset($_GET['my_orders']):
                            include("customer/my_orders.php");
                            break;
                        case isset($_GET['offline_payment']):
                            include("customer/pay_offline.php");
                            break;
                        case isset($_GET['edit_account']):
                            include("customer/edit_account.php");
                            break;
                        case isset($_GET['change_password']):
                            include("customer/change_password.php");
                            break;
                        case isset($_GET['delete_account']):
                            include("customer/delete_account.php");
                            break;
                    }
                        
                
                ?>
            </div>
        </div>       
    </div>
</div>

<!-- Footer -->

<?php 

    include("includes/footer.php");

?>