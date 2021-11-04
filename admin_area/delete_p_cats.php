<?php 

if(isset($_GET['delete_p_cats'])){
    $delete_id = $_GET['delete_p_cats'];

    $delete = "DELETE FROM product_categories WHERE p_cat_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete);

    if($run_delete){
        echo "
            <script>
                alert('Product category deleted successfully!');
                window.open('admin.php?view_p_cats', '_self');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Product category couldn't be deleted...');
            </script>
        ";
    }
}

?>