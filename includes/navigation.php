<body>

    <!-- Top Menu -->

    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php 
                    
                        if(!isset($_SESSION['customer_email'])){
                            echo "Welcome Guest";
                        }else{
                            echo "Welcome " . $_SESSION['customer_email'] . "";
                        }
                    
                    ?>
                </a>
                <a href="cart.php"><?php totalItems(); ?> Items In Your Cart, Total Price: <?php totalPrice(); ?></a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <?php 
                    
                        if(!isset($_SESSION['customer_email'])){
                            echo "
                                <li>
                                    <a href='costumer_register.php'>Register</a>
                                </li>
                            ";
                        }else{
                            echo "
                                <li>
                                    <a href='my_account.php'>My Account</a>
                                </li>
                            ";
                        }
                    
                    ?>
                    <li>
                        <a href="cart.php">Cart</a>
                    </li>
                    <li>
                        <?php 
                        
                            if(!isset($_SESSION['customer_email'])){
                                echo "
                                    <a href='login.php'>Login</a>
                                ";
                            }else{
                                echo "
                                    <a href='logout.php'>Logout</a>
                                ";
                            }
                        
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Menu -->

    <div id="navbar" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="images/ecom-store-logo.png" alt="M-Dev-Store Logo" class="hidden-xs">
                    <img src="images/ecom-store-logo-mobile.png" alt="M-Dev-Store Logo" class="visible-xs">
                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                        <li class="<?php if($page=="home"){echo "active";} ?>">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="<?php if($page=="shop"){echo "active";} ?>">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="<?php if($page=="account"){echo "active";} ?>">
                            <?php 
                            
                            if(!isset($_SESSION['customer_email'])){
                                echo "
                                    <a href='login.php'>My Account</a>
                                ";
                            }else{
                                echo "
                                    <a href='my_account.php'>My Account</a>
                                ";
                            }
                            
                            ?>
                        </li>
                        <li class="<?php if($page=="cart"){echo "active";} ?>">
                            <a href="cart.php">Cart</a>
                        </li>
                        <li class="<?php if($page=="contact"){echo "active";} ?>">
                            <a href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <!--Shopping Cart -->

                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php totalItems(); ?> Items In Your Cart</span>
                </a>

                <!-- Search Toggle On Mobile View -->

                <div class="navbar-collapse collapse right">
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i> 
                    </button>  
                </div>

                <!-- Search Toggle On Desktop -->

                <div class="collapse clearfix" id="search">
                    <form action="results.php" method="get" class="navbar-form">
                        <div class="input-group">
                            <input type="text" class="form-control" name="user_query" placeholder="Search" required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" value="Search" name="search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>