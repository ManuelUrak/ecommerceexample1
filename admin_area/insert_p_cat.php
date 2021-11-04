<!-- Admin breadcrumbs --> 

<?php include("admin_area/includes/admin_breadcrumbs.php"); ?>

<!-- Insert product category page --> 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Insert Product Category
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Product Category Title</label>
                        <div class="col-md-6">
                            <input name="p_cat_title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Product Category Describtion</label>
                        <div class="col-md-6">
                            <textarea name="p_cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Add Product Category" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Function that inserts a new product category into the database --> 

<?php insertPCat(); ?>