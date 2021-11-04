<!-- Admin Breadcrumbs -->

<?php 

include("includes/admin_breadcrumbs.php");

?>

<!-- View Products Page -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> View Products
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Sold</th>
                                <th>Keywords</th>
                                <th>Date</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Function that displays the products from the database -->

                            <?php viewProducts(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>