<!-- Admin Page Breadcrumbs -->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>

<!-- Admin Dashboard -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_products; ?></div>
                        <div>Products</div>
                    </div>
                </div>
            </div>
            <a href="admin.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_customers; ?></div>
                        <div>Customers</div>
                    </div>
                </div>
            </div>
            <a href="admin.php?view_customers">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_p_cats; ?></div>
                        <div>Product Categories</div>
                    </div>
                </div>
            </div>
            <a href="admin.php?view_p_cats">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_p_orders; ?></div>
                        <div>Orders</div>
                    </div>
                </div>
            </div>
            <a href="admin.php?view_orders">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> New Orders
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Order No.</th>
                                <th>Customer Email</th>
                                <th>Invoice No.</th>
                                <th>Product ID</th>
                                <th>Qty.</th>
                                <th>Size</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Get new orders functionality -->

                            <?php getNewOrders(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="admin.php?view_orders">
                        View All Orders <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="mb-md thumb-info">
                    <img class="img-responsive rounded" src="images/placeholder.png">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner">M-Dev</span>
                    </div>
                </div>
                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i><span> Email:</span> example@example.com 
                        <br>
                        <i class="fa fa-user"></i><span> Country:</span> Austria
                        <br> 
                        <i class="fa fa-user"></i><span> Contact:</span> 45624562 
                        <br>
                    </div>
                    <hr class="dotted-short">
                    <h5 class="text-muted">About Me:</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla amet, libero aspernatur est esse vero porro commodi dicta natus ex, ullam impedit quaerat incidunt excepturi voluptatum laboriosam eveniet sequi voluptate.</p>
                </div>
            </div>
        </div>
    </div>
</div>