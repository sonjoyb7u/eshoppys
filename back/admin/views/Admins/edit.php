<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/BitmCtg/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Db\Db;
use Eshoppy\Banners\Banners;


$id = $_GET['id'];

$banners = new Banners();

$banner = $banners->editBanner($id);


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
                    <h3 class="box-title">Update/Edit Banner:</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="updateProcess.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Banner Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="<?php echo $banner['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="banner_image">Banner Image</label>
                            <img src="upload/images/<?php echo $banner['picture']; ?>" alt="" width="100px" height="100px">
                            <?php echo $banner['picture']; ?>
                            <br/>
                            <input type="file" name="picture" id="banner_image" class="form-control">
                            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                        </div>
                        <div class="form-group">
                            <label for="link">Banner Link</label>
                            <input type="text" name="link" class="form-control" id="link" value="<?php echo $banner['link']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="promotional_message">Promotional Message</label>
                            <textarea class="form-control" name="promotional_message" id="promotional_message" rows="3"><?php echo $banner['promotional_message']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="html_banner">Html Banner</label>
                            <input type="text" name="html_banner" class="form-control" id="html_banner"value="<?php echo $banner['html_banner']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Banner Is Active?</label>
                            <input type="number" name="is_active" class="form-control" id="is_active" value="<?php echo $banner['is_active']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="is_draft">Banner Is Draft</label>
                            <input type="number" name="is_draft" class="form-control" id="is_draft" value="<?php echo $banner['is_draft']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="soft_delete">Banner Soft Delete</label>
                            <input type="number" name="soft_delete" class="form-control" id="soft_delete" value="<?php echo $banner['soft_delete']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="max_display">Banner Max Display</label>
                            <input type="number" name="max_display" class="form-control" id="max_display" value="<?php echo $banner['max_display']; ?>">
                        </div>

                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $banner['id']; ?>">
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

