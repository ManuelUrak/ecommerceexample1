<!-- Admin breadcrumbs --> 

<?php include("admin_area/includes/admin_breadcrumbs.php"); ?>

<!-- Category page --> 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags fa-fw"></i> Categories
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                               <th>Category ID</th>
                               <th>Category Title</th>
                               <th>Category Describtion</th>
                               <th>Edit Category</th>
                               <th>Delete Category</th>     
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Function that fetches the categories from the database into the page --> 

                            <?php getCatsAdmin(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>