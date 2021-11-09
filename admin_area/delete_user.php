<?php 

//Delete admin from the database by id

if(isset($_GET['delete_user'])){
    $delete_id = $_GET['delete_user'];

    $delete = "DELETE FROM admins WHERE admin_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete);

    if($run_delete){
        echo "
            <script>
                alert('User deleted successfully!');
                window.open('admin.php?view_users', '_self');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Failed to delete user...');
            </script>
        ";
    }
}

?>