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
                    <h3 class="box-title">Add/Create Brand:</h3>
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
                            <label for="title">Brand Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Brand Title Name">
                        </div>
                        <div class="form-group">
                            <label for="link">Brand Link</label>
                            <input type="text" name="link" class="form-control" id="link" placeholder="Enter Brand Link">
                        </div>
                        <div class="form-group">
                            <label for="is_draft">Brand Is Draft</label>
                            <input type="number" name="is_draft" class="form-control" id="is_draft" placeholder="Enter Brand Is Draft or Not?">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Brand Is Active?</label>
                            <input type="number" name="is_active" class="form-control" id="is_active" placeholder="Enter Brand Is Active or Not?">
                        </div>
                        <div class="form-group">
                            <label for="soft_delete">Brand Soft Delete</label>
                            <input type="number" name="soft_delete" class="form-control" id="soft_delete" placeholder="Enter Brand Soft Delete or Not?">
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
