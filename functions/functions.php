<?php 

//Connection to the database

include("./includes/db.php");

//Global variable for the database connection

$db = $con;

//Fetch products to the frontpage showcase

function getProducts(){
    global $db;

    $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
    $run_products = mysqli_query($db, $get_products);

    while($row_products=mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];

        echo "
            <div class='col-md-4 col-sm-6 single'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                    </a>
                    <div class='text'>
                        <h3>
                            <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                        </h3>
                        <p class='price'>$$ $pro_price</p>
                        <p class='button'>
                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                <i class='fa fa-shopping-cart'></i> Add To Cart
                            </a> 
                        </p>
                    </div>
                </div>
            </div>
        ";
    }
}

//Fetch products to the shop page

function getShopProducts(){
    global $db;
    $per_page = 6;

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    $start_from = ($page - 1) * $per_page;
    $get_shop_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from, $per_page";
    $run_shop_products = mysqli_query($db, $get_shop_products);

    while($row_shop_products=mysqli_fetch_array($run_shop_products)){
        $pro_id = $row_shop_products['product_id'];
        $pro_title = $row_shop_products['product_title'];
        $pro_price = $row_shop_products['product_price'];
        $pro_img1 = $row_shop_products['product_img1'];

        echo "
            <div class='col-md-4 col-sm-6 center-responsive'>                       
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                    </a>
                    <div class='text'>
                        <h3>
                            <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                        </h3>
                        <p class='price'>$pro_price</p>
                        <p class='button'>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details...</a>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                <i class='fa fa-shopping-cart'>Add To Cart</i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        ";
    }
}

//Fetch product categories

function getPCats(){
    global $db;

    $get_p_cats = "SELECT * FROM product_categories";
    $run_p_cats = mysqli_query($db, $get_p_cats);

    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        $p_cats_id = $row_p_cats['p_cat_id'];
        $p_cats_title = $row_p_cats['p_cat_title'];

        echo "
            <li>
                <a href='shop.php?p_cat=$p_cats_id'>$p_cats_title</a>
            </li>
        ";
    }
}

//Fetch categories

function getCats(){
    global $db;

    $get_cats = "SELECT * FROM categories";
    $run_cats = mysqli_query($db, $get_cats);

    while($row_cats=mysqli_fetch_array($run_cats)){
        $cats_id = $row_cats['cat_id'];
        $cats_title = $row_cats['cat_title'];

        echo "
            <li>
                <a href='shop.php?cat=$cats_id'>$cats_title</a>
            </li>
        ";
    }
}

?>