<!-- Admin breadcrumbs --> 

<?php include("admin_area/includes/admin_breadcrumbs.php"); ?>

<!-- Insert user page --> 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Insert User
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Name</label>
                        <div class="col-md-6">
                            <input name="admin_name" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Email</label>
                        <div class="col-md-6">
                            <input name="admin_email" type="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Password</label>
                        <div class="col-md-6">
                            <input name="admin_pass" type="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Confirm Password</label>
                        <div class="col-md-6">
                            <input name="confirm_pass" type="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                            <input type="submit" name="insert" value="Add User" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Function that inserts a new user into the database --> 

<?php insertAdmin(); ?>