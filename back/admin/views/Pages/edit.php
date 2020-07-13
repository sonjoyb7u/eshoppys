<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Db\Db;
use Eshoppy\Pages\Pages;


$id = $_GET['id'];

$pages = new Pages();

$page = $pages->editPage($id);


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
<section class="content" style="margin-left: 16%;">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit/Update Product:</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="updateProcess.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Page Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="<?php echo $page['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <div class="box-body pad">
                                <form>
                                    <textarea class="form-control" id="description" name="description" rows="6" cols="70">                                               <?= $page['description']; ?>
                                    </textarea>
                                </form>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link">Page Link</label>
                            <input type="text" name="link" class="form-control" id="link" value="<?php echo $page['link']; ?>">
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $page['id']; ?>">
                            <button type="submit" class="btn btn-primary">Update Now</button>
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
