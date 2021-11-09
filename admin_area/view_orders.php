<!-- Admin Breadcrumbs -->

<?php 

include("includes/admin_breadcrumbs.php");

?>

<!-- View Orders Page -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> View Orders
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Email</th>
                                <th>Invoice No.</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- A function that fetches the orders from the database --> 

                            <?php fetchOrders(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>