<?php 

//Delete a category from the database by id

if(isset($_GET['delete_cat'])){
    $delete_id = $_GET['delete_cat'];

    $delete = "DELETE FROM categories WHERE cat_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete);

    if($run_delete){
        echo "
            <script>
                alert('Deleted category successfully!');
                window.open('admin.php?view_cats', '_self');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Couldn't delete category...');
            </script>
        ";
    }
}

?>