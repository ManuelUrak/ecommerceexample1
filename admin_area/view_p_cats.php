<!-- Admin breadcrumbs --> 

<?php include("admin_area/includes/admin_breadcrumbs.php"); ?>

<!-- Insert product category page --> 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags fa-fw"></i> Product Categories
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                               <th>Product Cat. ID</th>
                               <th>Product Cat. Title</th>
                               <th>Product Cat. Desc.</th>
                               <th>Edit Category</th>
                               <th>Delete Category</th>     
                            </tr>
                        </thead>
                        <tbody>
                            <?php getPcatsAdmin(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>