<?php

/*A variable that points out which page is active*/

$page = "home";

/*Connection to the database*/

include("includes/db.php");

include("functions/functions.php");

/*Header and Navbar*/

include("includes/header.php");
include("includes/navigation.php");

?>

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
                    <?php 
                    
                        $get_slides = "SELECT * FROM slider LIMIT 0,1";
                        $run_slides = mysqli_query($con, $get_slides);

                        while($row_slides=mysqli_fetch_array($run_slides)){
                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "
                                <div class='item active'>
                                    <img src='admin_area/slides_images/$slide_image'>
                                </div>
                            ";
                        }

                        $get_slides = "SELECT * FROM slider LIMIT 1,3";
                        $run_slides = mysqli_query($con, $get_slides);

                        while($row_slides=mysqli_fetch_array($run_slides)){
                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "
                                <div class='item'>
                                    <img src='admin_area/slides_images/$slide_image'>
                                </div>
                            ";
                        }
                    
                    ?>
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
            <?php 
            
                        getProducts();
            
            ?>
        </div>
    </div>

    <!-- Footer -->

    <?php 
    
        include("includes/footer.php");
    
    ?>