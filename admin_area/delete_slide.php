<?php 

//Delete slide image from the database by id

if(isset($_GET['delete_slide'])){
    $delete_id = $_GET['delete_slide'];

    $get_slide = "SELECT * FROM slider WHERE slide_id=$delete_id";
    $run_slide = mysqli_query($con, $get_slide);
    $row_slide = mysqli_fetch_array($run_slide);
    $slide_image = $row_slide['slide_image'];

    $file_pointer = "admin_area/slides_images/$slide_image";

    $delete = "DELETE FROM slider WHERE slide_id=$delete_id";
    $run_delete = mysqli_query($con, $delete);

    if($run_delete){
        unlink($file_pointer);

        echo "
            <script>
                alert('Slide image deleted successfully!');
                window.open('admin.php?view_slides', '_self');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Couldn't delete slide image...');
            </script>
        ";
    }
}

?>