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
                }
                
                ?>
            </li>
        </ol>
    </div>
</div>