<?php

//Header

include("includes/header.php");

//Redirects the user to the admin login page if he's not logged in as an admin

if(!isset($_SESSION['admin_email'])){
    echo "
        <script>
            alert('You need to log in as an admin to access this page!');
            window.open('admin_login.php', '_self');
        </script>
    ";
}

//Admin dashboard counter functionality

$get_products = "SELECT * FROM products";
$run_products = mysqli_query($con, $get_products);
$count_products = mysqli_num_rows($run_products);

$get_customers = "SELECT * FROM customers";
$run_customers = mysqli_query($con, $get_customers);
$count_customers = mysqli_num_rows($run_customers);

$get_p_cats = "SELECT * FROM product_categories";
$run_p_cats = mysqli_query($con, $get_p_cats);
$count_p_cats = mysqli_num_rows($run_p_cats);

$get_p_orders = "SELECT * FROM pending_orders";
$run_p_orders = mysqli_query($con, $get_p_orders);
$count_p_orders = mysqli_num_rows($run_p_orders);

?>

<!-- Admin Page -->

<div id="wrapper">
    <?php

        //Navbar
    
        include("admin_area/includes/admin_sidebar.php");
    
    ?>
    <div id="page-wrapper">
        <div class="container-fluid site-container">
            <?php 
            
            switch($_GET){
                case isset($_GET['dashboard']):
                    include("admin_area/dashboard.php");
                    break;
                case isset($_GET['insert_products']):
                    include("admin_area/insert_products.php");
                    break;
                case isset($_GET['view_products']):
                    include("admin_area/view_products.php");
                    break;
                case isset($_GET['delete_product']):
                    include("admin_area/delete_product.php");
                    break;
                case isset($_GET['edit_product']):
                    include("admin_area/edit_product.php");
                    break;
            }
            
            ?>
        </div>
    </div>
</div>

<?php

//Footer

include("admin_area/includes/admin_footer.php");

?>