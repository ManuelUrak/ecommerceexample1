<!-- Footer -->

<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li><a href="checkout.php">Login</a></li>
                    <li><a href="costumer_register">Register</a></li>
                </ul>
                <hr class="hidden-lg hidden-md hidden-sm">
            </div>

            <!-- Category Section -->

            <div class="col-sm-6 col-md-3">
                <h4>Top Categories</h4>
                <ul>
                    <?php 
                    
                        $get_cats = "SELECT * FROM product_categories";
                        $run_cats = mysqli_query($con, $get_cats);

                        while($row_cats=mysqli_fetch_array($run_cats)){
                            $p_cat_id = $row_cats['p_cat_id'];
                            $p_cat_title = $row_cats['p_cat_title'];

                            echo "
                                <li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>
                            ";
                        }
                    
                    ?>
                </ul>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>Company</h4>
                <p>
                    <strong>M-Dev Media</strong>
                    <br>
                    Nannen 206
                    <br>
                    A-6861 Alberschwende
                    <br>
                    0664/75511017
                    <br>
                    manuel.urak88@gmail.com
                </p>
                <hr class="hidden-md hidden-sm">
                <a href="contact.php">Contact Us</a>
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>Be Up To Date</h4>
                <p class="text-mute">
                    Subscribe to our weekly newsletter!
                </p>
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="email">
                        <span class="input-group-btn">
                            <input type="submit" value="subscribe" class="btn btn-default">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Find Us On Social Media</h4>
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Copyright Section -->

<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">&copy;2021 M-Dev Media</p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">&copy;2021 Manuel Urak</p>
        </div>
    </div>
</div>

<script src="js/bootstrap-337.min.js"></script>
    <script src="js/jquery-331.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>