<!-- Admin Page Breadcrumbs --> 

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 
                <?php 
                
                switch($_GET){
                    case isset($_GET['dashboard']):
                        echo "Dashboard";
                        break;
                    case isset($_GET['insert_products']):
                        echo "Dashboard / Insert Products";
                        break;
                    case isset($_GET['view_products']):
                        echo "Dashboard / View Products";
                        break;
                    case isset($_GET['edit_product']):
                        echo "Dashboard / Edit Product";
                        break;
                    case isset($_GET['insert_p_cat']):
                        echo "Dashboard / Insert Product Category";
                        break;
                    case isset($_GET['view_p_cats']):
                        echo "Dashboard / Product Categories";
                        break;
                    case isset($_GET['edit_p_cats']):
                        echo "Dashboard / Edit Product Category";
                        break;
                    case isset($_GET['view_cats']):
                        echo "Dashboard / Categories";
                        break;
                    case isset($_GET['insert_cat']):
                        echo "Dashboard / Insert Category";
                        break;
                    case isset($_GET['edit_cat']):
                        echo "Dashboard / Edit Category";
                        break;
                    case isset($_GET['insert_slide']):
                        echo "Dashboard / Insert Slide Image";
                        break;
                    case isset($_GET['view_slides']):
                        echo "Dashboard / View Slide Images";
                        break;
                    case isset($_GET['view_customers']):
                        echo "Dashboard / View Customers";
                        break;
                    case isset($_GET['view_orders']):
                        echo "Dashboard / View Orders";
                        break;
                    case isset($_GET['view_payments']):
                        echo "Dashboard / View Payments";
                        break;
                    case isset($_GET['view_users']):
                        echo "Dashboard / View Users";
                        break;
                    case isset($_GET['edit_users']):
                        echo "Dashboard / Edit Users";
                        break;
                    case isset($_GET['insert_user']):
                        echo "Dashboard / Insert User";
                        break;
                }
                
                ?>
            </li>
        </ol>
    </div>
</div>