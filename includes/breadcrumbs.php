<!-- Breadcrumbs Component -->

<div class="col-md-12">
    <ul class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <?php 
            
            if($page == "shop"){
                echo 'Shop';
            }
            else if($page == "contact"){
                echo 'Contact';
            }
            else if($page == "cart"){
                echo 'Cart';
            }
            else if($page == "register"){
                echo 'Register';
            }
            else if($page == "account"){
                echo 'My Account';
            }
            
            ?>
        </li>
    </ul>
</div>