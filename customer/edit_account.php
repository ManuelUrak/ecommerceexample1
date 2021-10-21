<h1 align="center">Edit Your Account</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Your Name:</label>
        <input class="form-control" type="text" name="c_name" required>
    </div>
    <div class="form-group">
        <label>Your Email:</label>
        <input class="form-control" type="email" name="c_email" required>
    </div>
    <div class="form-group">
        <label>Your Country:</label>
        <input class="form-control" type="text" name="c_country" required>
    </div>
    <div class="form-group">
        <label>Your City/Zipcode:</label>
        <input class="form-control" type="text" name="c_city" required>
    </div>
    <div class="form-group">
        <label>Your Address:</label>
        <input class="form-control" type="text" name="c_address" required>
    </div>
    <div class="form-group">
        <label>Profile Image:</label>
        <input class="form-control form-height-costum" type="file" name="c_image">
        <img src="customer/customer_images/logo-mdev.png" alt="Image" class="img-responsive">
    </div>
    <div class="text-center">
        <button name="update" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Update Profile
        </button>
    </div>
</form>