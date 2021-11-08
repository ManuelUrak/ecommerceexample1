<?php 

//Delete a customer from the databse by ID

if(isset($_GET['delete_customer'])){
    $delete_id = $_GET['delete_customer'];

    $delete = "DELETE FROM customers WHERE customer_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete);

    if($run_delete){
        echo "
            <script>
                alert('Customer successfully deleted!');
                window.open('admin.php?view_customers', '_self');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Couldn't delete customer...');
            </script>
        ";
    }
}

?>