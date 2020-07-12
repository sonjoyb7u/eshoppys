<?php
//include_once ($_SERVER['DOCUMENT_ROOT'] . '/BitmCtg/eshoppy/vendor/autoload.php');
ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);

session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/BitmCtg/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");


use Eshoppy\Utility\Utility;
use Eshoppy\Brands\Brands;


$brand_id = $_GET['brand_id'];

$brands = new Brands();

$brand = $brands->editBrand($brand_id);



ob_start(); //Output Buffer Started...

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_LAYOUTS . '/dashboard_default.php' );

$dashboard_layout = ob_get_contents(); // All Buffer String Values/Content store in this Variable...

ob_end_clean(); //Output Buffer All Clean...

//echo $login_layout;
?>

<?php

ob_start(); //Output Buffer Started...

?>



<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add/Create Brand:</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="updateProcess.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Brand Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Brand Title Name" value="<?php echo $brand['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="link">Brand Link</label>
                            <input type="text" name="link" class="form-control" id="link" placeholder="Enter Brand Link" value="<?php echo $brand['link']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="is_draft">Brand Is Draft</label>
                            <input type="number" name="is_draft" class="form-control" id="is_draft" placeholder="Enter Brand Is Draft or Not?" value="<?php echo $brand['is_draft']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Brand Is Active?</label>
                            <input type="number" name="is_active" class="form-control" id="is_active" placeholder="Enter Brand Is Active or Not?" value="<?php echo $brand['is_active']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="soft_delete">Brand Soft Delete</label>
                            <input type="number" name="soft_delete" class="form-control" id="soft_delete" placeholder="Enter Brand Soft Delete or Not?" value="<?php echo $brand['soft_delete']; ?>">
                        </div>

                        <div class="box-footer">
                            <input type="hidden" name="brand_id" value="<?php echo $brand['brand_id']; ?>">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                    <!-- /.box-body -->

                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>




<?php

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_LAYOUTS . '/dashboard_default.php' );
$dashboard_main_content = ob_get_contents();

ob_end_clean(); //Output Buffer All Clean...

echo str_replace('##DASHBOARD-MAIN-CONTENT##', $dashboard_main_content, $dashboard_layout);

?>
