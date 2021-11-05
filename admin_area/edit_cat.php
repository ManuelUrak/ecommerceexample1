<!-- Admin breadcrumbs --> 

<?php 

include("admin_area/includes/admin_breadcrumbs.php");

//Get the category by id

if(isset($_GET['edit_cat'])){
    $cat_id = $_GET['edit_cat'];

    $get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";
    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);

    $cat_title = $row_cat['cat_title'];
    $cat_desc = $row_cat['cat_desc'];
}else{
    echo "
        <script>
            alert('Something went wrong! Can't access category...');
            window.open('admin.php?view_cats', '_self');
        </script>
    ";
}

?>

<!-- Edit category page --> 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Category
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Category Title</label>
                        <div class="col-md-6">
                            <input value="<?php echo $cat_title; ?>" name="cat_title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Category Describtion</label>
                        <div class="col-md-6">
                            <textarea name="cat_desc" id="" cols="30" rows="10" class="form-control">
                                <?php echo $cat_desc; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                            <input type="submit" name="edit" value="Add Category" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Function that saves the changes to the database --> 

<?php updateCat(); ?>