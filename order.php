<?php 

//Header

include("includes/header.php");

//Redirects the user to the home page if he's not logged in

if(!isset($_SESSION['customer_email'])){
    echo "
        <script>
            window.open('index.php', '_self')
        </script>
    ";
}

//Get's the customer id

if(isset($_GET['c_id'])){
    $customer_id = $_GET['c_id'];
}

//Add the customer order to the database functionality

$ip_add = getUserIP();
$status = "pending";
$invoice_no = mt_rand();
$select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
$run_cart = mysqli_query($con, $select_cart);

while($row_cart=mysqli_fetch_array($run_cart)){
    $p_id = $row_cart['p_id'];
    $p_qty = $row_cart['qty'];
    $p_size = $row_cart['size'];

    $get_products = "SELECT * FROM products WHERE product_id='$p_id'";
    $run_products = mysqli_query($con, $get_products);

    while($row_products=mysqli_fetch_array($run_products)){
        $sub_total = $row_products['product_price'] * $p_qty;

        $insert_customer_order = "INSERT INTO customer_orders
            (
                customer_id,
                due_amount,
                invoice_no,
                qty,
                size,
                order_date,
                order_status
                ) VALUES 
                (
                    '$customer_id',
                    '$sub_total',
                    '$invoice_no',
                    '$p_qty',
                    '$p_size',
                    NOW(),
                    '$status'
                )
        ";
        $run_customer_order = mysqli_query($con, $insert_customer_order);

        $insert_pending_order = "INSERT INTO 
            pending_orders 
            (
                customer_id,
                invoice_no,
                product_id,
                qty,
                size,
                order_status
                ) VALUES 
                ('$customer_id',
                '$invoice_no',
                '$p_id',
                '$p_qty',
                '$p_size',
                '$status')
        ";
        $run_insert_pending_orders = mysqli_query($con, $insert_pending_order);

        $delete_cart = "DELETE FROM cart WHERE ip_add='$ip_add'";
        $run_delete = mysqli_query($con, $delete_cart);

        echo "
                <script>
                    alert('Your order has been submitted!')
                    window.open('my_account.php?my_orders', '_self')
                </script>
        ";

    }
}

?>