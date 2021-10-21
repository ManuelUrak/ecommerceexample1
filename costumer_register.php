<!-- Header and Navbar -->

<?php

    $page = "register";

    include("includes/header.php");
    include("includes/navigation.php")

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

        <!-- Costumer Registration Page -->

        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Sign Up</h2>
                        <p class="text-muted">
                            You will recieve a confirmation via E-Mail after signing up.
                        </p>
                    </center>
                    <form action="costumer_register.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input class="form-control" type="text" name="c_name" required>
                        </div>
                        <div class="form-group">
                            <label>Your Email</label>
                            <input class="form-control" type="email" name="c_email" required>
                        </div>
                        <div class="form-group">
                            <label>Your Password</label>
                            <input class="form-control" type="password" name="c_pass" required>
                        </div>
                        <div class="form-group">
                            <label>Your Country</label>
                            <input class="form-control" type="text" name="c_country" required>
                        </div>
                        <div class="form-group">
                            <label>Your City/Zipcode</label>
                            <input class="form-control" type="text" name="c_city" required>
                        </div>
                        <div class="form-group">
                            <label>Your Address</label>
                            <input class="form-control" type="text" name="c_address" required>
                        </div>
                        <div class="form-group">
                            <label>Your Profile Picture (optional)</label>
                            <input class="form-control form-height-costum" type="file" name="c_picture">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Sign Up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<?php 

    include("includes/footer.php");

?>