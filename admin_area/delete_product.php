<?php 

if(isset($_GET['delete_product'])){
    $delete_id = $_GET['delete_product'];

    $delete_product = "DELETE FROM products WHERE product_id=?";
    $run_delete = $con->prepare($delete_product);
    $run_delete->bind_param('i', $delete_id);
    $run_delete->execute();

    echo "
        <script>
            alert('Product deleted successfully!');
            window.open('admin.php?view_products', '_self');
        </script>
    ";
}else{
    echo "
        <script>
            alert('Can't delete product!');
            window.open('admin.php?view_products', '_self');
        </script>
    ";
}

?>