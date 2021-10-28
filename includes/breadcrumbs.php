<!-- Breadcrumbs Component -->

<div class="col-md-12">
    <ul class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <?php
            
            switch($page){
                case $page == "shop":
                    echo 'Shop';
                    break;
                case $page == "contact":
                    echo 'Contact';
                    break;
                case $page == "cart":
                    echo 'Cart';
                    break;
                case $page == "register":
                    echo 'Register';
                    break;
                case $page == "account":
                    echo 'My Account';
                    break;
                case $page == "login":
                    echo 'Login';
                    break;
                case $page == "checkout":
                    echo 'Checkout';
                    break;
            }
            
            ?>
        </li>
    </ul>
</div>