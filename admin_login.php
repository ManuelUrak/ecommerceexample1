<?php 

//Header

include("includes/header.php");

?>

<!-- Admin Login Page -->

<div class="container">
    <form action="" class="form-login" method="post">
        <h2 class="form-login-heading">Admin Login</h2>
        <input type="email" name="admin_email" placeholder="Email" class="form-control" required>
        <input type="password" name="admin_pass" placeholder="Password" class="form-control" required>
        <button type="submit" name="admin_login" class="btn btn-primary btn-lg btn-block">Login</button>
    </form>
</div>

<?php

//Admin login functionality

adminLogin();

//Footer

include("admin_area/includes/admin_footer.php");

?>