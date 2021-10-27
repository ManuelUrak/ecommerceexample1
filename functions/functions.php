<?php 

//Connection to the database

include("./includes/db.php");

//Global variable for the database connection

$db = $con;

//Get user IP

function getUserIP(){
    switch(true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}

//Add products to the cart

function addToCart(){
    global $db;

    if(isset($_GET['add_cart'])){
        $ip_add = getUserIP();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['product_qty'];
        $product_size = $_POST['product_size'];
        $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
        $run_check = mysqli_query($db, $check_product);
        
        if(mysqli_num_rows($run_check)>0){
            echo "
                <script>
                    alert('This product has already been added to the cart')
                    window.open('details.php?pro_id=$p_id', '_self')
                </script>
            ";
        }else{
            $query = "INSERT INTO cart (p_id, ip_add, qty, size) VALUES ('$p_id', '$ip_add', '$product_qty', '$product_size')";
            $run_query = mysqli_query($db, $query);

            echo "
                <script>
                    window.open('details.php?pro_id=$p_id', '_self')
                </script>
            ";
        }
    }
}

//Get total items from the cart

function totalItems(){
    global $db;

    $ip_add = getUserIP();
    $get_items = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_items = mysqli_query($db, $get_items);
    $count = mysqli_num_rows($run_items);

    echo "$count";
}

//Get total price from the cart

function totalPrice(){
    global $db;

    $ip_add = getUserIP();
    $total = 0;
    $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_cart = mysqli_query($db, $select_cart);

    while($record=mysqli_fetch_array($run_cart)){
        $p_id = $record['p_id'];
        $p_qty = $record['qty'];

        $get_price = "SELECT * FROM products WHERE product_id='$p_id'";
        $run_price = mysqli_query($db, $get_price);

        while($row_price=mysqli_fetch_array($run_price)){
            $sub_total = $row_price['product_price'] * $p_qty;
            $total += $sub_total;
        }
    }

    echo "$" . $total;
}

//Update/Delete products from the cart

function updateCart(){
    global $con;

    if(isset($_POST['update'])){
        foreach($_POST['remove'] as $remove_id){
            $delete_product = "delete from cart where p_id='$remove_id'";
            $run_delete = mysqli_query($con,$delete_product);

            if($run_delete){
                echo "
                    <script>
                        window.open('cart.php','_self')
                    </script>
                ";
            }
        }
    }
}

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
                        <p class='price'>$ $pro_price</p>
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
                        <p class='price'>$ $pro_price</p>
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

//Fetch cart products

function getCartProducts(){
    global $db;

    $ip_add = getUserIP();
    $get_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_cart = mysqli_query($db, $get_cart);

    while($row_cart=mysqli_fetch_array($run_cart)){
        $p_id = $row_cart['p_id'];
        $p_size = $row_cart['size'];
        $p_qty = $row_cart['qty'];

        $get_products = "SELECT * FROM products WHERE product_id='$p_id'";
        $run_products = mysqli_query($db, $get_products);

        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_img1 = $row_products['product_img1'];
            $pro_price = $row_products['product_price'];
            $sub_total = $row_products['product_price'] * $p_qty;
        }

        echo "
            <tbody>
                <tr>
                    <td>
                        <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                    </td>
                    <td>
                        <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                    </td>
                    <td>$p_qty</td>
                    <td>$ $pro_price</td>
                    <td>$p_size</td>
                    <td>
                        <input type='checkbox' name='remove[]' value='$pro_id'>
                    </td>
                    <td>$ $sub_total</td>
                </tr>
            </tbody>
        ";
    }
}

//Fetch product suggestions

function getSuggestions(){
    global $db;

    $get_products = "SELECT * FROM products ORDER BY rand() DESC LIMIT 0,3";
    $run_products = mysqli_query($db, $get_products);

    while($row_products=mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];

        echo "
        <div class='col-md-3 col-sm-6 center-responsive'>
            <div class='product same-height'>
                <a href='details.php?pro_id=$pro_id'>
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='Image'>
                </a>
                <div class='text'>
                    <h3><a href='details.php?pro_id=$pro_id'></a>$pro_title</h3>
                    <p class='price'>$ $pro_price</p>
                </div>
            </div>
        </div>
        ";
    }
}

//Filter products by product category

function getFilterByPCat(){
    global $db;

    if(isset($_GET['p_cat'])){
        $p_cat_id = $_GET['p_cat'];
        $get_p_cats = "SELECT * FROM product_categories WHERE p_cat_id=$p_cat_id";
        $run_p_cat = mysqli_query($db, $get_p_cats);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];

        $get_products = "SELECT * FROM products WHERE p_cat_id=$p_cat_id";
        $run_products = mysqli_query($db, $get_products);
        $count = mysqli_num_rows($run_products);

        if($count == 0){
            echo "
                <div class='box'>
                    <h1>No Products To Show</h1>
                </div>
            ";
        }else{
            echo "
                <div class='box'>
                    <h1>$p_cat_title</h1>
                    <p>$p_cat_desc</p>
                </div> 
            ";
        }

        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];

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
                            <p class='price'>$ $pro_price</p>
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
}

// Filter product by category

function getFilterByCat(){
    global $db;

    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $get_cat_id ="SELECT * FROM categories WHERE cat_id=$cat_id";
        $run_cats = mysqli_query($db, $get_cat_id);
        $row_cats = mysqli_fetch_array($run_cats);
        $cat_title = $row_cats['cat_title'];
        $cat_desc = $row_cats['cat_desc'];

        $get_products = "SELECT * FROM products WHERE cat_id=$cat_id";
        $run_products = mysqli_query($db, $get_products);
        $count = mysqli_num_rows($run_products);

        if($count == 0){
            echo "
                <div class='box'>
                    <h1>No Products To Show</h1>
                </div>
            ";
        }else{
            echo "
                <div class='box'>
                    <h1>$cat_title</h1>
                    <p>$cat_desc</h1>
                </div>
            ";
        }

        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];

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
                            <p class='price'>$ $pro_price</p>
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
}

// Paginator

function getPaginator(){
    global $db;
    $per_page = 6;

    $query = "SELECT * FROM products";
    $result = mysqli_query($db, $query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records/$per_page);

    echo "
        <li>
            <a href='shop.php?page=1'>First Page</a>
        </li>
    ";

    $i = 1;

    for($i; $i<=$total_pages; $i++){
        echo "
            <li>
                <a href='shop.php?page=$i'>$i</a>
            </li>
        ";
    }

    echo "
        <li>
            <a href='shop.php?page=$total_pages'>Last Page</a>
        </li>
    ";
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

//Contact Form Submit functionality

function contactSubmit(){
    if(isset($_POST['submit'])){
        $sender_name = $_POST['name'];
        $sender_email = $_POST['email'];
        $sender_subject = $_POST['subject'];
        $sender_message = $_POST['message'];

        $reciever_email = "manuel.urak88@gmail.com";

        mail($reciever_email, $sender_name, $sender_email, $sender_subject, $sender_message);

        $email = $_POST['email'];
        $subject = "Your Contact Request";
        $msg = "Hello $sender_name, we will answer do your contact request as soon as possible.";
        $from = "manuel.urak88@gmail.com";

        mail($email, $subject, $msg, $from);

        echo "
            <h2 align='center'>Your message has been sent successfully!</h2>
        ";
    }
}

//Register a new customer

function customerRegistration(){
    global $db;

    if(isset($_POST['register'])){
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_ip = getUserIP();

        move_uploaded_file($c_image_tmp, "./customer/customer_images/$c_image");

        $insert_customer = "INSERT INTO customers
            (
                customer_name,
                customer_email,
                customer_pass,
                customer_country,
                customer_city,
                customer_address,
                customer_image,
                customer_ip
                ) VALUES
            (
                '$c_name',
                '$c_email',
                '$c_pass',
                '$c_country',
                '$c_city',
                '$c_address',
                '$c_image',
                '$c_ip'
            )
        ";
        $run_customer = mysqli_query($db, $insert_customer);

        $select_cart = "SELECT * FROM cart WHERE ip_add='$c_ip'";
        $run_cart = mysqli_query($db, $select_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if($check_cart>0){

            //When the user already has something in the cart

            $_SESSION['customer_email'] = $c_email;

            echo "
                <script>
                    alert('Registration successfull!')
                    window.open('checkout.php', '_self')
                </script>
            ";
        }else{

            //When the user has nothing in the cart

            $_SESSION['customer_email'] = $c_email;

            echo "
                <script>
                    alert('Registration successfull!')
                    window.open('index.php', '_self')
                </script>
            ";
        }
    }
}

// Login functionality

function login(){
    global $db;

    if(isset($_POST['login'])){
        $customer_email = $_POST['c_email'];
        $customer_password = $_POST['c_pass'];
        $select_customer = "SELECT * FROM customers 
            WHERE customer_email='$customer_email' 
            AND customer_pass='$customer_password'
        ";
        $run_customer = mysqli_query($db, $select_customer);
        $get_ip = getUserIP();
        $check_customer = mysqli_num_rows($run_customer);
        $select_cart = "SELECT * FROM cart WHERE ip_add='$get_ip'";
        $run_cart = mysqli_query($db, $select_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if($check_customer==0){

            //Shows a message if the users login credentials are worng

            echo "
                <script>
                    alert('Login failed! Please check your Email and Password.')
                </script>
            ";
        }else if($check_customer==1 && $check_cart==0){

            //Redirects the user to the "My Account"-page if the user is successfully logged in and his cart is empty

            $_SESSION['customer_email'] = $customer_email;

            echo "
                <script>
                    alert('Successfully logged in!')
                    window.open('my_account.php?my_orders', '_self')
                </script>
            ";
        }else if($check_customer==1 && $check_cart>0){

            //Redirects the user to the cart if the user is successfully logged in and has something in his cart

            $_SESSION['customer_email'] = $customer_email;

            echo "
                <script>
                    alert('Successfully logged in!')
                    window.open('cart.php', '_self')
                </script>
            ";
        }
    }
}

?>