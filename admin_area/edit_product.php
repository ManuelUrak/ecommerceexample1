<?php

//Get the product from the database by id

if(isset($_GET['edit_product'])){
    $edit_id = $_GET['edit_product'];

    $get_product = "SELECT * FROM products WHERE product_id='$edit_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);

    $product_title = $row_product['product_title'];
    $product_img1 = $row_product['product_img1'];
    $product_img2 = $row_product['product_img2'];
    $product_img3 = $row_product['product_img3'];
    $product_price = $row_product['product_price'];
    $product_keys = $row_product['product_keywords'];
    $product_desc = $row_product['product_desc'];
    $p_cat = $row_product['p_cat_id'];
    $cat = $row_product['cat_id'];

    $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_cat_title'];

    $get_cat = "SELECT * FROM categories WHERE cat_id='$cat'";
    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);

    $cat_title = $row_cat['cat_title'];
}

?>

<!-- Edit product page -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Edit Product</h3>
            </div>
            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Title</label>
                        <div class="col-md-6">
                            <input value="<?php echo $product_title; ?>" type="text" class="form-control" name="product_title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Categories</label>
                        <div class="col-md-6">
                            <select name="product_cat" class="form-control">
                                <option value="<?php echo $p_cat; ?>"><?php echo $p_cat_title; ?></option>
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
                                <option value="<?php echo $cat; ?>"><?php echo $cat_title; ?></option>
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
                            <input type="file" class="form-control" name="product_img1">
                            <br>
                            <img src="admin_area/product_images/<?php echo $product_img1; ?>" width="70" height="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image 2</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="product_img2">
                            <br>
                            <img src="admin_area/product_images/<?php echo $product_img2; ?>" width="70" height="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image 3</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="product_img3">
                            <br>
                            <img src="admin_area/product_images/<?php echo $product_img3; ?>" width="70" height="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Price</label>
                        <div class="col-md-6">
                            <input value="<?php echo $product_price; ?>" type="text" class="form-control" name="product_price" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Keywords</label>
                        <div class="col-md-6">
                            <input value="<?php echo $product_keys; ?>" type="text" class="form-control" name="product_keywords" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Describtion</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="product_desc" cols="19" rows="6" required>
                                <?php echo $product_desc; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="edit" value="Edit Product" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Initialize Tinymce Plug In -->

<script src="admin_area/js/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea'});</script>

<!--Edit product functionality --> 

<?php updateProduct(); ?>
