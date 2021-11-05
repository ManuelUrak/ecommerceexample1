<!-- Admin Breadcrumbs --> 

<?php include("admin_area/includes/admin_breadcrumbs.php"); ?>

<!-- View slide images page -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> View Slide Images
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Slide Image</th>
                                <th>Delete Slide Image</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Function that fetches the slides from the database --> 

                            <?php getSlidesAdmin(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>