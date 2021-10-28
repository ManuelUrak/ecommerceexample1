<!-- My Orders Page -->

<center>
    <h1>My Orders</h1>
    <p class="lead">Your orders in one place</p>
    <p class="text-muted">If you have any questions regarding your orders, feel free to 
        <a href="./contact.php">contact us</a> .</p>
</center>
<hr>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th> ON: </th>
                <th> Due Amount: </th>
                <th> Invoice No: </th>
                <th> Qty: </th>
                <th> Size: </th>
                <th> Order Date: </th>
                <th> Paid/Unpaid: </th>
                <th> Status: </th>
            </tr>
        </thead>

        <!-- Get the orders from the database -->

        <?php getOrders(); ?>
    </table>
</div>