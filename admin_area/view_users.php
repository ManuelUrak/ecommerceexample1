<!-- Admin Breadcrumbs -->

<?php 

include("includes/admin_breadcrumbs.php");

?>

<!-- View Users Page -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> View Users
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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Function that displays the products from the database -->

                            <?php getAdmins(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>