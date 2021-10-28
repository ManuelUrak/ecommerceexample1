<?php

    //Variable that points out on which page we're on

    $page = "cart";

    //Header and Navbar

    include("includes/header.php");
    include("includes/navigation.php");

?>

<div id="content">
    <div class="container">

        <!-- Breadcrumbs -->

        <?php 
        
            include("includes/breadcrumbs.php");
        
        ?>

        <!-- Shopping Cart Page -->

        <div id="cart" class="col-md-9">
            <div class="box">
                <form action="cart.php" method="post" enctype="multipart/form-data">
                    <h1>Shopping Cart</h1>
                    <p class="text-muted">You currently have <?php echo totalItems(); ?> item(s) in your cart</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Price per unit</th>
                                    <th>Size</th>
                                    <th colspan="1">Delete</th>
                                    <th colspan="2">Sub-Total</th>
                                </tr>
                            </thead>
                            <?php getCartProducts(); ?>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th colspan="2"><?php totalPrice(); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="shop.php" class="btn btn-default">
                                <i class="fa fa-chevron-left"></i> Continue Shopping
                            </a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                <i class="fa fa-refresh"></i> Update Cart
                            </button>
                            <a href=<?php checkout(); ?> class="btn btn-primary">
                                Buy <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            
            updateCart();

            echo @$up_cart = updateCart();
           
            ?>

            <!-- Suggested Products -->

            <?php 
            
                include("includes/suggestions.php");
            
            ?>
        </div>

        <!-- Order Summary -->

        <div class="col-md-3">
            <div id="order-summary" class="box">
                <div class="box-header">
                    <h3>Order Summary</h3>
                </div>
                <p class="text-muted">
                    Shipping costs are calculated based on the total value of your order.
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Sub-Total</td>
                                <th><?php totalPrice(); ?></th>
                            </tr>
                            <tr>
                                <td>Shipping Costs</td>
                                <td>$0</td>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <td><?php totalPrice(); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<?php 

    include("includes/footer.php");

?>