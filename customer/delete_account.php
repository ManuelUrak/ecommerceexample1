<!-- Delete account page -->

<center>
    <h1>Do you really want to delete your account?</h1>
    <form action="my_account.php?delete_account" method="post">
        <input type="submit" name="Yes" value="Yes, I want to delete my account" class="btn btn-danger">
        <input type="submit" name="No" value="No" class="btn btn-primary">
    </form>
</center>

<!-- Delete account functionality -->

<?php deleteAccount(); ?>