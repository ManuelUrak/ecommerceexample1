<?php

//Upload data from the page to the database

include("functions/insert_products_function.php");

?>

    <!-- Admin Breadcrumbs -->

    <?php 
    
    include("includes/admin_breadcrumbs.php");
    
    ?>

    <!-- Insert Products Page -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Insert Products</h3>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Categories</label>
                            <div class="col-md-6">
                                <select name="product_cat" class="form-control">
                                    <option>Select a product category...</option>
                                    <?php 
                                    
                                    $get_p_cats = "SELECT * FROM product_categories";
                                    $run_p_cats = mysqli_query($con, $get_p_cats);

                                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                        $p_cat_id = $row_p_cats['p_cat_id'];
                                        $p_cat_title = $row_p_cats['p_cat_title'];

                                        echo "
                                            <option value='$p_cat_id'>$p_cat_title</option>
                                        ";
                                    }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Categories</label>
                            <div class="col-md-6">
                                <select name="cat" class="form-control">
                                    <option>Select a category...</option>
                                    <?php 
                                    
                                    $get_cats = "SELECT * FROM categories";
                                    $run_cats = mysqli_query($con, $get_cats);

                                    while($row_cats=mysqli_fetch_array($run_cats)){
                                        $cat_id = $row_cats['cat_id'];
                                        $cat_title = $row_cats['cat_title'];

                                        echo "
                                            <option value='$cat_id'>$cat_title</option>
                                        ";
                                    }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 1</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img1" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 2</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 3</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Price</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_price" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Keywords</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_keywords" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Describtion</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="product_desc" cols="19" rows="6" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>