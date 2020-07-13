<?php
//include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);

session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");


use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Message;



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
                    <h3 class="box-title">Add/Create Category:</h3>
                </div>
                <!-- /.box-header -->

                <?php
                    if(Message::hasMessage()):
                 ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo Message::flush(); ?>
                    </div>

                <?php
                    endif;
                ?>

                <!-- form start -->
                <form role="form" method="post" action="storeProcess.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                            <label for="Category_image">Category Image</label>
                            <input type="file" name="picture" id="Category_image" class="form-control">
                            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                        </div>
                        <div class="form-group">
                            <label for="link">Category Link</label>
                            <input type="text" name="link" class="form-control" id="link" placeholder="Enter Category Link">
                        </div>
                        <div class="form-group">
                            <label for="soft_delete">Category Soft Delete</label>
                            <input type="number" name="soft_delete" class="form-control" id="soft_delete" placeholder="Enter Category Soft Delete or Not?">
                        </div>
                        <div class="form-group">
                            <label for="is_draft">Category Is Draft</label>
                            <input type="number" name="is_draft" class="form-control" id="is_draft" placeholder="Enter Category Is Draft or Not?">
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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