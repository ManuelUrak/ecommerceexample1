<!-- Admin Breadcrumbs -->

<?php 

include("includes/admin_breadcrumbs.php");

?>

<!-- View Customers Page -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> View Customers
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Delete Customer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- A function that fetches the customers from the database --> 

                            <?php getCustomers(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>