<?php 

//Delete order from the database by id

if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];

    $delete = "DELETE FROM pending_orders WHERE order_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete);

    if($run_delete){
        echo "
            <script>
                alert('Order has been deleted successfully!');
                window.open('admin.php?view_orders', '_self');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Order couldn't be deleted...');
            </script>
        ";
    }
}

?>