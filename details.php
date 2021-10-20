<?php 

include("includes/header.php");
include("includes/navigation.php");

?>

<div id="content">
    <div class="container">
        <div class="col-md-12">                
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>Shop</li>
            </ul>
        </div>

        <!-- Sidebar -->

        <div class="col-md-3">
            <?php 

                include("includes/sidebar.php");

            ?>
        </div>

        <!-- Details Page -->

        <div class="col-md-9">
            <div id="productMain" class="row">
                <div class="col-sm-6">

                    <!-- Product Image Slider -->

                    <div id="mainImage">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <center>
                                        <img class="image-responsive" src="admin_area/product_images/Product-3a.jpg" alt="Image">
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        <img class="image-responsive" src="admin_area/product_images/Product-3b.jpg" alt="Image">
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        <img class="image-responsive" src="admin_area/product_images/Product-3c.jpg" alt="Image">
                                    </center>
                                </div>
                            </div>
                            <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">

                    <!-- Product Information -->

                    <div class="box">
                        <h1 class="center">Polo Shirt</h1>
                        <form action="" class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="" class="col-md-5 control-label">Product Quantity</label>
                                <div class="col-md-7">
                                    <select name="product_qty" id="" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Size</label>
                                <div class="col-md-7">
                                    <select name="product_size" id="" class="form-control">
                                        <option>Select a size...</option>
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                </div>
                            </div>
                            <p class="price">$30</p>
                            <p class="text-center buttons"><button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To Cart</button></p>
                        </form>
                    </div>
                    <div class="row" id="thumbs">
                        <div class="col-xs-4">
                            <a href="#" data-target="#myCarousel" data-slide-to="0" class="thumb">
                                <img src="admin_area/product_images/Product-3a.jpg" alt="Image" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" data-target="#myCarousel" data-slide-to="1" class="thumb">
                                <img src="admin_area/product_images/Product-3b.jpg" alt="Image" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" data-target="#myCarousel" data-slide-to="2" class="thumb">
                                <img src="admin_area/product_images/Product-3c.jpg" alt="Image" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details -->

            <div class="box" id="details">
                <h4>Product Details</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident hic est itaque minima illo, possimus excepturi assumenda mollitia voluptas ullam eum! Molestias rerum architecto deleniti, quis distinctio repudiandae. Explicabo, corrupti?</p>
                <hr>
            </div>

            <!-- Suggested Products -->

            <div id="same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height headline">
                        <h3 class="text-center">Products You May Like</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 center-responsive">
                    <div class="product same-height">
                        <a href="details.php">
                            <img class="img-responsive" src="admin_area/product_images/Product-6a(1).jpg" alt="Image">
                        </a>
                        <div class="text">
                            <h3><a href="details.php"></a>Tank Top Woman</h3>
                            <p class="price">$30</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 center-responsive">
                    <div class="product same-height">
                        <a href="details.php">
                            <img class="img-responsive" src="admin_area/product_images/Product-5a.jpg" alt="Image">
                        </a>
                        <div class="text">
                            <h3><a href="details.php"></a>M-Dev Top Woman</h3>
                            <p class="price">$30</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 center-responsive">
                    <div class="product same-height">
                        <a href="details.php">
                            <img class="img-responsive" src="admin_area/product_images/Product-4a.jpg" alt="Image">
                        </a>
                        <div class="text">
                            <h3><a href="details.php"></a>Polo Shirt Woman</h3>
                            <p class="price">$30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

include("includes/footer.php");

?>