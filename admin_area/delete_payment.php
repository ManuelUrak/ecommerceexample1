<?php 

if(isset($_GET['delete_payment'])){
    $delete_id = $_GET['delete_payment'];

    $delete = "DELETE FROM payments WHERE payment_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete);

    if($run_delete){
        echo "
            <script>
                alert('Payment successfully deleted!');
                window.open('admin.php?view_payments', '_self');
            </script>
        ";
    }else{
        echo "
        <script>
            alert('Couldn't delete payment...');
        </script>
    "; 
    }
}

?>