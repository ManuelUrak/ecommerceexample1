<!-- Change password page -->

<h1 align="center">Change Your Password</h1>
<form action="" method="post">
    <div class="form-group">
        <label>Old Password:</label>
        <input class="form-control" type="password" name="old_pass" required>
    </div>
    <div class="form-group">
        <label>New Password:</label>
        <input class="form-control" type="password" name="new_pass" required>
    </div>
    <div class="form-group">
        <label>Confirm New Password:</label>
        <input class="form-control" type="password" name="new_pass_again" required>
    </div>
    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Update Password
        </button>
    </div>
</form>

<!-- Change password functionality -->

<?php changePass(); ?>