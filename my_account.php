<!-- Header and Navbar -->

<?php 

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
        <div class="col-md-9">
            <div class="box">
                <?php 
                
                    if(isset($_GET['my_orders'])){
                        include("customer/my_orders.php");
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