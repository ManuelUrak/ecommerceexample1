<?php

$page = "shop";

include("includes/header.php");
include("includes/navigation.php");

?>
    <!-- Shop -->

    <div id="content">
        <div class="container">

            <!-- Breadcrumbs -->

            <?php 
            
                include("includes/breadcrumbs.php");
            
            ?>

            <!-- Sidebar -->

            <div class="col-md-3">
                <?php 

                    include("includes/sidebar.php");

                ?>
            </div>

            <!-- Shop Content -->

            <div class="col-md-9">
                <?php
                
                    //Shop welcome text. Only shown when no filter is active.
                
                    if(!(isset($_GET['p_cat']) || isset($_GET['cat']))){
                        echo "
                        <div class='box'>
                            <h1>Shop</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe debitis necessitatibus tempore iure, laudantium dignissimos sed corporis, cum ex, maxime error ipsa id facilis consectetur harum. Consequatur dolore adipisci beatae.</p>
                        </div>
                        ";
                    }
                
                ?>

                <!-- Product Showcase -->

                <div class="row">
                    <?php 
                    if(!(isset($_GET['p_cat']) || isset($_GET['cat']))){
                        getShopProducts();
                    ?>
                </div>

                <!-- Pagination -->

                <center>
                    <ul class="pagination">
                        <?php
                        
                            getPaginator();
                        }

                        ?>
                    </ul>
                </center>

                <!-- Filter products by product category -->

                <div class="row">
                    <?php 
                    
                    getFilterByPCat();
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <?php 
    
    include("includes/footer.php");

    ?>