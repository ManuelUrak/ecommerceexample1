<?php 

//Admin breadcrumbs

include("admin_area/includes/admin_breadcrumbs.php");

//Get admin functionality

if(isset($_GET['edit_users'])){
    $admin_id = $_GET['edit_users'];

    $get_admin = "SELECT * FROM admins WHERE admin_id='$admin_id'";
    $run_admin = mysqli_query($con, $get_admin);
    $row_admin = mysqli_fetch_array($run_admin);

    $admin_name = $row_admin['admin_name'];
    $admin_email = $row_admin['admin_email'];
    $admin_pass = $row_admin['admin_pass'];
}

?>

<!-- Edit admin page --> 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Admin Page
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Admin Name</label>
                        <div class="col-md-6">
                            <input name="admin_name" type="text" class="form-control" value="<?php echo $admin_name;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Admin Email</label>
                        <div class="col-md-6">
                            <input name="admin_email" type="email" class="form-control" value="<?php echo $admin_email;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">New Password</label>
                        <div class="col-md-6">
                            <input name="new_pass" type="password" class="form-control" value="<?php echo $admin_pass;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Confirm New Password</label>
                        <div class="col-md-6">
                            <input name="new_pass_confirm" type="password" class="form-control" value="<?php echo $admin_pass;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Edit User" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Function that updates the admin -->

<?php editAdmin(); ?>

