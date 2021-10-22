<?php 
//Connection to the database

include("../includes/db.php");

//Upload product data to the database

if(isset($_POST['submit'])){
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    //Move uploaded images to the folder

    move_uploaded_file($temp_name1, "./product_images/$product_img1");
    move_uploaded_file($temp_name2, "./product_images/$product_img2");
    move_uploaded_file($temp_name3, "./product_images/$product_img3");

    //SQL query statement

    $insert_product = "INSERT INTO products(
        p_cat_id,
        cat_id,
        date,
        product_title,
        product_img1,
        product_img2,
        product_img3,
        product_price,
        product_keywords,
        product_desc
    )
    VALUES(
        '$product_cat', 
        '$cat',
        'NOW()',
        '$product_title',
        '$product_img1',
        '$product_img2',
        '$product_img3',
        '$product_price',
        '$product_keywords',
        '$product_desc' 
    )
    
    ";

    $run_product = mysqli_query($con, $insert_product);

    //Toggle alerts and reload page

    if($run_product){
        echo "
            <script>
                alert('Product inserted successfully!');
                window.open('./insert_products.php', '_self');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Failed to insert product!');
            </script>
        ";
    }
}

?>