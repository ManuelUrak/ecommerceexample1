<?php

    //Variable that tells us on which page we're on

    $page = "confirm";

    //Header and navbar

    include("includes/header.php");
    include("includes/navigation.php");

    //Redirects the user to the login page if he's not already logged in

    if(!isset($_SESSION['customer_email'])){
        echo "
            <script>
                window.open('login.php', '_self')
            </script>
        ";
    }

    //Get the order id

    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
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
            
                include("includes/account_sidebar.php");
            
            ?>
        </div>
        
        <!-- Confirm Page -->

        <div class="col-md-9">
            <div class="box">
                <h1 align="center">Pleas Confirm Your Payment</h1>
                <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label> Invoice No: </label>
                        <input class="form-control" type="text" name="invoice_no" required>
                    </div>
                    <div class="form-group">
                        <label> Amount Sent: </label>
                        <input class="form-control" type="text" name="amount_sent" required>
                    </div>
                    <div class="form-group">
                        <label> Payment Method: </label>
                        <select name="payment_mode" class="form-control">
                            <option>Select Payment Method</option>
                            <option>Debitcard</option>
                            <option>Western Union</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Transaction/Reference ID </label>
                        <input class="form-control" type="text" name="ref_no" required>
                    </div>
                    <div class="form-group">
                        <label> Code </label>
                        <input class="form-control" type="text" name="code" required>
                    </div>
                    <div class="form-group">
                        <label> Payment Date </label>
                        <input class="form-control" type="date" name="date" required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-lg" name="confirm_payment">
                            <i class="fa fa-user-md"></i> Confirm Payment
                        </button>
                    </div>
                </form>

                <!-- Confirm payment functionality -->

                <?php confirmPayment(); ?>
            </div>
        </div>    
    </div>
</div>

<!-- Footer -->

<?php 

    include("includes/footer.php");

?>