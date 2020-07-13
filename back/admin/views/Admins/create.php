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
                    <h3 class="box-title">Add/Create Admin-User:</h3>
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
                            <label for="name">Admin Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Admin Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Admin Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Admin Email">
                        </div>
                        <div class="form-group">
                            <label for="username">Admin User Name</label>
                            <textarea class="form-control" name="username" id="username" rows="3" placeholder="Enter aDMIN uSER Name"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="password">Admin Password</label>
                            <input type="text" name="password" class="form-control" id="password" placeholder="Enter Admin password">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Admin Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="soft_delete">Admin Soft Delete</label>
                            <input type="number" name="soft_delete" class="form-control" id="soft_delete" placeholder="Enter Admin Soft Delete or Not?">
                        </div>
                        <div class="form-group">
                            <label for="is_draft">Admin Is Draft</label>
                            <input type="number" name="is_draft" class="form-control" id="is_draft" placeholder="Enter Admin Is Draft or Not?">
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