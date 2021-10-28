<?php

    //Variable that declares on which page we're on

    $page = "checkout";

    //Header and navbar

    include("includes/header.php");
    include("includes/navigation.php");

    //Redirects the user to the login page if he's not already logged in

    if(!isset($_SESSION['customer_email'])){
        echo "
            <script>
                alert('You need to log in first!')
                window.open('login.php', '_self')
            </script>
        ";
    }

?>
<div id="content">
    <div class="container">

        <!-- Breadcrumbs -->

        <?php 
        
            include("includes/breadcrumbs.php");
        
        ?>
        <div class="col-md-3">

            <!-- Sidebar -->

            <?php 
            
                include("includes/sidebar.php");
            
            ?>
        </div>

        <!-- Checkout Page -->

        <div class="col-md-9">
            <div class="box">
                <?php
                
                    //Get the customer ID
                
                    $customer_email = $_SESSION['customer_email'];
                    $select_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";
                    $run_customer = mysqli_query($con, $select_customer);
                    $row_customer = mysqli_fetch_array($run_customer);
                    $customer_id = $row_customer['customer_id'];


                ?>
                <h1 class="text-center">Choose A Payment Method</h1>  
                <p class="lead text-center">
                    <a href="order.php?c_id=<?php echo "$customer_id"; ?>"> Offline Payment </a>
                </p>
                <center>
                    <p class="lead">
                        <a href="#">
                            <img class="img-responsive" src="images/paypal.jpg">
                        </a>
                    </p>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<?php 

include("includes/footer.php");

?>