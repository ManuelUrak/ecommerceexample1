<?php 

//Get actual user data

$session = $_SESSION['customer_email'];

$get_customer = "SELECT * FROM customers WHERE customer_email='$session'";
$run_customer = mysqli_query($con, $get_customer);
$row_customer = mysqli_fetch_array($run_customer);

$customer_name = $row_customer['customer_name'];
$customer_email = $row_customer['customer_email'];
$customer_country = $row_customer['customer_country'];
$customer_city = $row_customer['customer_city'];
$customer_address = $row_customer['customer_address'];
$customer_image = $row_customer['customer_image'];

?>

<!-- Edit Account Page -->

<h1 align="center">Edit Your Account</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Your Name:</label>
        <input class="form-control" type="text" name="c_name" value="<?php echo $customer_name; ?>" required>
    </div>
    <div class="form-group">
        <label>Your Email:</label>
        <input class="form-control" type="email" name="c_email" value="<?php echo $customer_email; ?>" required>
    </div>
    <div class="form-group">
        <label>Your Country:</label>
        <input class="form-control" type="text" name="c_country" value="<?php echo $customer_country; ?>" required>
    </div>
    <div class="form-group">
        <label>Your City/Zipcode:</label>
        <input class="form-control" type="text" name="c_city" value="<?php echo $customer_city; ?>" required>
    </div>
    <div class="form-group">
        <label>Your Address:</label>
        <input class="form-control" type="text" name="c_address" value="<?php echo $customer_address; ?>" required>
    </div>
    <div class="form-group">
        <label>Profile Image:</label>
        <input class="form-control form-height-costum" type="file" name="c_image" value="<?php echo $customer_image; ?>">
        <img src="customer/customer_images/<?php echo $customer_image; ?>" alt="Image" class="img-responsive">
    </div>
    <div class="text-center">
        <button name="update" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Update Profile
        </button>
    </div>
</form>

<!-- Edit account functionality -->

<?php editAccount(); ?>