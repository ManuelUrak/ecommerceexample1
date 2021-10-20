<?php 

    include("includes/header.php");
    include("includes/navigation.php")

?>
<div id="content">
    <div class="container">
        <?php 
        
            include("includes/breadcrumbs.php");
        
        ?>
        <div class="col-md-3">
            <?php 
            
                include("includes/sidebar.php");
            
            ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Contact Us</h2>
                        <p class="text-muted">
                            If you have any questions, feel free to contact us.
                        </p>
                    </center>
                    <form action="contact.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input class="form-control" type="text" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 

    include("includes/footer.php");

?>