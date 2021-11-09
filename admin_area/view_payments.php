<!-- Admin Breadcrumbs -->

<?php 

include("includes/admin_breadcrumbs.php");

?>

<!-- View Payments Page -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> View Payments
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Invoice No.</th>
                                <th>Amount</th>
                                <th>Payment Mode</th>
                                <th>Reference No</th>
                                <th>Code</th>
                                <th>Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Function that displays the payments from the database -->

                            <?php getPayments(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>