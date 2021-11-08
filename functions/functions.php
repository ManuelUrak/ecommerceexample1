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
        $sql = "SELECT * FROM cart WHERE ip_add=? AND p_id=?";
        $run_check = $db->prepare($sql);
        $run_check->bind_param('si', $ip_add, $p_id);
        $run_check->execute();
        $result = $run_check->get_result();
        
        if(mysqli_num_rows($result)>0){
            echo "
                <script>
                    alert('This product has already been added to the cart')
                    window.open('details.php?pro_id=$p_id', '_self')
                </script>
            ";
        }else{
            $query = "INSERT INTO cart 
                (
                    p_id, 
                    ip_add, 
                    qty, 
                    size
                ) VALUES 
                (
                    '$p_id',
                    '$ip_add',
                    '$product_qty',
                    '$product_size'
                )
            ";
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
    $get_items = "SELECT * FROM cart WHERE ip_add=?";
    $run_items = $db->prepare($get_items);
    $run_items->bind_param('s', $ip_add);
    $run_items->execute();
    $result = $run_items->get_result();
    $count = mysqli_num_rows($result);

    echo "$count";
}

//Get total price from the cart

function totalPrice(){
    global $db;

    $ip_add = getUserIP();
    $total = 0;
    $select_cart = "SELECT * FROM cart WHERE ip_add=?";
    $run_cart = $db->prepare($select_cart);
    $run_cart->bind_param('s', $ip_add);
    $run_cart->execute();
    $result = $run_cart->get_result();

    while($record=mysqli_fetch_array($result)){
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
            $run_delete = mysqli_query($con, $delete_product);
            $page = "";

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

//Redirects user to the checkout page if the user got something in his cart

function checkout(){
    global $db;
    
    $ip_add = getUserIP();
    $query = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_query = mysqli_query($db, $query);
    $check_cart = mysqli_num_rows($run_query);

    if($check_cart>0){
        echo "checkout.php";
    }else{
        echo "#";
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
    $get_cart = "SELECT * FROM cart WHERE ip_add=?";
    $run_cart = $db->prepare($get_cart);
    $run_cart->bind_param('s', $ip_add);
    $run_cart->execute();
    $result = $run_cart->get_result();

    while($row_cart=mysqli_fetch_array($result)){
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
            WHERE customer_email=? 
            AND customer_pass=?
        ";
        $run_customer = $db->prepare($select_customer);
        $run_customer->bind_param('ss', $customer_email, $customer_password);
        $run_customer->execute();
        $result = $run_customer->get_result();
        $get_ip = getUserIP();
        $check_customer = mysqli_num_rows($result);
        $select_cart = "SELECT * FROM cart WHERE ip_add=?";
        $run_cart = $db->prepare($select_cart);
        $run_cart->bind_param('s', $get_ip);
        $run_cart->execute();
        $cart_result = $run_cart->get_result();
        $check_cart = mysqli_num_rows($cart_result);

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

//Fetch customer image and name to the account page

function getCustomerImgName(){
    global $db;

    $session = $_SESSION['customer_email'];
    $get_customer = "SELECT * FROM customers WHERE customer_email='$session'";
    $run_customer = mysqli_query($db, $get_customer);

    $row_customer=mysqli_fetch_array($run_customer);
    $customer_img = $row_customer['customer_image'];
    $customer_name = $row_customer['customer_name'];

    if(!empty($customer_img)){
        echo "
            <center>
                <img class='img-responsive' src='./customer/customer_images/$customer_img'>
            </center>
            <br>
            <h3 align='center' class='panel-title'>Name: $customer_name</h3>
        ";
    }else{
        echo "
            <center>
                <img class='img-responsive' src='./images/placeholder.png'>
            </center>
            <br>
            <h3 align='center' class='panel-title'>Name: $customer_name</h3>
        ";
    }
    
}

//Edit account functionality

function editAccount(){
    global $db;

    $session = $_SESSION['customer_email'];

    $get_customer = "SELECT * FROM customers WHERE customer_email='$session'";
    $run_customer = mysqli_query($db, $get_customer);

    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];

    if(isset($_POST['update'])){
        $update_id = $customer_id;
        $customer_name = $_POST['c_name'];
        $customer_email = $_POST['c_email'];
        $customer_country = $_POST['c_country'];
        $customer_city = $_POST['c_city'];
        $customer_address = $_POST['c_address'];
        $customer_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name']; 

        move_uploaded_file($c_image_tmp, "customer/customer_images/$customer_image");

        $update_customer = "UPDATE customers SET 
            customer_name='$customer_name',
            customer_email='$customer_email',
            customer_country='$customer_country',
            customer_city='$customer_city',
            customer_address='$customer_address',
            customer_image='$customer_image' 
            WHERE customer_id='$update_id' 
        ";
        $run_customer = mysqli_query($db, $update_customer);

        if($run_customer){
            echo "
                <script>
                    alert('Account successfully updated!')
                    window.open('my_account.php?edit_account', '_self')
                </script>
            ";
        }
    }
}

//Change password functionality

function changePass(){
    global $db;

    if(isset($_POST['submit'])){
        $session = $_SESSION['customer_email'];

        $old_password = $_POST['old_pass'];
        $new_password = $_POST['new_pass'];
        $confirm_password = $_POST['new_pass_again'];

        $get_customer = "SELECT * FROM customers WHERE customer_pass=?";
        $run_customer = $db->prepare($get_customer);
        $run_customer->bind_param('s', $old_password);
        $run_customer->execute();
        $result = $run_customer->get_result();
        $check_old_pass = mysqli_num_rows($result);

        if($check_old_pass==0){
            echo "
                <script>
                    alert('Your old password is wrong. Please try again!');
                    window.open('my_account.php?change_password', '_self');
                </script>
            ";
        }else if($new_password!=$confirm_password){
            echo "
                <script>
                    alert('Passwords did not match. Please try again!');
                    window.open('my_account.php?change_password', '_self');
                </script>
            ";
        }else if($old_password==$new_password){

            //TODO: For some reason this doesn't work

            echo "
                <script>
                    alert('New password isn't different from your old password. Please try again!');
                    window.open('my_account.php?change_password', '_self');
                </script>
            ";
        }

        $update_password = "UPDATE customers SET 
            customer_pass=?
            WHERE customer_email=?
        ";
        $run_password = $db->prepare($update_password);
        $run_password->bind_param('ss', $new_password, $session);
        $run_password->execute();
        $result_password = $run_password->get_result();

        if($result_password){

            //TODO: For some reason this echo doesn't work

            echo "
                <script>
                    alert('Password successfully updated!');
                    window.open('my_account.php?change_password', '_self');
                </script>
            ";
        }
    }
}

//Delete account functionality

function deleteAccount(){
    global $db;

    $session = $_SESSION['customer_email'];

    if(isset($_POST['Yes'])){
        $sql = "DELETE FROM customers WHERE customer_email=?";
        $run_delete = $db->prepare($sql);
        $run_delete->bind_param('s', $session);
        $run_delete->execute();

        if($run_delete){

            //TODO: For some reason this echo doesn't work

            echo "
                <script>
                    alert('Successfully deleted your account. Hope you're coming back soon!');
                    window.open('index.php', '_self');
                </script>
            ";
        }
    }else if(isset($_POST['No'])){
        echo "
            <script>
                alert('Glad you changed your mind!');
                window.open('my_account.php', '_self');
            </script>
        ";
    }
}

//Admin login functionality

function adminLogin(){
    global $db;

    if(isset($_POST['admin_login'])){
        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];

        $get_admin = "SELECT * FROM admins WHERE
            admin_email=? AND
            admin_pass=?
        ";
        $run_admin = $db->prepare($get_admin);
        $run_admin->bind_param('ss', $admin_email, $admin_pass);
        $run_admin->execute();
        $result = $run_admin->get_result();
        $count = mysqli_num_rows($result);

        if($count==1){
            $_SESSION['admin_email'] = $admin_email;

            echo "
                <script>
                    alert('Login successful!');
                    window.open('admin.php?dashboard', '_self');
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Login failed! Please check your credentials...');
                </script>
            ";
        }
    }
}

//Fetch orders to the my_orders page

function getOrders(){
    global $db;

    $session = $_SESSION['customer_email'];

    $query = "SELECT * FROM customers WHERE customer_email=?";
    $run_query = $db->prepare($query);
    $run_query->bind_param('s', $session);
    $run_query->execute();
    $result = $run_query->get_result();
    $row_customers = mysqli_fetch_array($result);
    $customer_id = $row_customers['customer_id'];

    $query_orders = "SELECT * FROM customer_orders WHERE customer_id=?";
    $run_orders = $db->prepare($query_orders);
    $run_orders->bind_param('i', $customer_id);
    $run_orders->execute();
    $order_result = $run_orders->get_result();

    $i=0;

    while($row_orders=mysqli_fetch_array($order_result)){
        $order_id = $row_orders['order_id'];
        $due_amount = $row_orders['due_amount'];
        $invoice_no = $row_orders['invoice_no'];
        $qty = $row_orders['qty'];
        $size = $row_orders['size'];
        $order_date = $row_orders['order_date'];
        $status = $row_orders['order_status'];

        $i++;

        if($status=="pending"){
            $status = "Unpaid";
        }else{
            $status = "Paid";
        }

        echo "
            <tbody>
                <tr>
                    <th> $i </th>
                    <td> $due_amount </td>
                    <td> $invoice_no </td>
                    <td> $qty </td>
                    <td> $size </td>
                    <td> $order_date </td>
                    <td> $status </td>
                    <td>
                        <a class='btn btn-primary btn-sm' target='_blank' href='./confirm.php?order_id=$order_id'>Confirm Payment</a>
                    </td>
                </tr>
            </tbody>
        ";
    }
}

//Confirm payments functionality

function confirmPayment(){
    global $db;

    if(isset($_POST['confirm_payment'])){
        $update_id = $_GET['update_id'];
        $invoice_no = $_POST['invoice_no'];
        $amount = $_POST['amount_sent'];
        $payment_mode = $_POST['payment_mode'];
        $ref_no = $_POST['ref_no'];
        $code = $_POST['code'];
        $payment_date = $_POST['date'];

        $complete = "Complete";

        $insert_payment = "INSERT INTO payments 
            (
                invoice_no,
                amount,
                payment_mode,
                ref_no,
                code,
                payment_date
            ) VALUES (
                '$invoice_no',
                '$amount',
                '$payment_mode',
                '$ref_no',
                '$code',
                '$payment_date')
        ";
        $run_payment = mysqli_query($db, $insert_payment);

        $update_customer_order = "UPDATE customer_orders 
            SET order_status='$complete'
            WHERE order_id='$update_id'        
        ";
        $run_customer_order = mysqli_query($db, $update_customer_order);

        $update_pending_order = "UPDATE pending_orders 
            SET order_status='$complete'
            WHERE order_id='$update_id'        
        ";
        $run_pending_orders = mysqli_query($db, $update_pending_order);
        
        if($run_pending_orders){
            echo "
                <script>
                    alert('Your order will be processed as soon as possible')
                    window.open('my_account.php?my_orders', '_self')
                </script>
            ";
        }
    }
}

//Fetch newest orders to the admin dashboard

function getNewOrders(){
    global $db;

    $i = 0;
    $get_orders = "SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0,4";
    $run_orders = mysqli_query($db, $get_orders);

    while($row_orders=mysqli_fetch_array($run_orders)){
        $order_id = $row_orders['order_id'];
        $customer_id = $row_orders['customer_id'];
        $invoice_no = $row_orders['invoice_no'];
        $product_id = $row_orders['product_id'];
        $qty = $row_orders['qty'];
        $size = $row_orders['size'];
        $order_status = $row_orders['order_status'];
        $i ++;

        $get_customer = "SELECT * FROM customers WHERE customer_id='$customer_id'";
        $run_customer = mysqli_query($db, $get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_email = $row_customer['customer_email'];

        echo "
            <tr>
                <td>$order_id</td>
                <td>$customer_email</td>
                <td>$invoice_no</td>
                <td>$product_id</td>
                <td>$qty</td>
                <td>$size</td>
        ";

        if($order_status=='pending'){
            echo "
                <td>Pending</td>
            ";
        }else{
            echo "
                <td>Complete</td>
            ";
        }

        echo "
            </tr>
        ";
    }
}

//Fetch products to the view-products page on the admin panel

function viewProducts(){
    global $db;

    $get_products = "SELECT * FROM products";
    $run_products = mysqli_query($db, $get_products);

    while($row_products=mysqli_fetch_array($run_products)){
        $product_id = $row_products['product_id'];
        $product_title = $row_products['product_title'];
        $product_img = $row_products['product_img1'];
        $product_price = $row_products['product_price'];
        $product_keys = $row_products['product_keywords'];
        $product_date = $row_products['date'];
        
        $get_sold = "SELECT * FROM pending_orders WHERE
            product_id='$product_id'
        ";
        $run_sold = mysqli_query($db, $get_sold);
        $count = mysqli_num_rows($run_sold);

        echo "
            <tr>
                <td>$product_id</td>
                <td>$product_title</td>
                <td>
                    <img src='admin_area/product_images/$product_img' width='60' height='60'>
                </td>
                <td>$product_price</td>
                <td>$count</td>
                <td>$product_keys</td>
                <td>$product_date</td>
                <td>
                    <a href='admin.php?delete_product=$product_id'>
                        <i class='fa fa-trash-o'></i> Delete
                    </a>
                </td>
                <td>
                    <a href='admin.php?edit_product=$product_id'>
                        <i class='fa fa-pencil'></i> Edit
                    </a>
                </td>
            </tr>
        ";
    }
}

//Update products

function updateProduct(){
    global $db;
    $update_id = $_GET['edit_product'];

    $get_product = "SELECT * FROM products WHERE product_id='$update_id'";
    $run_product = mysqli_query($db, $get_product);
    $row_product = mysqli_fetch_array($run_product);

    $p_img1 = $row_product['product_img1'];
    $p_img2 = $row_product['product_img2'];
    $p_img3 = $row_product['product_img3'];

    if(isset($_POST['edit'])){
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $cat = $_POST['cat'];
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];

        $product_img1 = $_FILES['product_img1']['name'];

        if(empty($product_img1)){
            $product_img1 = $p_img1;
        }

        $product_img2 = $_FILES['product_img2']['name'];

        if(empty($product_img2)){
            $product_img2 = $p_img2;
        }

        $product_img3 = $_FILES['product_img3']['name'];

        if(empty($product_img3)){
            $product_img3 = $p_img3;
        }
    
        $temp_name1 = $_FILES['product_img1']['tmp_name'];

        if(empty($temp_name1)){
            $temp_name1 = $p_img1;
        }

        $temp_name2 = $_FILES['product_img2']['tmp_name'];

        if(empty($temp_name2)){
            $temp_name2 = $p_img2;
        }

        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        if(empty($temp_name3)){
            $temp_name3 = $p_img3;
        }
    
        //Move uploaded images to the folder
    
        move_uploaded_file($temp_name1, "./product_images/$product_img1");
        move_uploaded_file($temp_name2, "./product_images/$product_img2");
        move_uploaded_file($temp_name3, "./product_images/$product_img3");
    
        //SQL query statement

        $update_product = "UPDATE products SET 
            p_cat_id='$product_cat',
            cat_id='$cat',
            date=NOW(),
            product_title='$product_title',
            product_img1='$product_img1',
            product_img2='$product_img2',
            product_img3='$product_img3',
            product_keywords='$product_keywords',
            product_desc='$product_desc',
            product_price='$product_price' 
            WHERE product_id='$update_id'
        ";
        $run_product = mysqli_query($db,$update_product);

        echo "
            <script>
                alert('Product updated successfully!');
                window.open('admin.php?view_products', '_self');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Can't update product...');
                window.open('admin.php?view_products', '_self');
            </script>
        ";
    }
}

//Insert product category

function insertPCat(){
    global $db;

    if(isset($_POST['submit'])){
        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];

        $insert_p_cat = "INSERT INTO product_categories 
            (
                p_cat_title,
                p_cat_desc
            )
            VALUES
            (
                '$p_cat_title',
                '$p_cat_desc'
            )
        ";
        $run_insert = mysqli_query($db, $insert_p_cat);

        if($run_insert){
            echo "
                <script>
                    alert('Product category has been inserted successfully!');
                    window.open('admin.php?insert_p_cat', '_self');
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Product category couldn't be inserted...');
                </script>
            ";
        }
    }
}

//Fetch product categories into the admin panel

function getPcatsAdmin(){
    global $db;

    $get_p_cats = "SELECT * FROM product_categories";
    $run_p_cats = mysqli_query($db, $get_p_cats);
    
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];
        $p_cat_desc = $row_p_cats['p_cat_desc'];

        echo "
            <tr>
                <td>$p_cat_id</td>
                <td>$p_cat_title</td>
                <td>$p_cat_desc</td>
                <td>
                    <a href='admin.php?edit_p_cats=$p_cat_id'>
                        <i class='fa fa-pencil'></i> Edit
                    </a>
                </td>
                <td>
                    <a href='admin.php?delete_p_cats=$p_cat_id'>
                        <i class='fa fa-trash-o'></i> Delete
                    </a>
                </td>
            </tr>
        ";
    }
}

//Edit product category

function updatePCat(){
    global $db;
    $update_id = $_GET['edit_p_cats'];

    if(isset($_POST['edit'])){
        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];

        $update = "UPDATE product_categories SET
            p_cat_title='$p_cat_title',
            p_cat_desc='$p_cat_desc'
            WHERE p_cat_id='$update_id'
        ";
        $run_update = mysqli_query($db, $update);

        if($run_update){
            echo "
                <script>
                    alert('Product category updated successfully!');
                    window.open('admin.php?view_p_cats', '_self')
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Product category could not be updated...');
                </script>
            ";
        }
    }
}

//Fetch categories to the admin panel

function getCatsAdmin(){
    global $db;

    $get_cats = "SELECT * FROM categories";
    $run_cats = mysqli_query($db, $get_cats);

    while($row_cats=mysqli_fetch_array($run_cats)){
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        $cat_desc = $row_cats['cat_desc'];

        echo "
            <tr>
                <td>$cat_id</td>
                <td>$cat_title</td>
                <td>$cat_desc</td>
                <td>
                    <a href='admin.php?edit_cat=$cat_id'>
                        <i class='fa fa-pencil'></i> Edit Category
                    </a>
                </td>
                <td>
                    <a href='admin.php?delete_cat=$cat_id'>
                        <i class='fa fa-trash-o'></i> Delete Category
                    </a>
                </td>
            </tr>
        ";
    }
}

//Insert a category

function insertCat(){
    global $db;

    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        $cat_desc = $_POST['cat_desc'];

        $insert = "INSERT INTO categories
            (
                cat_title,
                cat_desc
            )
            VALUES
            (
                '$cat_title',
                '$cat_desc'
            )
        ";
        $run_insert = mysqli_query($db, $insert);

        if($run_insert){
            echo "
                <script>
                    alert('Category inserted successfully!');
                    window.open('admin.php?view_cats', '_self');
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Category couldn't be inserted...');
                </script>
            ";
        }
    }
}

//Edit category

function updateCat(){
    global $db;
    $edit_id = $_GET['edit_cat'];

    if(isset($_POST['edit'])){
        $cat_title = $_POST['cat_title'];
        $cat_desc = $_POST['cat_desc'];

        $update = "UPDATE categories SET
            cat_title='$cat_title',
            cat_desc='$cat_desc'
            WHERE cat_id='$edit_id'
        ";
        $run_update = mysqli_query($db, $update);

        if($run_update){
            echo "
                <script>
                    alert('Updated category successfully!');
                    window.open('admin.php?view_cats', '_self');
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Couldn't update category...');
            </script>
        "; 
        }
    }
}

//Fetch slide images into the admin panel

function getSlidesAdmin(){
    global $db;

    $get_slides = "SELECT * FROM slider";
    $run_slides = mysqli_query($db, $get_slides);

    while($row_slides=mysqli_fetch_array($run_slides)){
        $slide_id = $row_slides['slide_id'];
        $slide_image = $row_slides['slide_image'];

        echo "
            <tr>
                <td>$slide_id</td>
                <td>
                    <img src='admin_area/slides_images/$slide_image' width='550' height='250'>
                </td>
                <td>
                    <a href='admin.php?delete_slide=$slide_id'>
                        <i class='fa fa-trash-o'></i> Delete Image
                    </a>
                </td>
            </tr
        ";
    }
}

//Upload slide image

function uploadSlide(){
    global $db;

    if(isset($_POST['upload'])){
        $slide_image = $_FILES['slide_image']['name'];
        $tmp_image = $_FILES['slide_image']['tmp_name'];

        move_uploaded_file($tmp_image, "admin_area/slides_images/$slide_image");

        $upload = "INSERT INTO slider (slide_image) VALUES ('$slide_image')";
        $run_upload = mysqli_query($db, $upload);

        if($run_upload){
            echo "
                <script>
                    alert('Slide image uploaded successfully!');
                    window.open('admin.php?insert_slide', '_self');
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Upload failed...');
                </script>
            ";
        }
    }
}

//Fetch customers to the admin panel

function getCustomers(){
    global $db;

    $get_customers = "SELECT * FROM customers";
    $run_customers = mysqli_query($db, $get_customers);

    while($row_customers=mysqli_fetch_array($run_customers)){
        $customer_id = $row_customers['customer_id'];
        $customer_name = $row_customers['customer_name'];
        $customer_email = $row_customers['customer_email'];
        $customer_country = $row_customers['customer_country'];
        $customer_city = $row_customers['customer_city'];
        $customer_address = $row_customers['customer_address'];

        echo "
            <tr>
                <td>$customer_id</td>
                <td>$customer_name</td>
                <td>$customer_email</td>
                <td>$customer_country</td>
                <td>$customer_city</td>
                <td>$customer_address</td>
                <td>
                    <a href='admin.php?delete_customer=$customer_id'>
                        <i class='fa fa-trash-o'></i> Delete Customer
                    </a>
                </td>
            </tr>
        ";
    }
}

?>