<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-Dev Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <!-- Top Menu -->

    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">Welcome</a>
                <a href="checkout.php">4 Items In Your Cart, Total Price: 300.oo$</a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="costumer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="checkout.php">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php">Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Menu -->

    <div id="navbar" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="images/ecom-store-logo.png" alt="M-Dev-Store Logo" class="hidden-xs">
                    <img src="images/ecom-store-logo-mobile.png" alt="M-Dev-Store Logo" class="visible-xs">
                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                            <a href="checkout.php">My Account</a>
                        </li>
                        <li>
                            <a href="cart.php">Cart</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <!--Shopping Cart -->

                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span>4 Items In Your Cart</span>
                </a>

                <!-- Search Toggle On Mobile View -->

                <div class="navbar-collapse collapse right">
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i> 
                    </button>  
                </div>

                <!-- Search Toggle On Desktop -->

                <div class="collapse clearfix" id="search">
                    <form action="results.php" method="get" class="navbar-form">
                        <div class="input-group">
                            <input type="text" class="form-control" name="user_query" placeholder="Search" required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" value="Search" name="search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Slideshow -->

    <div class="container" id="slider">
        <div class="col-md-12">
            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="admin_area/slides_images/slide-1.jpg" alt="Slider Image 1">
                    </div>
                    <div class="item">
                        <img src="admin_area/slides_images/slide-2.jpg" alt="Slider Image 2">
                    </div>
                    <div class="item">
                        <img src="admin_area/slides_images/slide-3.jpg" alt="Slider Image 3">
                    </div>
                    <div class="item">
                        <img src="admin_area/slides_images/slide-4.jpg" alt="Slider Image 4">
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

    <!-- Advantages Boxes -->

    <div id="advantages">
        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3>
                            <a href="#">We Love Our Costumers</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut vel quo ex recusandae, cumque distinctio debitis! Suscipit laborum unde, quam libero deserunt cumque deleniti quisquam aperiam nobis voluptate ut consequatur.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-tag"></i>
                        </div>
                        <h3>
                            <a href="#">Best Offers</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repellat voluptates dicta, modi omnis repudiandae harum exercitationem. Fugit, recusandae, suscipit ullam et nesciunt illo odit velit, illum laudantium fuga!</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        <h3>
                            <a href="#">100% Original Products</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quas ratione suscipit labore odit deserunt blanditiis velit perspiciatis quisquam aliquam temporibus consequatur vel voluptatum, nobis voluptatibus officia recusandae sunt!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Products Showcase -->

    <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>New</h2>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-6 single">
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
            <div class="col-sm-4 col-sm-6 single">
                <div class="product">
                    <a href="details.php">
                        <img class="img-responsive" src="admin_area/product_images/product-2.jpg" alt="Product Image">
                    </a>
                    <div class="text">
                        <h3>
                            <a href="details.php">T-Shirt Men</a>
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
            <div class="col-sm-4 col-sm-6 single">
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
            <div class="col-sm-4 col-sm-6 single">
                <div class="product">
                    <a href="details.php">
                        <img class="img-responsive" src="admin_area/product_images/product-2.jpg" alt="Product Image">
                    </a>
                    <div class="text">
                        <h3>
                            <a href="details.php">T-Shirt Men</a>
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
            <div class="col-sm-4 col-sm-6 single">
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
            <div class="col-sm-4 col-sm-6 single">
                <div class="product">
                    <a href="details.php">
                        <img class="img-responsive" src="admin_area/product_images/product-2.jpg" alt="Product Image">
                    </a>
                    <div class="text">
                        <h3>
                            <a href="details.php">T-Shirt Men</a>
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
            <div class="col-sm-4 col-sm-6 single">
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
            <div class="col-sm-4 col-sm-6 single">
                <div class="product">
                    <a href="details.php">
                        <img class="img-responsive" src="admin_area/product_images/product-2.jpg" alt="Product Image">
                    </a>
                    <div class="text">
                        <h3>
                            <a href="details.php">T-Shirt Men</a>
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
    </div>

    <!-- Footer -->

    <?php 
    
        include("includes/footer.php");
    
    ?>

    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/jquery-331.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>