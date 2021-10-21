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
                <div class="box">
                    <h1>Shop</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe debitis necessitatibus tempore iure, laudantium dignissimos sed corporis, cum ex, maxime error ipsa id facilis consectetur harum. Consequatur dolore adipisci beatae.</p>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 center-responsive">                       
                        <div class="product">
                            <a href="details.php">
                                <img class="img-responsive" src="admin_area/product_images/product-1.jpg" alt="Product Image">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Oversized T-Shirt</a>
                                </h3>
                                <p class="price">$30</p>
                                <p class="button">
                                    <a href="details.php" class="btn btn-default">View Details...</a>
                                    <a href="details.php" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart">Add To Cart</i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">                       
                        <div class="product">
                            <a href="details.php">
                                <img class="img-responsive" src="admin_area/product_images/product-2.jpg" alt="Product Image">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Mens T-Shirt</a>
                                </h3>
                                <p class="price">$30</p>
                                <p class="button">
                                    <a href="details.php" class="btn btn-default">View Details...</a>
                                    <a href="details.php" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart">Add To Cart</i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">                       
                        <div class="product">
                            <a href="details.php">
                                <img class="img-responsive" src="admin_area/product_images/Product-3b.jpg" alt="Product Image">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Mens T-Shirt</a>
                                </h3>
                                <p class="price">$30</p>
                                <p class="button">
                                    <a href="details.php" class="btn btn-default">View Details...</a>
                                    <a href="details.php" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart">Add To Cart</i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">                       
                        <div class="product">
                            <a href="details.php">
                                <img class="img-responsive" src="admin_area/product_images/Product-4a.jpg" alt="Product Image">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Womans T-Shirt</a>
                                </h3>
                                <p class="price">$30</p>
                                <p class="button">
                                    <a href="details.php" class="btn btn-default">View Details...</a>
                                    <a href="details.php" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart">Add To Cart</i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">                       
                        <div class="product">
                            <a href="details.php">
                                <img class="img-responsive" src="admin_area/product_images/Product-5a.jpg" alt="Product Image">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Womans Top</a>
                                </h3>
                                <p class="price">$30</p>
                                <p class="button">
                                    <a href="details.php" class="btn btn-default">View Details...</a>
                                    <a href="details.php" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart">Add To Cart</i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">                       
                        <div class="product">
                            <a href="details.php">
                                <img class="img-responsive" src="admin_area/product_images/Product-6a(1).jpg" alt="Product Image">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Womans Top</a>
                                </h3>
                                <p class="price">$30</p>
                                <p class="button">
                                    <a href="details.php" class="btn btn-default">View Details...</a>
                                    <a href="details.php" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart">Add To Cart</i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <ul class="pagination">
                        <li><a href="#">First Page</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">Last Page</a></li>
                    </ul>
                </center>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <?php 
    
    include("includes/footer.php");

    ?>