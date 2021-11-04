<!-- Admin breadcrumbs --> 

<?php 

include("admin_area/includes/admin_breadcrumbs.php");

//Get product category from the database

if(isset($_GET['edit_p_cats'])){
    $p_cat_id = $_GET['edit_p_cats'];

    $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_cat_title'];
    $p_cat_desc = $row_p_cat['p_cat_desc'];
}

?>

<!-- Edit product category page --> 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Product Category
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Product Category Title</label>
                        <div class="col-md-6">
                            <input value="<?php echo $p_cat_title; ?>" name="p_cat_title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Product Category Describtion</label>
                        <div class="col-md-6">
                            <textarea name="p_cat_desc" id="" cols="30" rows="10" class="form-control">
                                <?php echo $p_cat_desc; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                            <input type="submit" name="edit" value="Edit Product Category" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Function that updates the product category --> 

<?php updatePCat(); ?>