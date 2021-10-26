<?php 

//Header and navbar

include("includes/header.php");
include("includes/navigation.php");

//Display the correct product from the database

if(isset($_GET['pro_id'])){
    $product_id = $_GET['pro_id'];
    $get_product = "SELECT * FROM products WHERE product_id=$product_id";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);
    $p_cat_id = $row_product['p_cat_id'];
    $pro_title = $row_product['product_title'];
    $pro_price = $row_product['product_price'];
    $pro_desc = $row_product['product_desc'];
    $pro_img1 = $row_product['product_img1'];
    $pro_img2 = $row_product['product_img2'];
    $pro_img3 = $row_product['product_img3'];

    $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id=$p_cat_id";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat['p_cat_title'];

}

?>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            
            <!-- Breadcrumbs -->

            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="shop.php">Shop</a>
                </li>
                <li>
                    <a href="shop.php?p_cat=<?php echo "$p_cat_id"; ?>"><?php echo "$p_cat_title"; ?></a>
                </li>
                <li><?php echo "$pro_title"; ?></li>
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
                                        <img class="image-responsive" src="admin_area/product_images/<?php echo "$pro_img1" ?>" alt="Image">
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        <img class="image-responsive" src="admin_area/product_images/<?php echo "$pro_img2" ?>" alt="Image">
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        <img class="image-responsive" src="admin_area/product_images/<?php echo "$pro_img3" ?>" alt="Image">
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
                        <h1 class="center"><?php echo "$pro_title"; ?></h1>
                        <?php addToCart(); ?>
                        <form action="details.php?add_cart=<?php echo "$product_id" ?>" class="form-horizontal" method="post">
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
                                    <select name="product_size" id="" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Please pick a size!')">
                                        <option disabled selected>Select a size...</option>
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                </div>
                            </div>
                            <p class="price">$ <?php echo "$pro_price"; ?></p>
                            <p class="text-center buttons"><button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To Cart</button></p>
                        </form>
                    </div>
                    <div class="row" id="thumbs">
                        <div class="col-xs-4">
                            <a href="#" data-target="#myCarousel" data-slide-to="0" class="thumb">
                                <img src="admin_area/product_images/<?php echo "$pro_img1" ?>" alt="Image" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" data-target="#myCarousel" data-slide-to="1" class="thumb">
                                <img src="admin_area/product_images/<?php echo "$pro_img2" ?>" alt="Image" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" data-target="#myCarousel" data-slide-to="2" class="thumb">
                                <img src="admin_area/product_images/<?php echo "$pro_img3" ?>" alt="Image" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details -->

            <div class="box" id="details">
                <h4>Product Details</h4>
                <p><?php echo "$pro_desc"; ?></p>
                <hr>
            </div>

            <!-- Suggested Products -->

            <?php 
            
                include("includes/suggestions.php");
            
            ?>
        </div>
    </div>
</div>

<?php 

include("includes/footer.php");

?>