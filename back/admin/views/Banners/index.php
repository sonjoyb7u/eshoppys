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
    <section class="container-fluid content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Banner List:</h3>
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

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-sm table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Picture</th>
                                    <th>Link</th>
                                    <th>Promotional Message</th>
                                    <th>Html Banner</th>
                                    <th>Is Active</th>
                                    <th>Soft-Delete</th>
                                    <th>Is Draft</th>
                                    <th>Max_display</th>
                                    <th>Created At</th>
                                    <th>Modified At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include_once 'readProcess.php';
                                $i = 1;
                                foreach ($banners as $value):

                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $value->id; ?></td>
                                        <td><?php echo $value->title; ?></td>
                                        <td><img src="upload/images/<?php echo $value->picture; ?>" width="100px" height="100px" alt="">
                                            <?php echo $value->picture; ?>
                                        </td>
                                        <td><?php echo $value->link; ?></td>
                                        <td><?php echo $value->promotional_message; ?></td>
                                        <td><?php echo $value->html_banner; ?></td>
                                        <td>
                                            <?php
                                                if($value->is_active > 0) {
                                            ?>
                                            <span class="active">Activate</span>
                                            <a href="deactivate.php?id=<?php echo $value->id; ?>">Deactivate</a>
                                            <?php
                                            }
                                            else {
                                            ?>
                                            <span class="inactive">In Active</span>
                                            <a href="activate.php?id=<?php echo $value->id; ?>">Activate</a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $value->soft_delete; ?></td>
                                        <td><?php echo $value->is_draft; ?></td>
                                        <td><?php echo $value->max_display; ?></td>
                                        <td><?php echo $value->created_at; ?></td>
                                        <td><?php echo $value->modified_at; ?></td>
                                        <td class="">
                                            <a href="view.php?id=<?php echo $value->id; ?>" class="btn btn-success btn-sm glyphicon glyphicon-eye-open" style="margin-bottom: 5px;"></a>
                                            <a href="edit.php?id=<?php echo $value->id; ?>" class="btn btn-info btn-sm glyphicon glyphicon-edit" style="margin-bottom: 5px;"></a>
                                            <a onclick="return confirm('Are you sure to delete?')" href="deleteProcess.php?id=<?php echo $value->id; ?>" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Picture</th>
                                    <th>Link</th>
                                    <th>Promotional Message</th>
                                    <th>Html Banner</th>
                                    <th>Is Active</th>
                                    <th>Soft-Delete</th>
                                    <th>Is Draft</th>
                                    <th>Max_display</th>
                                    <th>Created At</th>
                                    <th>Modified At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
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