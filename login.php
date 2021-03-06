<?php

//A variable that declares on what page we're on

$page = "login";

//Header and navbar

include("includes/header.php");
include("includes/navigation.php");

?>
<div id="content">
    <div class="container">

        <!-- Breadcrumbs -->

        <?php 
        
            include("includes/breadcrumbs.php");
        
        ?>
        <div class="col-md-3">

            <!-- Sidebar -->

            <?php 
            
                include("includes/sidebar.php");
            
            ?>
        </div>

        <!-- Redirects the user to the homepage if he is already logged in and tries to access this page -->

        <?php 
        
        if(isset($_SESSION['customer_email'])){
            echo "
                <script>
                    window.open('index.php', '_self')
                </script>
            ";
        }
        
        ?>

        <!-- Login Page -->

        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h1>Login</h1>
                        <p class="lead">Already have an account...? Then just login below.</p>
                        <p class="muted">If you don't have an account you can register <a href="costumer_register">here</a>.</p>
                    </center>
                </div>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="c_email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="c_pass" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button name="login" value="Login" class="btn btn-primary">
                            <i class="fa fa-sign-in"></i> Login
                        </button>
                    </div>
                </form>
            </div>

            <!-- Login functionality -->

            <?php login(); ?>
        </div>
    </div>
</div>

<!-- Footer -->

<?php 

    include("includes/footer.php");

?>